@extends('dashboard.layout.master')
@section('title', 'products')
@section('content')
    <div class="text-left mb-3">
        <a href="{{ route('products.create') }}" class="btn btn-success waves-effect waves-light">Add product</a>
    </div>
    <div class="card  mt-3 ms-3">
        <h5 class="card-header">product</h5>
        <div class="table-responsive text-nowrap mt-3 "> <!-- إضافة مسافة أعلى الجدول وأيضًا إلى اليسار -->
        <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>categories</th>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->product_id }}</td>
                            <td>{{ $product->category->category_name }}</td>
                            <td><img src="{{ asset('uploads/products/' . $product->product_image) }}" alt="$product Logo" width="50"></td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->product_descrbtion }}</td>
                            <td>{{ $product->product_price }}</td>
                            <td>
                                <a href="{{ route('products.show', $product->product_id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('products.edit', $product->product_id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('products.destroy', $product->product_id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm dlt-btn-t" onclick="confirmDelete({{ $product->product_id }})">Delete</button>
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
