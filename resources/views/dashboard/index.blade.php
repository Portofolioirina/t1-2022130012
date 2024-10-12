@extends('layouts.template')

@section('title', 'Dashboard')

@section('body')

<div class="container mt-4">
    <h1 class="mb-4">Dashboard</h1>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Total Quantity Products</h5>
            <p class="card-text">{{ $totalQuantity }}</p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Produk Termahal</h5>
            @if ($mostExpensiveProduct)
                <p class="card-text">Nama Produk: {{ $mostExpensiveProduct->product_name }}</p>
                <p class="card-text">Harga: {{ number_format($mostExpensiveProduct->retail_price, 2) }}</p>
            @else
                <p class="card-text">Tidak ada produk tersedia.</p>
            @endif
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Produk dengan Quantity Terbanyak</h5>
            @if ($mostQuantityProduct)
                <p class="card-text">Nama Produk: {{ $mostQuantityProduct->product_name }}</p>
                <p class="card-text">Quantity: {{ $mostQuantityProduct->quantity }}</p>
            @else
                <p class="card-text">Tidak ada produk tersedia.</p>
            @endif
        </div>
    </div>
</div>

@endsection
