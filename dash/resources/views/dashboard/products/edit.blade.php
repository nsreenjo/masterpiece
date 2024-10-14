@extends('dashboard.layout.master')
@section('title', 'Edit Product')

@section('content')
    <div class="text-left">
        <button class="btn">
            <a href="{{ route('products.index') }}" class="btn btn-primary p-2 float-start">Back to List</a>
        </button>
    </div>
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Edit Product</h5>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif      
            <form action="{{ route('products.update', $product->product_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body demo-vertical-spacing demo-only-element">

                    <!-- Field for Product Name -->
                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control" id="productName" placeholder="Product Name">
                        <label for="productName">Name</label>
                    </div>

                    <!-- Field for Product Description -->
                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" name="product_descrbtion" value="{{ $product->product_descrbtion }}" class="form-control" id="productDescription" placeholder="Product Description">
                        <label for="productDescription">Description</label>
                    </div>

                    <div class="form-floating form-floating-outline mb-6">
                        <input type="number" name="product_price" value="{{ $product->product_price }}" class="form-control" id="productPrice" placeholder="Product Price">
                        <label for="productPrice">Price</label>
                    </div>

                    <div class="form-floating form-floating-outline mb-6">
                        <select name="category_id" class="form-control" id="categorySelect">
                            @foreach($categories as $category)
                                <option value="{{ $category->category_id }}" {{ $product->category_id == $category->category_id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="categorySelect">Category</label>
                    </div>

                    <!--  Image Display -->
                    <div class="mb-3">
                        <label for="product_image" class="form-label">Current Product Image:</label><br>
                        <img src="{{ asset('uploads/products/' . $product->product_image) }}" alt="product img" width="150">
                    </div>

                    <!--  a New Image -->
                    <div class="form-floating form-floating-outline mb-6">
                        <input type="file" name="product_image" class="form-control" id="productImage">
                        <label for="productImage" class="form-label">Upload New Image (optional)</label>
                    </div>

                    <button class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
