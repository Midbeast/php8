@extends('layouts/products')
<h1>All Products</h1>
<p>Show all products...</p>

@if($next)
<a href="{{ $next }}">next</a>
@endif

@if($next)
<a href="{!! $next !!}">next</a>
@endif

@includes('includes/product-details', ['name' => 'acme'])
