@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<h2>Your Cart</h2>

{{-- TODO: render cart items table with quantity update & remove forms,
     then show subtotal and a link to checkout --}}
{{--
@if($cart->items->isEmpty())
    <p class="text-muted">Your cart is empty. <a href="{{ route('home') }}">Continue shopping</a></p>
@else
    <table class="table align-middle">
        <thead><tr><th>Product</th><th>Price</th><th>Qty</th><th>Subtotal</th><th></th></tr></thead>
        <tbody>
        @foreach($cart->items as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>€{{ number_format($item->product->price, 2) }}</td>
                <td>
                    <form action="{{ route('cart.update', $item) }}" method="POST" class="d-flex gap-1">
                        @csrf @method('PATCH')
                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control form-control-sm" style="width:70px">
                        <button class="btn btn-sm btn-secondary">Update</button>
                    </form>
                </td>
                <td>€{{ number_format($item->quantity * $item->product->price, 2) }}</td>
                <td>
                    <form action="{{ route('cart.remove', $item) }}" method="POST">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr><th colspan="3" class="text-end">Total</th><th>€{{ number_format($cart->getTotal(), 2) }}</th><th></th></tr>
        </tfoot>
    </table>
    <a href="{{ route('cart.checkout') }}" class="btn btn-primary">Proceed to Checkout</a>
@endif
--}}
@endsection
