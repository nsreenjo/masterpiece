@extends('dashboard.layout.master')
@section('title', 'Create Product')

@section('content')
    <div class="text-left">
        <button class="btn">
            <a href="{{ route('products.index') }}" class="btn btn-primary p-2 float-start">Back to List</a>
        </button>
    </div>
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Add Product</h5>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body demo-vertical-spacing demo-only-element">

                    <!-- Select for Category -->
                    <div class="form-floating form-floating-outline mb-6">
                    <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                   <option value="" disabled selected>Select Category</option>
                    @foreach($categories as $category)
                         <option value="{{ $category->category_id }}" {{ old('category_id') == $category->category_id ? 'selected' : '' }}>
                          {{ $category->category_name }}
                         </option>
                       @endforeach
                        </select>

                        <label for="exampleFormControlSelect1">Category</label>
                    </div>

                    <!-- Product Name -->
                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" name="product_name" value="{{ old('product_name') }}" class="form-control" id="exampleFormControlInput1" placeholder="Product Name">
                        <label for="exampleFormControlInput1">Name</label>
                    </div>

                    <!-- Product Description -->
                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" name="product_descrbtion" value="{{ old('product_descrbtion') }}" class="form-control" id="exampleFormControlInput3" placeholder="Product Description">
                        <label for="exampleFormControlInput3">Description</label>
                    </div>

                    <!-- Product Price -->
                    <div class="form-floating form-floating-outline mb-6">
                        <input type="number" name="product_price" value="{{ old('product_price') }}" class="form-control" id="exampleFormControlInput2" placeholder="Product Price">
                        <label for="exampleFormControlInput2">Price</label>
                    </div>

                    <!-- Product Image -->
                    <div class="form-floating form-floating-outline mb-6">
                        <input type="file" name="product_image" class="form-control" id="exampleFormControlInput4">
                        <label for="exampleFormControlInput4">Upload Image</label>
                    </div>

                    <button class="btn btn-success">ADD +</button>
                </div>
            </form>
        </div>
    </div>
@endsection
