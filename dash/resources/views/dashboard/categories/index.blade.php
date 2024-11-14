@extends('dashboard.layout.master')
@section('title', 'Categories List')
@section('content')
    <div class="text-left mb-3">
        <a href="{{ route('categories.create') }}" class="btn btn-success waves-effect waves-light">+ Add Category</a>
    </div>
    
    <div class="card">
        <h5 class="card-header">Categories List</h5>
        <div class="table-responsive text-nowrap">
            @if($categories->isEmpty())
                <div class="alert alert-warning">No categories available.</div>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->category_id }}</td>
                                <td><img src="{{ asset('uploads/categories/' . $category->category_img) }}" alt="Category Image" width="50"></td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->category_descrbtion }}</td>
                                <td>
                                    <a href="{{ route('categories.show', $category->category_id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('categories.edit', $category->category_id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('categories.destroy', $category->category_id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm dlt-btn-t">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
                            button.closest('form').submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection
