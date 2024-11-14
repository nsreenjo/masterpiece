@include('landingpage.include.top')



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .inner {
            border: 2px solid #ccc;
            border-radius: 5px; 
            padding: 20px; 
            background-color: #fff; 
        }

        .form-group {
            display: flex; /* استخدام flexbox لجعل الحقول جنبًا إلى جنب */
            justify-content: space-between; /* توزيع المسافة بين الحقول */
        }

        .form-wrapper {
            margin-bottom: 15px; /* مسافة سفلية بين الحقول */
        }

        .half-width {
            flex: 1; /* كل حقل يأخذ نفس المساحة */
            margin-right: 10px; /* إضافة مساحة بين الحقول */
        }

        .half-width:last-child {
            margin-right: 0; /* إزالة المساحة من آخر حقل */
        }
    </style>
</head>
<body>
    <div class="wrapper" style="background-image: url('images/bg-registration-form-2.jpg'); border:1px;">
        <div class="inner">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <h3>Dalilak In Aqaba</h3>
                
                <div class="form-group">
                    <div class="form-wrapper">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="user_first_name" value="{{ old('user_first_name') }}" required>
                    </div>
                    <div class="form-wrapper">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="user_last_name" value="{{ old('user_last_name') }}" required>
                    </div>
                </div>
                
                <div class="form-wrapper">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="user_email" value="{{ old('user_email') }}" required>
                </div>
                
                <div class="form-group">
                    <div class="half-width form-wrapper">
                        <label for="mobile">Mobile</label>
                        <input type="text" class="form-control" id="mobile" name="user_mobile" value="{{ old('user_mobile') }}" required>
                    </div>
                    <div class="half-width form-wrapper">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="user_address" value="{{ old('user_address') }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-wrapper">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="" disabled selected>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-wrapper">
                        <label for="birthdate">Birthdate</label>
                        <input type="date" class="form-control" id="birthdate" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-wrapper">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="user_password" required>
                    </div>
                    <div class="form-wrapper">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="user_password_confirmation" required>
                    </div>
                </div>
                
                <button type="submit">Register Now</button>

            </form>
        </div>
    </div>
</body>
</html>
