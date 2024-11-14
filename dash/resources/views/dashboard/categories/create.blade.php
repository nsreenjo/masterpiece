@extends('dashboard.layout.master')
@section('title', 'Create Category')

@section('content')
    <div class="text-left">
        <button class="btn ">
            <a href="{{ route('categories.index') }}" class="btn btn-primary p-2 float-start">Back to List</a>
        </button>
    </div>
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Add Category</h5>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card-body demo-vertical-spacing demo-only-element">
                    <!-- Select Mall based on user email -->
                   

                    <!-- Category Name -->
                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" name="category_name" value="{{ old('category_name') }}" class="form-control" id="exampleFormControlInput1" placeholder="Category Name" required>
                        <label for="exampleFormControlInput1">Name</label>
                    </div>

                    <!-- Category Description -->
                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" name="category_descrbtion" value="{{ old('category_descrbtion') }}" class="form-control" id="exampleFormControlInput3" placeholder="Category Description" required>
                        <label for="exampleFormControlInput3">Description</label>
                    </div>

                    <!-- Upload Image -->
                    <div class="form-floating form-floating-outline mb-6">
                        <input type="file" name="category_img" class="form-control" id="exampleFormControlInput4" required>
                        <label for="exampleFormControlInput4">Upload Image</label>
                    </div>

                    <!-- Add Category Button -->
                    <button class="btn btn-success">Add +</button>
                </div>
            </form>
        </div>
    </div>
@endsection
