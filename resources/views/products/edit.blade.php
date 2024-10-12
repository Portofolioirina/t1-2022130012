@extends('layouts.template')

@section('title', 'Update Guest')

@section('body')

<div class="mt-4 p-5 bg-black text-white rounded">
    <h1>Update Existing Product</h1>
</div>

<div class="row my-5">
    <div class="col-12 px-5">
        @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('product.update', $product) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="id">id</label>
                <input type="text" class="form-control" id="id"  placeholder="id" name="id" required value="{{ old('id', $product->id) }}" readonly>
            </div>

            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" class="form-control" id="product_name"  placeholder="product_name" name="product_name" required value="{{ old('product_name', $product->product_name) }}">
            </div>

            <div class="form-group">
                <label for="description">description</label>
                <input type="text" class="form-control" id="description"  placeholder="description" name="description" required value="{{ old('description', $product->description) }}">
            </div>

            <div class="form-group">
                <label for="retail_price">retail price</label>
                <input type="text" class="form-control" id="retail_price"  placeholder="retail_price" name="retail_price" value="{{ old('retail_price', $product->retail_price) }}">
            </div>

            <div class="form-group">
                <label for="wholesale_price">wholesale price</label>
                <input type="text" class="form-control" id="wholesale_price"  placeholder="wholesale_price" name="wholesale_price" value="{{ old('wholesale_price', $product->wholesale_price) }}">
            </div>

            <div class="form-group">
                <label for="origin">origin</label>
                <input type="text" class="form-control" id="origin"  placeholder="origin" name="origin" required value="{{ old('origin', $product->origin) }}">
            </div>

            <div class="form-group">
                <label for="quantity">quantity</label>
                <input type="text" class="form-control" id="quantity"  placeholder="quantity" name="quantity" required value="{{ old('quantity', $product->quantity) }}">
            </div>

            <div class="form-group">
                <label for="product_image">product_image</label>
                <input type="file" class="form-control" id="product_image"  name="product_image" >
                @if ($product->product_image)
                <img src={{ $product->product_image_url }} class="mt-3" style="max-width: 400px;" />
                @endif
            </div>

        <button type="submit" class="btn btn-primary btn-block">Save</button>
        </form>
    </div>
</div>

@endsection
