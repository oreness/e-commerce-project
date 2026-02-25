@extends('layouts.app')

@section('title', 'Search Results')

@section('content')
<h2>Search results for "{{ request('q') }}"</h2>

{{-- TODO: render $products grid, reuse products/index card partial --}}
@endsection
