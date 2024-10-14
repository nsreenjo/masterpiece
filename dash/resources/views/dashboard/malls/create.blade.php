@extends('dashboard.layout.master')
@section('title', 'Create Mall')

@section('content')
    <div class="text-left">
        <button class="btn ">
            <a href="{{ route('malls.index') }}" class="btn btn-primary p-2 float-start">Back to List</a>
        </button>
    </div>
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Add Mall</h5>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('malls.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body demo-vertical-spacing demo-only-element">
                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" name="mall_name" value="{{ old('mall_name') }}" class="form-control" id="exampleFormControlInput1" placeholder="Mall Name">
                        <label for="exampleFormControlInput1">Name</label>
                    </div>
                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" name="mall_address" value="{{ old('mall_address') }}" class="form-control" id="exampleFormControlInput2" placeholder="Mall Address">
                        <label for="exampleFormControlInput2">Address</label>
                    </div>
                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" name="mall_descrbtion" value="{{ old('mall_descrbtion') }}" class="form-control" id="exampleFormControlInput3" placeholder="Mall Description">
                        <label for="exampleFormControlInput3">Description</label>
                    </div>

                    <div class="form-floating form-floating-outline mb-6">
                        <input type="file" name="mall_image" class="form-control" id="exampleFormControlInput4">
                        <label for="exampleFormControlInput4">Upload Image</label>
                    </div>

                    <button class="btn btn-success">ADD +</button>
                </div>
            </form>
        </div>
    </div>
@endsection
