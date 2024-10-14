@extends('dashboard.layout.master')
@section('title', 'Edit category')

@section('content')
    <div class="text-left">
        <button class="btn">
            <a href="{{ route('categories.index') }}" class="btn btn-primary p-2 float-start">Back to List</a>
        </button>
    </div>
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Edit category</h5>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif      
            <form action="{{ route('categories.update', $category->category_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body demo-vertical-spacing demo-only-element">

                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" name="category_name" value="{{ $category->category_name }}" class="form-control" id="categoryName" placeholder="category Name">
                        <label for="categoryName">Name</label>
                    </div>

                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" name="category_descrbtion" value="{{ $category->category_descrbtion }}" class="form-control" id="categoryDescription" placeholder="category Description">
                        <label for="categoryDescription">Description</label>
                    </div>

                    <div class="mb-3">
                        <label for="category_img" class="form-label">Category image:</label><br>
                        <img src="{{ asset('uploads/categories/' . $category->category_img) }}" alt="category img" width="150">
                    </div>

                    <div class="form-floating form-floating-outline mb-6">
                        <input type="file" name="category_img" class="form-control">
                        <label for="categoryImage" class="form-label">Upload Image (optional)</label>
                    </div>

                    <button class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection  
