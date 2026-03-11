@extends('layouts.app')

@section('title', 'Admin – Products')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Admin – Products</h2>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> New Product
    </a>
</div>

{{-- TODO: render $products table with edit/delete actions --}}
{{--
<table class="table table-hover align-middle">
    <thead>
        <tr><th>#</th><th>Name</th><th>Category</th><th>Price</th><th>Stock</th><th>Active</th><th></th></tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name }}</td>
            <td>€{{ number_format($product->price, 2) }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->is_active ? '✓' : '✗' }}</td>
            <td class="d-flex gap-1">
                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-secondary">Edit</a>
                <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div>{{ $products->links() }}</div>
--}}
@endsection
