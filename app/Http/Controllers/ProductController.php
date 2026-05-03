<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function search(\Illuminate\Http\Request $request)
    {
        if (! $request->filled('search')) {
            return view('search');
        }

        $search = $request->input('search');
        $products = Product::with('category')
            ->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString();

        $categories = Category::all();
        $colors     = collect();

        return view('search', compact('products', 'categories', 'colors'));
    }

    public function index(\Illuminate\Http\Request $request)
    {
        $query = Product::with('category');

        // Full-text search (same endpoint used by search bar)
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Category filter
        if ($categorySlug = $request->input('category')) {
            $query->whereHas('category', fn ($q) => $q->where('slug', $categorySlug));
        }

        // Price filter
        if ($maxPrice = $request->input('max_price')) {
            $query->where('price', '<=', $maxPrice);
        }

        // Color filter
        if ($color = $request->input('color')) {
            $query->where('color', $color);
        }

        // Sorting
        switch ($request->input('sort')) {
            case 'price_asc':
                $query->orderBy('price');
                break;
            case 'price_desc':
                $query->orderByDesc('price');
                break;
            case 'name_asc':
                $query->orderBy('name');
                break;
            default:
                $query->latest();
        }

        $products   = $query->paginate(9)->withQueryString();
        $categories = Category::all();
        $colors     = Product::select('color')->distinct()->whereNotNull('color')->pluck('color');

        return view('products', compact('products', 'categories', 'colors'));
    }

    public function show(string $slug)
    {
        $product = Product::with('category')->where('slug', $slug)->firstOrFail();

        return view('product-detail', compact('product'));
    }
}
