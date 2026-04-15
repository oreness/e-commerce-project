<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // 1. Búsqueda (Cambiamos 'has' por 'filled')
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        // 2. Filtrado por Marca
        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        // 3. Filtrado por Precio (Aquí es donde daba el error)
        // Usamos 'filled' para ignorar los inputs vacíos
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // 4. Reordenación
        if ($request->filled('sort')) {
            if ($request->sort == 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort == 'price_desc') {
                $query->orderBy('price', 'desc');
            }
        }

        $products = $query->paginate(12);

        $view = $request->routeIs('search') ? 'search' : 'products';

        return view($view, compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product-detail', compact('product'));
    }
}
