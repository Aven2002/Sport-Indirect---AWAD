<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script>
        function validateSecurityAnswer(event) {
            event.preventDefault();
            let answer = document.getElementById("security_answer").value.trim();
            let errorElement = document.getElementById("securityError");

            if (answer === "") {
                errorElement.style.display = "block";
            } else {
                errorElement.style.display = "none";
                document.getElementById("password-reset-section").style.display = "block";
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

        function validatePassword() {
            let password = document.getElementById("password").value;
            let errorElement = document.getElementById("passwordError");
            let regex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{6,}$/;

            if (!regex.test(password)) {
                errorElement.style.display = "block";
            } else {
                errorElement.style.display = "none";
            }
        }

        function togglePasswordVisibility(id) {
            let input = document.getElementById(id);
            input.type = input.type === "password" ? "text" : "password";
        }

        document.addEventListener("DOMContentLoaded", function () {
            const passwordResetForm = document.getElementById("password-reset-form");

            if (passwordResetForm) {
                passwordResetForm.addEventListener("submit", function (event) {
                    event.preventDefault();
                    setTimeout(() => {
                        alert("Password reset successful! Redirecting to login...");
                        window.location.href = "/login"; // Redirect to login page
                    }, 1000);
                });
            }
        });
    </script>
</head>
<body>
    <div class="container">
        <img src="images/logo.png" alt="Logo" class="logo">
        <h2 style="color:black;">Forgot Password</h2>
        
        <form onsubmit="validateSecurityAnswer(event)">
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>
            <div class="input-group">
                <label>Security Question</label>
                <select name="security_question" required>
                    <option value="">Select your security question</option>
                    <option value="pet">What is your first pet’s name?</option>
                    <option value="school">What was your first school’s name?</option>
                    <option value="mother">What is your mother’s maiden name?</option>
                </select>
            </div>
            <div class="input-group">
                <label>Security Answer</label>
                <input type="text" id="security_answer" name="security_answer" required>
                <p class="error" id="securityError">Please enter the correct answer.</p>
            </div>
            <button class="btn" type="submit">Verify</button>
        </form>

        <div class="links">
            <a href="/login">Login</a> | <a href="/register">Register</a>
        </div>

        <div id="password-reset-section" style="display:none;">
            <h3 style="margin-top: 40px;">Reset Your Password</h3>
            <form id="password-reset-form">
                <div class="input-group">
                    <label>Password</label>
                    <div class="input-wrapper">
                        <input type="password" id="password" name="password" required oninput="validatePassword()">
                        <span class="eye-icon" onclick="togglePasswordVisibility('password')">👁</span>
                    </div>
                    <p class="error" id="passwordError">Must be 6+ characters, 1 uppercase, 1 lowercase, 1 number, 1 symbol.</p>
                </div>

                <div class="input-group">
                    <label>Confirm Password</label>
                    <div class="input-wrapper">
                        <input type="password" id="confirm_password" name="confirm_password" required oninput="checkPasswordsMatch()">
                        <span class="eye-icon" onclick="togglePasswordVisibility('confirm_password')">👁</span>
                    </div>
                    <p class="error" id="confirmPasswordError">Passwords do not match.</p>
                </div>

                <button class="btn" type="submit">Reset Password</button>
            </form>
        </div>
    </div>
</body>
</html>
