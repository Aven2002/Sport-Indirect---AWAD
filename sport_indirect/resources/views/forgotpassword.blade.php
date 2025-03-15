<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    
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
            let icon = document.querySelector(`#${id}-toggle i`);

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
        <img src="images/logo.png" alt="Logo" class="logo mb-3">
        <h2 class="text-dark">Forgot Password</h2>
        
        <form onsubmit="validateSecurityAnswer(event)">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Security Question</label>
                <select class="form-select" name="security_question" required>
                    <option value="">Select your security question</option>
                    <option value="pet">What is your first pet’s name?</option>
                    <option value="school">What was your first school’s name?</option>
                    <option value="mother">What is your mother’s maiden name?</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Security Answer</label>
                <input type="text" class="form-control" id="security_answer" name="security_answer" required>
                <p class="error" id="securityError">Please enter the correct answer.</p>
            </div>
            <button class="btn btn-primary w-100" type="submit">Verify</button>
        </form>

        <div class="links mt-3">
            <a href="/login">Login</a> | <a href="/register">Register</a>
        </div>

        <div id="password-reset-section" class="mt-4" style="display:none;">
            <h3>Reset Your Password</h3>
            <form id="password-reset-form">
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" required oninput="validatePassword()">
                        <span class="eye-icon" id="password-toggle" onclick="togglePasswordVisibility('password')">
                            <i class="bi bi-eye"></i>
                        </span>
                    </div>
                    <p class="error" id="passwordError">Must be 6+ characters, 1 uppercase, 1 lowercase, 1 number, 1 symbol.</p>
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required oninput="checkPasswordsMatch()">
                        <span class="eye-icon" id="confirm_password-toggle" onclick="togglePasswordVisibility('confirm_password')">
                            <i class="bi bi-eye"></i>
                        </span>
                    </div>
                    <p class="error" id="confirmPasswordError">Passwords do not match.</p>
                </div>

                <button class="btn btn-success w-100" type="submit">Reset Password</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
