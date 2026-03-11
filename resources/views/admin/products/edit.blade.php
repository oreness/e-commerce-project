@extends('layouts.app')

@section('title', 'Admin – Edit Product')

@section('content')
<h2>Edit Product: {{ $product->name }}</h2>

<form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    @include('admin.products._form')

    {{-- Existing images with individual delete buttons --}}
    <h5 class="mt-4">Current Images</h5>
    {{-- TODO: loop $product->images and show each with a delete form:
    @foreach($product->images as $image)
        <div class="d-inline-block me-2 text-center">
            <img src="{{ asset('storage/' . $image->path) }}" style="height:80px" class="rounded" alt="">
            <form action="{{ route('admin.products.images.destroy', [$product, $image]) }}" method="POST" class="mt-1">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger">Remove</button>
            </form>
        </div>
    @endforeach
    --}}

    <button type="submit" class="btn btn-primary mt-3">Update Product</button>
</form>
@endsection
