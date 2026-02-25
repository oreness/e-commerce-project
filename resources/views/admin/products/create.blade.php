@extends('layouts.app')

@section('title', 'Admin – New Product')

@section('content')
<h2>New Product</h2>

{{-- TODO: wire to AdminProductController::store. Requires enctype for file upload. --}}
<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.products._form')
    <button type="submit" class="btn btn-primary">Create Product</button>
</form>
@endsection
