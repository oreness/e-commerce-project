@extends('layouts.app')

@section('title', $product->name)

@section('content')
{{-- TODO: product detail page --}}
{{--
<div class="row">
    <div class="col-md-6">
        {{-- Image gallery --}}
        <img src="{{ asset('storage/' . $product->primaryImage?->path) }}" class="img-fluid rounded" alt="{{ $product->name }}">
        <div class="d-flex gap-2 mt-2">
            @foreach($product->images as $image)
                <img src="{{ asset('storage/' . $image->path) }}" class="img-thumbnail" style="width:80px" alt="">
            @endforeach
        </div>
    </div>
    <div class="col-md-6">
        <h1>{{ $product->name }}</h1>
        <p class="text-muted">{{ $product->brand }} · {{ $product->color }}</p>
        <h3 class="text-primary">€{{ number_format($product->price, 2) }}</h3>
        <p>{{ $product->description }}</p>

        <form action="{{ route('cart.add', $product) }}" method="POST">
            @csrf
            <div class="d-flex gap-2 align-items-center mb-3">
                <label for="quantity" class="form-label mb-0">Qty:</label>
                <input type="number" id="quantity" name="quantity" value="1" min="1"
                       max="{{ $product->stock }}" class="form-control" style="width:80px">
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-cart-plus"></i> Add to Cart
            </button>
        </form>
    </div>
</div>
--}}
@endsection
