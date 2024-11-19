@extends('dashboard.layout.master')
@section('title', 'Orders List')

@section('content')
    <div class="card">
        <h5 class="card-header">Orders List</h5>
        <div class="table-responsive text-nowrap">
            @if($orders->isEmpty())
                <div class="alert alert-warning">No orders available.</div>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>User</th>
                            <th>Mall</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->order_id }}</td>
                                <td>{{ $order->user->user_first_name }}</td>
                                <td>{{ $order->mall->mall_name ?? 'N/A' }}</td>
                                <td>{{ number_format($order->order_total_pric, 2) }}</td>
                                <td>{{ ucfirst($order->order_status) }}</td>
                                <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    <a href="{{ route('orders.show', $order->order_id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('orders.edit', $order->order_id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('orders.destroy', $order->order_id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm dlt-btn-t">Delete</button>
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
