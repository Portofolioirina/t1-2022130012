@extends('layouts.template')

@section('title', "Product: $product->product_name")

@section('body')
@if ($product->product_image)
    <img src="{{ asset($product->product_image) }}" class="rounded img-thumbnail mx-auto d-block my-3"/>
@endif

<table class="table table-bordered">
    <tbody>
        <tr>
            <th scope="row">id</th>
            <td>{{ $product->id }}</td>
        </tr>
        <tr>
            <th scope="row">product_name</th>
            <td>{{ $product->product_name }}</td>
        </tr>
        <tr>
            <th scope="row">description</th>
            <td>{{ $product->description }}</td>
        </tr>
        <tr>
            <th scope="row">retail_price</th>
            <td>{{ $product->retail_price }}</td>
        </tr>
        <tr>
            <th scope="row">wholesale_price</th>
            <td>{{ $product->wholesale_price }}</td>
        </tr>
        <tr>
            <th scope="row">origin</th>
            <td>{{ $product->origin }}</td>
        </tr>
        <tr>
            <th scope="row">quantity</th>
            <td>{{ $product->quantity }}</td>
        </tr>

    </tbody>
</table>

<div>
    <small>Created at: {{ $product->created_at }}</small>
    @if ($product->updated_at)
        <br><small>Updated at: {{ $product->updated_at }}</small>
    @endif
</div>
@endsection
