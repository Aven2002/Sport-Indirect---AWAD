<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport Indirect Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script>
        function validateInput(input, regex, errorId) {
            let errorElement = document.getElementById(errorId);
            if (!regex.test(input.value)) {
                errorElement.style.display = "block";
            } else {
                errorElement.style.display = "none";
            }
        }
        function checkPasswordsMatch() {
            let password = document.getElementById("password").value;
            let confirmPassword = document.getElementById("confirm_password").value;
            let errorElement = document.getElementById("confirmPasswordError");
            if (password !== confirmPassword || password === "") {
                errorElement.style.display = "block";
            } else {
                errorElement.style.display = "none";
            }
        }
        function togglePasswordVisibility(id, iconId) {
            let input = document.getElementById(id);
            let icon = document.getElementById(iconId);
            if (input.type === "password") {
                input.type = "text";
                icon.classList.replace("bi-eye", "bi-eye-slash");
            } else {
                input.type = "password";
                icon.classList.replace("bi-eye-slash", "bi-eye");
            }
        }
        function validateForm(event) {
            let checkBox = document.getElementById("agree");
            let errorMessage = document.getElementById("agreeError");
            if (!checkBox.checked) {
                errorMessage.style.display = "block";
                event.preventDefault();
            } else {
                errorMessage.style.display = "none";
            }
        }
        function validateDOB() {
            let dobInput = document.querySelector('input[name="dob"]');
            let dobError = document.getElementById("dobError");
            let selectedDate = new Date(dobInput.value);
            let today = new Date();
            if (selectedDate > today) {
                dobError.style.display = "block";
            } else {
                dobError.style.display = "none";
            }
        }
    </script>
</head>

<body class="d-flex justify-content-center align-items-center vh-100 p-3" 
    style="background: url('/images/background.jpeg') no-repeat center center fixed; background-size: cover;">

    <div class="container bg-white p-4 rounded shadow-lg text-center" style="max-width: 400px; opacity: 0.95;">
        <img src="images/logo.png" alt="Logo" class="img-fluid mb-2" style="width: 160px;">
        <h2 class="text-dark fw-bold">Sign Up</h2>
        <h3 class="text-secondary fs-6 mb-3">Be part of Sport Indirect</h3>

        @if(session('success'))
            <p class="text-success">{{ session('success') }}</p>
        @endif

        <form action="/register" method="POST" onsubmit="validateForm(event)">
            @csrf
            <div class="mb-3 text-start">
                <label class="form-label fw-bold text-dark">Email</label>
                <input type="email" name="email" class="form-control border-0 shadow-none bg-light" required 
                    oninput="validateInput(this, /^[^\s@]+@[^\s@]+\.[^\s@]+$/, 'emailError')">
                <p class="text-danger small mt-1" id="emailError" style="display: none;">Enter a valid email address.</p>
            </div>

            <div class="mb-3 text-start">
                <label class="form-label fw-bold text-dark">Username</label>
                <input type="text" name="first_name" class="form-control border-0 shadow-none bg-light" required 
                    oninput="validateInput(this, /^[A-Za-z]{2,}$/, 'firstNameError')">
                <p class="text-danger small mt-1" id="firstNameError" style="display: none;">Username must be at least 2 letters.</p>
            </div>

            <div class="mb-3 text-start">
                <label class="form-label fw-bold text-dark">Date of Birth</label>
                <input type="date" name="dob" class="form-control border-0 shadow-none bg-light" required oninput="validateDOB()">
                <p class="text-danger small mt-1" id="dobError" style="display: none;">Date of birth cannot be in the future.</p>
            </div>

            <div class="mb-3 text-start">
                <label class="form-label fw-bold text-dark">Password</label>
                <div class="input-group">
                    <input type="password" id="password" name="password" class="form-control border-0 shadow-none bg-light" required
                        oninput="validateInput(this, /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{6,}$/, 'passwordError')">
                    <span class="input-group-text bg-light border-0">
                        <i id="eyeIcon1" class="bi bi-eye" onclick="togglePasswordVisibility('password', 'eyeIcon1')" style="cursor: pointer;"></i>
                    </span>
                </div>
                <p class="text-danger small mt-1" id="passwordError" style="display: none;">Password must contain at least 1 uppercase letter, 1 lowercase letter, 1 number, 1 symbol, and be at least 6 characters long.</p>
            </div>

            <div class="mb-3 text-start">
                <label class="form-label fw-bold text-dark">Confirm Password</label>
                <div class="input-group">
                    <input type="password" id="confirm_password" name="confirm_password" class="form-control border-0 shadow-none bg-light" required oninput="checkPasswordsMatch()">
                    <span class="input-group-text bg-light border-0">
                        <i id="eyeIcon2" class="bi bi-eye" onclick="togglePasswordVisibility('confirm_password', 'eyeIcon2')" style="cursor: pointer;"></i>
                    </span>
                </div>
                <p class="text-danger small mt-1" id="confirmPasswordError" style="display: none;">Passwords do not match.</p>
            </div>

            <div class="mb-3 text-start">
                <label class="form-label fw-bold text-dark">Security Question</label>
                <select name="security_question" class="form-select border-0 shadow-none bg-light">
                    @foreach($securityQuestions as $question)
                        <option value="{{ $question }}">{{ $question }}</option>
                    @endforeach
                </select>
                <input type="text" name="security_answer" class="form-control border-0 shadow-none bg-light mt-2" placeholder="Enter your answer">
            </div>

            <div class="form-check text-start mt-3">
                <input class="form-check-input" type="checkbox" id="agree" required>
                <label class="form-check-label text-dark small" for="agree">
                    Yes, I would like to receive birthday specials, member exclusive offers, and the latest promotions from Sport Indirect.
                </label>
                <p class="text-danger small mt-1" id="agreeError" style="display: none;">You must agree to continue.</p>
            </div>

            <button class="btn btn-primary w-100 mt-3" type="submit">Register</button>
            <p class="mt-3 small">Already have an account? <a href="/login" class="text-primary text-decoration-none fw-bold">Log in here</a></p>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
