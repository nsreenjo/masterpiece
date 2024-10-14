@extends('dashboard.layout.master')
@section('title', 'Users')
@section('content')
    <div class="text-left">
    </div>
    <div class="card">
        <h5 class="card-header">comments</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>content</th>
                        <th>product Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($comments as $comment)
                        <tr>
                            <td>{{ $comment->comment_id }}</td>
                            <td>{{ $comment->user->user_first_name }}</td>
                            <td>{{ $comment->content }}</td>
                            <td>{{ $comment->product->product_name }}</td>
                    
                            <td>
                                <a href="{{ route('comments.show', $comment->comment_id) }}" class="btn btn-info btn-sm">View</a>
                                <form action="{{ route('comments.destroy', $comment->comment_id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm dlt-btn-t">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Wait until the DOM is fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Select all delete buttons with the class 'dlt-btn-t'
            const deleteButtons = document.querySelectorAll('.dlt-btn-t');

            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent the form from submitting
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Submit the form if the user confirms
                            button.closest('form').submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
