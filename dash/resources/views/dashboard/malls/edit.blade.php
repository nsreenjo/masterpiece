@extends('dashboard.layout.master')
@section('title', 'Edit Mall')

@section('content')
    <div class="text-left">
        <button class="btn">
            <a href="{{ route('malls.index') }}" class="btn btn-primary p-2 float-start">Back to List</a>
        </button>
    </div>
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Edit Mall</h5>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif      
            <form action="{{ route('malls.update', $mall->mall_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body demo-vertical-spacing demo-only-element">

                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" name="mall_name" value="{{ $mall->mall_name }}" class="form-control" id="mallName" placeholder="mall Name">
                        <label for="mallName">Name</label>
                    </div>

                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" name="mall_address" value="{{ $mall->mall_address }}" class="form-control" id="malladress" placeholder="mall adress">
                        <label for="malladress">Adress</label>
                    </div>

                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" name="mall_descrbtion" value="{{ $mall->mall_descrbtion }}" class="form-control" id="mallDescription" placeholder="mall Description">
                        <label for="mallDescription">Description</label>
                    </div>

                    <div class="mb-3">
                        <label for="mall_Image" class="form-label">Current Category Image:</label><br>
                        <img src="{{ asset('uploads/malls/' . $mall->mall_image) }}"alt="mall Image" width="150">
                    </div>

                    <div class="form-floating form-floating-outline mb-6">
                        <input type="file" name="mall_image" class="form-control">
                        <label for="mallImage" class="form-label">Upload New Image (optional)</label>
                    </div>

                    <button class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
