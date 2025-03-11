<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script>
        function togglePasswordVisibility(id) {
            let input = document.getElementById(id);
            input.type = input.type === "password" ? "text" : "password";
        }
    </script>
</head>
<body>
    <div class="container">
        <img src="images/logo.png" alt="Logo" class="logo">
        <h2 style="color:black;">Login</h2>
        <h3 style="color:#9a9a9a; font-size: 100%; margin-bottom: 20px;">Welcome back to Sport Indirect</h3>
        
        @if(session('error'))
            <p class="error" style="display: block;">{{ session('error') }}</p>
        @endif

        <form action="/login" method="POST">
            @csrf
            <div class="input-group">
                <label>Username or Email</label>
                <input type="text" name="username_or_email">
                @error('username_or_email')<p class="error" style="display: block;">{{ $message }}</p>@enderror
            </div>
            <div class="input-group">
                <label>Password</label>
                <div class="input-wrapper">
                    <input type="password" name="password" id="password">
                    <span class="eye-icon" onclick="togglePasswordVisibility('password')">👁</span>
                </div>
                @error('password')<p class="error" style="display: block;">{{ $message }}</p>@enderror
            </div>
            <button class="btn" type="submit">Login</button>
        </form>

        <div class="links">
            <a href="/forgotpassword">Forgot Password?</a> 
            <span>|</span>
            <a href="/register">Register</a>
        </div>

    </div>
</body>
</html>
