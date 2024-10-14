@extends('dashboard.layout.master')
@section('title','Mall View')
@section('content')
    <div class="text-left">
        <button class="btn ">
            <a href="{{ route('malls.index') }}" class="btn btn-primary p-2 float-start">Back to List</a>
        </button>
    </div>
    <div class="card">
        <h5 class="card-header">Mall Details</h5>
        <div class="card-body">
            <div class="mb-3">
                <label for="mall_id" class="form-label">Mall ID:</label>
                <p >{{$mall->mall_id}} </p>
            </div>
            <div class="mb-3">
                <label for="mall_name" class="form-label">Mall Name:</label>
                <p>  {{ $mall->mall_name }}</p>
            </div>
            <div class="mb-3">
                <label for="mall_address" class="form-label">Mall Adress:</label>
                <p>  {{ $mall->mall_address }}</p>
            </div>
            <div class="mb-3">
                <label for="mall_descrbtion" class="form-label">Mall Descrbtion:</label>
                <p>  {{ $mall->mall_descrbtion}}</p>
            </div>
            <div class="mb-3">
                <label for="mall_image" class="form-label">Mall image:</label><br>
                <img src="{{ asset('uploads/malls/' . $mall->mall_image) }}" alt="mall img" width="150">
            </div>

        </div>
    </div>
@endsection