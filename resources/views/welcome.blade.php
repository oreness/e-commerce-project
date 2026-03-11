@extends('layouts.app')

@section('title', 'Home – E-Shop')

@section('content')
<div class="text-center py-5">
    <h1 class="display-4 fw-bold">Welcome to E-Shop</h1>
    <p class="lead text-muted">Browse our categories below to find what you're looking for.</p>
</div>

{{-- TODO: pass $categories from a HomeController and render category cards here --}}
{{-- Example:
<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach($categories as $category)
        <div class="col">
            <a href="{{ route('products.index', $category) }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <p class="card-text text-muted">{{ $category->description }}</p>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
--}}
@endsection
