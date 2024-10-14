@extends('dashboard.layout.master')
@section('title', 'Edit User')

@section('content')
    <div class="text-left mb-3">
        <a href="{{ route('users.index') }}" class="btn btn-primary">Back to List</a>
    </div>
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Edit User</h5>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif      
            <form action="{{ route('users.update', $user->user_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body demo-vertical-spacing demo-only-element">

                    <div class="form-group mb-4">
                        <label for="name" class="form-label" style="color: #FF69B4;">First Name</label>
                        <input type="text" name="user_first_name" value="{{ $user->user_first_name }}" class="form-control" id="name" placeholder="Enter full name" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="name" class="form-label" style="color: #FF69B4;">Last Name</label>
                        <input type="text" name="user_last_name" value="{{ $user->user_last_name }}" class="form-control" id="name" placeholder="Enter full name" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="email" class="form-label" style="color: #FF69B4;">Email:</label>
                        <input type="email" name="user_email" value="{{ $user->user_email }}" class="form-control" id="email" placeholder="Enter email" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="phone" class="form-label" style="color: #FF69B4;">Phone Number:</label>
                        <input type="text" name="user_mobile" value="{{ $user->user_mobile }}" class="form-control" id="phone" placeholder="Enter phone number" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="address" class="form-label" style="color: #FF69B4;">Address:</label>
                        <input type="text" name="user_address" value="{{ $user->user_address }}" class="form-control" id="address" placeholder="Enter address" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="date_of_birth" class="form-label" style="color: #FF69B4;">Date of Birth:</label>
                        <input type="date" name="date_of_birth" value="{{ $user->date_of_birth }}" class="form-control" id="date_of_birth" required>
                    </div>

                    <div class="mb-3">
                        <label for="user_Image" class="form-label">User Image:</label><br>
                        <img src="{{ asset('uploads/users/' . $user->user_image) }}" alt="User Image" width="150">
                    </div>

                    <div class="form-floating form-floating-outline mb-6">
                        <input type="file" name="user_image" class="form-control">
                        <label for="userImage" class="form-label">Upload New Image (optional)</label>
                    </div>

                    <div class="form-group mb-4">
                        <label for="gender" class="form-label" style="color: #FF69B4;">Gender:</label>
                        <select name="gender" class="form-control" id="gender" required>
                            <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <label for="role" class="form-label" style="color: #FF69B4;">User Role:</label>
                        <select name="role" class="form-control" id="role" required>
                            <option value="admin" {{ $user->type == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="superadmin" {{ $user->type == 'superadmin' ? 'selected' : '' }}>Super Admin</option>
                            <option value="user" {{ $user->type == 'user' ? 'selected' : '' }}>User</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
