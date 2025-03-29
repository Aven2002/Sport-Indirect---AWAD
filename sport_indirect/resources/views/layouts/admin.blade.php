<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - @yield('title', 'Dashboard')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/adminlayout.css') }}">
</head>

<body class="bg-white text-dark">
  <!-- Admin Header -->
  <header class="admin-header bg-dark text-white py-3">
      <div class="container d-flex align-items-center justify-content-center gap-3">
          <img src="{{ asset('images/ComLogo.png') }}" alt="Logo" class="admin-logo" width="70">
          <h1 class="fs-2 fw-bold mb-0">Admin Dashboard</h1>
      </div>
  </header>


  <!-- Content Section -->
  <div class="container py-4 flex-grow-1">
      @yield('content')
  </div>

  <!-- Footer (Full Width & Fixed to Bottom) -->
  <footer class="bg-dark text-white text-center py-3 mt-auto w-100">
      <p class="mb-0">&copy; {{ date('Y') }} Sport Indirect. All rights reserved.</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Custom Script for Active Button -->
  <script>
      document.addEventListener("DOMContentLoaded", function () {
          const links = document.querySelectorAll(".menu-btn");

          links.forEach(link => {
              if (link.href === window.location.href) {
                  link.classList.add("active");
              }

              link.addEventListener("click", function () {
                  links.forEach(btn => btn.classList.remove("active"));
                  this.classList.add("active");
              });
          });
      });
  </script>
</body>
</html>
