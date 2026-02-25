@extends('layouts.app')

@section('title', 'Products – ' . $category->name)

@section('content')
<h2>{{ $category->name }}</h2>

{{-- TODO: render filter sidebar + product grid with pagination --}}
{{--
<div class="row">
    <aside class="col-md-3">
        <form method="GET">
            <div class="mb-3">
                <label class="form-label">Brand</label>
                <select name="brand" class="form-select">
                    <option value="">All</option>
                    {{-- $brands list passed from controller --}}
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Color</label>
                <select name="color" class="form-select">...</select>
            </div>
            <div class="row mb-3">
                <div class="col"><input type="number" name="price_min" class="form-control" placeholder="Min €"></div>
                <div class="col"><input type="number" name="price_max" class="form-control" placeholder="Max €"></div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Filter</button>
        </form>
    </aside>
    <section class="col-md-9">
        <div class="d-flex justify-content-between mb-3">
            <span>{{ $products->total() }} products</span>
            <select name="sort" form="filter-form" class="form-select w-auto" onchange="this.form.submit()">
                <option value="newest">Newest</option>
                <option value="price_asc">Price ↑</option>
                <option value="price_desc">Price ↓</option>
                <option value="name_asc">Name A–Z</option>
            </select>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
            @foreach($products as $product)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        {{-- product image --}}
                        <div class="card-body">
                            <h6 class="card-title">{{ $product->name }}</h6>
                            <p class="fw-bold text-primary">€{{ number_format($product->price, 2) }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('products.show', [$category, $product]) }}" class="btn btn-sm btn-outline-primary w-100">View</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4">{{ $products->withQueryString()->links() }}</div>
    </section>
</div>
--}}
@endsection
