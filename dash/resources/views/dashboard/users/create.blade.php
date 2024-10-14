@extends('dashboard.layout.master')
@section('title', 'Create User')

@section('content')
    <div class="text-left">
        <button class="btn">
            <a href="{{ route('users.index') }}" class="btn btn-primary p-2 float-start">Back to List</a>
        </button>
    </div>
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Add User</h5>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body demo-vertical-spacing demo-only-element">

                  <input type="text" name="user_first_name" value="{{ old('user_first_name') }}" class="form-control" id="user_first_name" required>


                    <!-- Last Name -->
                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" name="user_last_name" value="{{ old('user_last_name') }}" class="form-control" id="exampleFormControlInput2" placeholder="Last Name">
                        <label for="exampleFormControlInput2">Last Name</label>
                    </div>

                    <!-- Email -->
                    <div class="form-floating form-floating-outline mb-6">
                        <input type="email" name="user_email" value="{{ old('user_email') }}" class="form-control" id="exampleFormControlInput3" placeholder="Email">
                        <label for="exampleFormControlInput3">Email</label>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
    <label for="user_password">Password</label>
    <input type="password" name="user_password" class="form-control" id="user_password" required>
</div>

<div class="form-group">
    <label for="user_password_confirmation">Confirm Password</label>
    <input type="password" name="user_password_confirmation" class="form-control" id="user_password_confirmation" required>
</div>


                    <!-- Address -->
                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" name="user_address" value="{{ old('user_address') }}" class="form-control" id="exampleFormControlInputAddress" placeholder="Address">
                        <label for="exampleFormControlInputAddress">Address</label>
                    </div>

                    <!-- Gender -->
                    <div class="form-group">
                     <label for="gender">Gender</label>
                     <select name="gender" class="form-control" id="gender" required>
                      <option value="">Select Gender</option>
                     <option value="male">Male</option>
                     <option value="female">Female</option>
                     </select>
                     </div>

                    <!-- Date of Birth -->
                    <div class="form-floating form-floating-outline mb-6">
                        <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" class="form-control" id="exampleFormControlInputDOB" placeholder="Date of Birth">
                        <label for="exampleFormControlInputDOB">Date of Birth</label>
                    </div>

                    <!-- Mobile -->
                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" name="user_mobile" value="{{ old('user_mobile') }}" class="form-control" id="exampleFormControlInput4" placeholder="Mobile">
                        <label for="exampleFormControlInput4">Mobile</label>
                    </div>

                    <!-- Role -->
                    <div class="form-floating form-floating-outline mb-6">
                        <select name="role" class="form-control" id="exampleFormControlSelect1">
                            <option value="" disabled selected>Select Role</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="superadmin" {{ old('role') == 'superadmin' ? 'selected' : '' }}>Super Admin</option>
                            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                        </select>
                        <label for="exampleFormControlSelect1">Role</label>
                    </div>

                    <!-- User Image -->
                    <div class="form-floating form-floating-outline mb-6">
                        <input type="file" name="user_image" class="form-control" id="exampleFormControlInput5">
                        <label for="exampleFormControlInput5">Upload Image</label>
                    </div>

                    <button class="btn btn-success">ADD +</button>
                </div>
            </form>
        </div>
    </div>
@endsection
