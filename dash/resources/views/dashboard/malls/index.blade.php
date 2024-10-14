@extends('dashboard.layout.master')
@section('title', 'Malls')
@section('content')
    <div class="text-left">
    <a href="{{ route('malls.create') }}" class="btn btn-success waves-effect waves-light">Add Mall</a>
    </div>
    <div class="card">
        <h5 class="card-header">Mall</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($malls as $mall)
                        <tr>
                            <td>{{ $mall->mall_id }}</td>
                            <td><img src="{{ asset('uploads/malls/' . $mall->mall_image) }}" alt="Mall Logo" width="50"></td>

                            <td>{{ $mall->mall_name }}</td>
                            <td>{{ $mall->mall_address }}</td>
                            <td>{{ $mall->mall_descrbtion }}</td>
                            <td>
                                <a href="{{ route('malls.show', $mall->mall_id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('malls.edit', $mall->mall_id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('malls.destroy', $mall->mall_id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm dlt-btn-t" onclick="confirmDelete({{ $mall->mall_id }})">Delete</button>
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


