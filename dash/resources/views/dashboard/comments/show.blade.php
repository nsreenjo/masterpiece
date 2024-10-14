@extends('dashboard.layout.master')
@section('title', 'Comment View')
@section('content')
    <div class="text-left">
        <button class="btn ">
            <a href="{{ route('comments.index') }}" class="btn btn-primary p-2 float-start">Back to List</a>
        </button>
    </div>
    <div class="card">
        <h5 class="card-header">Comment Details</h5>
        <div class="card-body">
            <div class="mb-3">
                <label for="comment_id" class="form-label">Comment ID:</label>
                <p>{{ $comment->comment_id }}</p>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content:</label>
                <p>{{ $comment->content }}</p>
            </div>
            <div class="mb-3">
                <label for="comment_id" class="form-label">product Name:</label>
                <p>{{ $comment->product->product_name }}</p>
            </div>

            <div class="mb-3">
                <label for="user_first_name" class="form-label">User First Name:</label>
                <p>{{ $comment->user->user_first_name }}</p>
            </div>
            <div class="mb-3">
                <label for="user_last_name" class="form-label">User Last Name:</label>
                <p>{{ $comment->user->user_last_name }}</p>
            </div>
            <div class="mb-3">
                <label for="user_mobile" class="form-label">User Mobile:</label>
                <p>{{ $comment->user->user_mobile }}</p>
            </div>

            <div class="mb-3">
                <label for="product_image" class="form-label">Product Image:</label>
                <div>
                <td><img src="{{ asset('uploads/products/' . $comment->product->product_image) }}" alt="$product Logo" width="50"></td>
                </div>
            </div>

        </div>
    </div>
@endsection
