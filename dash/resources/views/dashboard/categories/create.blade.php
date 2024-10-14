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
                    <!-- Select Mall -->
                    <div class="mb-3">
                        <label for="mall_id" class="form-label">Select Mall</label>
                        <select name="mall_id" class="form-select" id="mall_id">
                            <option value="">Select a Mall</option>
                            @foreach($malls as $mall)
                                <option value="{{ $mall->mall_id }}" {{ old('mall_id') == $mall->mall_id ? 'selected' : '' }}>
                                    {{ $mall->mall_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Category Name -->
                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" name="category_name" value="{{ old('category_name') }}" class="form-control" id="exampleFormControlInput1" placeholder="Category Name">
                        <label for="exampleFormControlInput1">Name</label>
                    </div>

                    <!-- Category Description -->
                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" name="category_descrbtion" value="{{ old('category_descrbtion') }}" class="form-control" id="exampleFormControlInput3" placeholder="Category Description">
                        <label for="exampleFormControlInput3">Description</label>
                    </div>

                    <!-- Upload Image -->
                    <div class="form-floating form-floating-outline mb-6">
                        <input type="file" name="category_img" class="form-control" id="exampleFormControlInput4">
                        <label for="exampleFormControlInput4">Upload Image</label>
                    </div>

                    <!-- Add Category Button -->
                    <button class="btn btn-success">Add +</button>
                </div>
            </form>
        </div>
    </div>
@endsection
