@include('landingpage.include.top')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Login - Dalilak In Aqaba</title>
    <style>
        .inner {
            border: 2px solid #ccc;
            border-radius: 5px; 
            padding: 70px; 
            background-color: #fff; 
        }
       
      
      
        .register-link {
            margin-top: 35px;
            text-align: center;
        }
        .register-link a {
            color: #007bff; 
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline; 
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="inner">
            @if ($errors->any())
                <div class="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <h3>Login to Dalilak In Aqaba</h3>
                
                <div class="form-wrapper">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="user_email" value="{{ old('user_email') }}" required>
                </div>

                <div class="form-wrapper">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="user_password" required>
                </div>
                
                <button type="submit">Log In</button>

                <div class="register-link">
                    <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
