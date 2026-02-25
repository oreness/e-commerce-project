@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<h2>Checkout</h2>

{{-- TODO: show cart summary + delivery form (first_name, last_name, email, phone, address, city, postal_code)
     + transport & payment selects, then POST to cart.place-order --}}
{{--
<form action="{{ route('cart.place-order') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-7">
            <h5>Delivery details</h5>
            <div class="row mb-3">
                <div class="col"><input type="text" name="first_name" class="form-control" placeholder="First name" required></div>
                <div class="col"><input type="text" name="last_name"  class="form-control" placeholder="Last name"  required></div>
            </div>
            <input type="email" name="email"       class="form-control mb-3" placeholder="Email" required>
            <input type="tel"   name="phone"       class="form-control mb-3" placeholder="Phone">
            <input type="text"  name="address"     class="form-control mb-3" placeholder="Address" required>
            <div class="row mb-3">
                <div class="col"><input type="text" name="city"        class="form-control" placeholder="City" required></div>
                <div class="col"><input type="text" name="postal_code" class="form-control" placeholder="Postal code" required></div>
            </div>
            <div class="mb-3">
                <label class="form-label">Transport</label>
                <select name="transport" class="form-select" required>
                    <option value="standard">Standard (3-5 days)</option>
                    <option value="express">Express (1-2 days)</option>
                    <option value="pickup">Store pickup</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Payment</label>
                <select name="payment" class="form-select" required>
                    <option value="card">Credit / Debit card</option>
                    <option value="bank_transfer">Bank transfer</option>
                    <option value="cash_on_delivery">Cash on delivery</option>
                </select>
            </div>
        </div>
        <div class="col-md-5">
            <h5>Order summary</h5>
            {{-- cart items summary --}}
            <button type="submit" class="btn btn-primary w-100 mt-3">Place Order</button>
        </div>
    </div>
</form>
--}}
@endsection
