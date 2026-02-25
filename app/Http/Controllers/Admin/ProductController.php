<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Show admin product list.
     */
    public function index()
    {
        // $products = Product::with('category')->paginate(20);
        // return view('admin.products.index', compact('products'));
    }

    /**
     * Show form to create a new product.
     */
    public function create()
    {
        // $categories = Category::all();
        // return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a new product with at least 2 uploaded images.
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'category_id' => 'required|exists:categories,id',
        //     'name'        => 'required|string|max:255',
        //     'description' => 'required|string',
        //     'price'       => 'required|numeric|min:0',
        //     'stock'       => 'required|integer|min:0',
        //     'brand'       => 'nullable|string|max:100',
        //     'color'       => 'nullable|string|max:50',
        //     'images'      => 'required|array|min:2',
        //     'images.*'    => 'required|image|max:4096',
        // ]);
        // $product = Product::create([...$validated, 'slug' => Str::slug($validated['name'])]);
        // foreach ($request->file('images') as $i => $file) {
        //     $path = $file->store('products', 'public');
        //     $product->images()->create(['path' => $path, 'is_primary' => $i === 0, 'sort_order' => $i]);
        // }
        // return redirect()->route('admin.products.index')->with('success', 'Product created.');
    }

    /**
     * Show form to edit an existing product.
     */
    public function edit(Product $product)
    {
        // $categories = Category::all();
        // $product->load('images');
        // return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update product details and optionally upload new images.
     */
    public function update(Request $request, Product $product)
    {
        // $validated = $request->validate([...]);
        // $product->update($validated);
        // if ($request->hasFile('images')) {
        //     foreach ($request->file('images') as $i => $file) {
        //         $path = $file->store('products', 'public');
        //         $product->images()->create(['path' => $path, 'sort_order' => $product->images()->count() + $i]);
        //     }
        // }
        // return redirect()->route('admin.products.index')->with('success', 'Product updated.');
    }

    /**
     * Delete a product and physically remove its images from storage.
     */
    public function destroy(Product $product)
    {
        // foreach ($product->images as $image) {
        //     Storage::disk('public')->delete($image->path);
        //     $image->delete();
        // }
        // $product->delete();
        // return redirect()->route('admin.products.index')->with('success', 'Product deleted.');
    }

    /**
     * Delete a single product image and remove it from disk.
     */
    public function destroyImage(ProductImage $image)
    {
        // Storage::disk('public')->delete($image->path);
        // $image->delete();
        // return back()->with('success', 'Image removed.');
    }
}
