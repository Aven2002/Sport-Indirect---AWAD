<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script>
        function togglePasswordVisibility() {
            let input = document.getElementById("password");
            let icon = document.getElementById("eyeIcon");

            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("bi-eye");
                icon.classList.add("bi-eye-slash");
            } else {
                input.type = "password";
                icon.classList.remove("bi-eye-slash");
                icon.classList.add("bi-eye");
            }
        }
    </script>
</head>
<body class="d-flex justify-content-center align-items-center vh-100 p-3" 
    style="background: url('/images/background.jpeg') no-repeat center center fixed; background-size: cover;">

    <div class="container bg-white p-4 rounded shadow-lg text-center" style="max-width: 400px; opacity: 0.95;">
        <img src="images/logo.png" alt="Logo" class="img-fluid mb-2" style="width: 160px;">
        <h2 class="text-dark fw-bold">Login</h2>
        <h3 class="text-secondary fs-6 mb-3">Welcome back to Sport Indirect</h3>
        
        @if(session('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif

        <form action="/login" method="POST">
            @csrf
            <div class="mb-3 text-start">
                <label class="form-label fw-bold text-dark">Username or Email</label>
                <input type="text" name="username_or_email" class="form-control border-0 shadow-none bg-light">
                @error('username_or_email')<p class="text-danger small mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-3 text-start">
                <label class="form-label fw-bold text-dark">Password</label>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control border-0 shadow-none bg-light">
                    <span class="input-group-text bg-light border-0">
                        <i id="eyeIcon" class="bi bi-eye" onclick="togglePasswordVisibility()" style="cursor: pointer;"></i>
                    </span>
                </div>
                @error('password')<p class="text-danger small mt-1">{{ $message }}</p>@enderror
            </div>

            <button class="btn btn-primary w-100 mt-3" type="submit">Login</button>
        </form>

        <div class="mt-3">
            <a href="/forgotpassword" class="text-primary text-decoration-none">Forgot Password?</a> 
            <span>|</span>
            <a href="/register" class="text-primary text-decoration-none">Register</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
