@extends('layouts.template')

@section('title', 'Products List')

@section('body')
<div class="mt-4 p-5 bg-black text-white rounded">
    <h1>All Products</h1>

    <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm">Create New Product</a>
</div>

@if (session()->has('success'))
    <div class="alert alert-success mt-4">
        {{ session()->get('success') }}
    </div>
@endif

<div class="container mt-5">
    <table class="table table-bordered mb-5">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Description</th>
                <th scope="col">Retail Price</th>
                <th scope="col">Wholesale Price</th>
                <th scope="col">Origin</th>
                <th scope="col">Quantity</th>
                <th scope="col">Created At</th>
                <th scope="col">Update At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr>
                <th scope="row">{{  $product->id }}</th>
                <td>
                    <a href="{{ route('product.show', $product) }}">
                    {{ $product->product_name }}
                    </a>
                </td>
                <td>{{ Str::limit($product->description, 50, '...') }}</td>
                <td>{{ $product->retail_price }}</td>
                <td>{{ $product->wholesale_price }}</td>
                <td>{{ $product->origin }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->created_at }}</td>
                <td>{{ $product->updated_at }}</td>
                <td>
                    <a href="{{ route('product.edit', $product) }}" class="btn btn-primary btn-sm">
                        Edit
                    </a>
                    <form action={{ route('product.destroy', $product) }} method="POST" class="d-inline-block">
                        @method('DELETE')
                        @csrf

                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7">No guests found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $products->links() !!}
    </div>
</div>
@endsection
