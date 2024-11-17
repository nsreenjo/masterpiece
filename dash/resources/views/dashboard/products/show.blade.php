@extends('dashboard.layout.master')
@section('title', 'Product View')
@section('content')
    <div class="text-left">
        <button class="btn ">
            <a href="{{ route('products.index') }}" class="btn btn-primary p-2 float-start">Back to List</a>
        </button>
    </div>

    <div class="card">
        <h5 class="card-header">Product Details</h5>
        <div class="card-body">
            <div class="mb-3">
                <label for="product_id" class="form-label">Product ID:</label>
                <p>{{ $product->product_id }}</p>
            </div>
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name:</label>
                <p>{{ $product->product_name }}</p>
            </div>
            <div class="mb-3">
                <label for="product_descrbtion" class="form-label">Product Description:</label>
                <p>{{ $product->product_descrbtion }}</p>
            </div>
            <div class="mb-3">
                <label for="product_price" class="form-label">Product Price:</label>
                <p>{{ $product->product_price }} JOD</p>
            </div>
            <div class="mb-3">
                <label for="product_price" class="form-label">quantity:</label>
                <p>{{ $product->quantity}} </p>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Category:</label>
                <p>{{ $product->category->category_name }}</p>
            </div>
            <div class="mb-3">
                <label for="product_image" class="form-label">Product Image:</label><br>
                <img src="{{ asset('uploads/products/' . $product->product_image) }}" alt="Product Image" width="150">
            </div>
        </div>
    </div>
@endsection
