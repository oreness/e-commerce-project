<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a paginated, filtered, sorted list of products for a category.
     *
     * Query params:
     *   - q          : full-text search term
     *   - brand      : filter by brand
     *   - color      : filter by color
     *   - price_min  : minimum price
     *   - price_max  : maximum price
     *   - sort       : price_asc | price_desc | name_asc | newest
     */
    public function index(Request $request, Category $category)
    {
        // TODO: build query with filters, sorting and pagination
        // $products = Product::where('category_id', $category->id)
        //     ->when($request->q, fn($q, $term) => $q->search($term))
        //     ->when($request->brand, fn($q, $v) => $q->where('brand', $v))
        //     ->when($request->color, fn($q, $v) => $q->where('color', $v))
        //     ->when($request->price_min, fn($q, $v) => $q->where('price', '>=', $v))
        //     ->when($request->price_max, fn($q, $v) => $q->where('price', '<=', $v))
        //     ->when($request->sort, function ($q, $sort) {
        //         match ($sort) {
        //             'price_asc'  => $q->orderBy('price'),
        //             'price_desc' => $q->orderByDesc('price'),
        //             'name_asc'   => $q->orderBy('name'),
        //             default      => $q->latest(),
        //         };
        //     })
        //     ->paginate(12);

        // return view('products.index', compact('products', 'category'));
    }

    /**
     * Display a single product detail page.
     */
    public function show(Category $category, Product $product)
    {
        // TODO: load product with images and related products
        // return view('products.show', compact('product'));
    }

    /**
     * Full-text search across all products.
     */
    public function search(Request $request)
    {
        // TODO: search products by request->q across all categories
        // $products = Product::search($request->q)->paginate(12);
        // return view('products.search', compact('products'));
    }
}
