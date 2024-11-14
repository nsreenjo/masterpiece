@extends('dashboard.layout.master')
@section('title','Category View')
@section('content')
    <div class="text-left">
        <button class="btn ">
            <a href="{{ route('categories.index') }}" class="btn btn-primary p-2 float-start">Back to List</a>
        </button>
    </div>
    <div class="card">
        <h5 class="card-header">Category Details</h5>
        <div class="card-body">
            <div class="mb-3">
                <label for="category_id" class="form-label">Category ID:</label>
                <p>{{ $category->category_id }}</p>
            </div>

            <div class="mb-3">
                <label for="mall_name" class="form-label">Category:</label>
                <p>{{ $category->category_name }}</p>
            </div>
            <div class="mb-3">
                <label for="mall_descrbtion" class="form-label">Category Description:</label>
                <p>{{ $category->category_descrbtion }}</p>
            </div>
            <div class="mb-3">
                <label for="mall_image" class="form-label">Category Image:</label><br>
                <img src="{{ asset('uploads/categories/' . $category->category_img) }}" alt="Category Image" width="150">
            </div>

          
        </div>
    </div>
@endsection
