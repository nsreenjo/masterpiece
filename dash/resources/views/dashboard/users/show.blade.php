@extends('dashboard.layout.master')
@section('title', 'User View')
@section('content')
    <style>
        .form-group {
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            margin-bottom: 15px;
        }
        .form-label {
            font-weight: bold; 
            color: #333;
            flex-basis: 
        }
        .form-value {
            flex-basis: 65%;
        }
        #userrole{
            color :    #ff69b4;
            font-size :20px
        }
    </style>

    <div class="text-left mb-3">
        <a href="{{ route('users.index') }}" class="btn btn-primary">Back to List</a>
    </div>
    <div class="card">
        <h5 class="card-header">User Details</h5>
        <div class="card-body">
            <div class="form-group">
                <label for="type" id="userrole" class="form-label">Role:</label>
                <p id="userrole" class="form-value">{{ $user->type }}</p>
            </div>
            <hr>

        <div class="card-body">
            <div class="form-group">
                <label for="user_id" class="form-label">User ID:</label>
                <p class="form-value">{{ $user->user_id }}</p>
            </div>
            <hr>
            <div class="form-group">
                <label for="user_first_name" class="form-label">First Name:</label>
                <p class="form-value">{{ $user->user_first_name }}</p>
            </div>
            <hr>
            <div class="form-group">
                <label for="user_last_name" class="form-label">Last Name:</label>
                <p class="form-value">{{ $user->user_last_name }}</p>
            </div>
            <hr>
            <div class="form-group">
                <label for="user_email" class="form-label">Email:</label>
                <p class="form-value">{{ $user->user_email }}</p>
            </div>
            <hr>
            <div class="form-group">
                <label for="user_mobile" class="form-label">Mobile:</label>
                <p class="form-value">{{ $user->user_mobile }}</p>
            </div>
            <hr>
            <div class="form-group">
                <label for="user_address" class="form-label">Address:</label>
                <p class="form-value">{{ $user->user_address }}</p>
            </div>
            <hr>
            <div class="form-group">
                <label for="gender" class="form-label">Gender:</label>
                <p class="form-value">{{ $user->gender }}</p>
            </div>
            <hr>
            <div class="form-group">
                <label for="date_of_birth" class="form-label">Date of Birth:</label>
                <p class="form-value">{{ $user->date_of_birth }}</p>
            </div>
            <hr>
            <div class="form-group">
                <label for="user_image" class="form-label">Profile Image:</label>
                <p class="form-value"><img src="{{ asset('uploads/users/' . $user->user_image) }}" alt="User Image" width="150"></p>
            </div>
        </div>
    </div>
@endsection
