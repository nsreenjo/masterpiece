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
                <label for="category_id" class="form-label">category ID:</label>
                <p >{{$category->category_id}} </p>
            </div>


            <div class="mb-3">
                <label for="mall_name" class="form-label">Mall Name:</label>
                <p>  {{ $category->mall->mall_name }}</p>
            </div>


            <div class="mb-3">
                <label for="mall_name" class="form-label">category:</label>
                <p>  {{ $category->category_name }}</p>
            </div>
            <div class="mb-3">
                <label for="mall_descrbtion" class="form-label">category Descrbtion:</label>
                <p>  {{ $category->category_descrbtion}}</p>
            </div>
            <div class="mb-3">
                <label for="mall_image" class="form-label">category image:</label><br>
                <img src="{{ asset('uploads/categories/' . $category->category_img) }}" alt="mall img" width="150">
            </div>

        </div>
    </div>
@endsection