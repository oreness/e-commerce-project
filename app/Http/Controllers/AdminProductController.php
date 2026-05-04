<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminProductController extends Controller
{
    public function index(): View
    {
        $products = Product::query()
            ->with(['category', 'images'])
            ->latest()
            ->paginate(15);

        return view('admin-products', compact('products'));
    }

    public function create(): View
    {
        $categories = Category::query()->orderBy('name')->get();
        $product = new Product();

        return view('admin-product-form', [
            'product' => $product,
            'categories' => $categories,
            'isEdit' => false,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'brand' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'category_id' => ['required', 'exists:categories,id'],
            'images' => ['required', 'array', 'min:2'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png,webp,avif', 'max:4096'],
        ]);

        $product = DB::transaction(function () use ($validated, $request) {
            $product = Product::create([
                'category_id' => (int) $validated['category_id'],
                'name' => $validated['name'],
                'brand' => $validated['brand'],
                'description' => $validated['description'],
                'price' => (float) $validated['price'],
                'image_url' => null,
            ]);

            $storedPaths = $this->storeUploadedImages($request->file('images', []));

            foreach ($storedPaths as $index => $path) {
                $product->images()->create([
                    'path' => $path,
                    'sort_order' => $index,
                ]);
            }

            if (!empty($storedPaths)) {
                $product->update(['image_url' => $storedPaths[0]]);
            }

            return $product;
        });

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function edit(Product $product): View
    {
        $product->load('images');
        $categories = Category::query()->orderBy('name')->get();

        return view('admin-product-form', [
            'product' => $product,
            'categories' => $categories,
            'isEdit' => true,
        ]);
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'brand' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'category_id' => ['required', 'exists:categories,id'],
            'images' => ['nullable', 'array'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png,webp,avif', 'max:4096'],
        ]);

        DB::transaction(function () use ($validated, $request, $product) {
            $product->update([
                'category_id' => (int) $validated['category_id'],
                'name' => $validated['name'],
                'brand' => $validated['brand'],
                'description' => $validated['description'],
                'price' => (float) $validated['price'],
            ]);

            if ($request->hasFile('images')) {
                $maxSort = (int) ($product->images()->max('sort_order') ?? -1);
                $storedPaths = $this->storeUploadedImages($request->file('images', []));

                foreach ($storedPaths as $index => $path) {
                    $product->images()->create([
                        'path' => $path,
                        'sort_order' => $maxSort + $index + 1,
                    ]);
                }

                if (!$product->image_url && !empty($storedPaths)) {
                    $product->update(['image_url' => $storedPaths[0]]);
                }
            }
        });

        return back()->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->load('images');

        $paths = $product->images->pluck('path')
            ->push($product->image_url)
            ->filter()
            ->unique()
            ->values();

        foreach ($paths as $path) {
            $this->deletePhysicalFile($path);
        }

        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }

    public function destroyImage(Product $product, ProductImage $image): RedirectResponse
    {
        if ($image->product_id !== $product->id) {
            abort(404);
        }

        $count = $product->images()->count();

        if ($count <= 2) {
            return back()->with('error', 'A product must keep at least 2 photos.');
        }

        $this->deletePhysicalFile($image->path);
        $deletedPath = $image->path;
        $image->delete();

        if ($product->image_url === $deletedPath) {
            $newPrimary = $product->images()->orderBy('sort_order')->orderBy('id')->value('path');
            $product->update(['image_url' => $newPrimary]);
        }

        return back()->with('success', 'Image removed successfully.');
    }

    /**
     * @param  array<int, \Illuminate\Http\UploadedFile>  $files
     * @return array<int, string>
     */
    private function storeUploadedImages(array $files): array
    {
        $destination = public_path('storage/products');

        if (!is_dir($destination)) {
            mkdir($destination, 0755, true);
        }

        $stored = [];

        foreach ($files as $file) {
            $filename = (string) Str::uuid().'.'.$file->getClientOriginalExtension();
            $file->move($destination, $filename);
            $stored[] = 'products/'.$filename;
        }

        return $stored;
    }

    private function deletePhysicalFile(string $path): void
    {
        if (!str_starts_with($path, 'products/')) {
            return;
        }

        $fullPath = public_path('storage/'.$path);

        if (file_exists($fullPath)) {
            @unlink($fullPath);
        }
    }
}
