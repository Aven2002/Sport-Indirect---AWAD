
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport Indirect Register</title>
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
        function togglePasswordVisibility(id) {
            let input = document.getElementById(id);
            input.type = input.type === "password" ? "text" : "password";
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
<body>
    <div class="container">
        <img src="images/logo.png" alt="Logo" class="logo">
        <h2 style="color:black;">Sign Up for Sport Indirect</h2>
        <h3 style="color:#9a9a9a; font-size: 90%; margin-top: -5px;">Be part of Sport Indirect</h3>

        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        <form action="/register" method="POST" onsubmit="validateForm(event)">
            @csrf
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" required oninput="validateInput(this, /^[^\s@]+@[^\s@]+\.[^\s@]+$/, 'emailError')">
                <p class="error" id="emailError">Enter a valid email address.</p>
            </div>
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="first_name" required oninput="validateInput(this, /^[A-Za-z]{2,}$/, 'firstNameError')">
                <p class="error" id="firstNameError">Username must be at least 2 letters.</p>
            </div>
            <div class="input-group">
                <label>Date of Birth</label>
                <input type="date" name="dob" required oninput="validateDOB()">
                <p class="error" id="dobError">Date of birth cannot be in the future.</p>
            </div>
            <div class="input-group">
                <label>Password</label>
                <div class="input-wrapper">
                    <input type="password" id="password" name="password" required 
                        oninput="validateInput(this, /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{6,}$/, 'passwordError')">
                    <span class="eye-icon" onclick="togglePasswordVisibility('password')">👁</span>
                </div>
                <p class="error" id="passwordError">Password must contain at least 1 uppercase letter, 1 lowercase letter, 1 number, 1 symbol, and be at least 6 characters long.</p>
            </div>

            <div class="input-group">
                <label>Confirm Password</label>
                <div class="input-wrapper">
                    <input type="password" id="confirm_password" name="confirm_password" required oninput="checkPasswordsMatch()">
                    <span class="eye-icon" onclick="togglePasswordVisibility('confirm_password')">👁</span>
                </div>
                <p class="error" id="confirmPasswordError">Passwords do not match.</p>
            </div>
            <div class="input-group">
                <label>Security Question</label>
                <select name="security_question">
                    @foreach($securityQuestions as $question)
                        <option value="{{ $question }}">{{ $question }}</option>
                    @endforeach
                </select>
                <input type="text" name="security_answer" placeholder="Enter your answer">
            </div>
            <div class="checkbox-group">
                <label for="agree">
                    <input type="checkbox" id="agree" required>
                    Yes, I would like to receive birthday specials, member exclusive offers, and the latest marketing and promotional offers from My Sony Rewards.
                </label>
                <p class="error" id="agreeError">You must agree to continue.</p>
            </div>

            <button class="btn" type="submit">Register</button>
            <p style="margin-top: 15px; font-size: 14px;">
                Already have an account? <a href="/login" style="color: #2841a7; font-weight: bold;">Log in here</a>
            </p>
        </form>
    </div>
</body>
</html>
