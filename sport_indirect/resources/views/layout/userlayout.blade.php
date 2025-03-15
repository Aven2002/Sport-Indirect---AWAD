<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sport Indirect - @yield('title', 'Home')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="{{ asset('css/userlayout.css') }}">
</head>

<body class="bg-black text-white">
  <!-- Top Navigation -->
  <div class="bg-dark text-white py-2 border-bottom border-white">
    <div class="container d-flex justify-content-end gap-3">
      <a href="{{ route('findstore') }}" class="text-white text-decoration-none fw-bold">Find a Store</a>
      <a href="help" class="text-white text-decoration-none fw-bold">Help</a>
      <a href="{{ route('register') }}" class="text-white text-decoration-none fw-bold">Join Us</a>
      <a href="{{ route('login') }}" class="text-white text-decoration-none fw-bold">Sign In</a>
    </div>
  </div>

  <!-- Main Navigation -->
  <header class="bg-black border-bottom border-white">
    <div class="container d-flex justify-content-between align-items-center py-3">
      
      <!-- Logo -->
      <a href="{{ url('/') }}">
        <img src="{{ asset('images/logo.png') }}" alt="Sport Indirect Logo" height="85" width="100">
      </a>

      <!-- Category Navigation -->
      <nav class="d-flex gap-4">
        <a href="{{ url('/') }}" class="text-white text-decoration-none fw-bold">Home</a>
        <a href="{{ route('product') }}" class="text-white text-decoration-none fw-bold">Men</a>
        <a href="{{ route('womenproduct') }}" class="text-white text-decoration-none fw-bold">Women</a>
        <a href="{{ route('kidproduct') }}" class="text-white text-decoration-none fw-bold">Kids</a>
      </nav>

      <!-- Search, Cart, Profile -->
      <div class="d-flex gap-3 align-items-center">
        <input type="text" class="form-control bg-black text-white border-white rounded-pill px-3" placeholder="Search" style="width: 170px;">
        <a href="{{ url('/cart') }}" class="fs-4 text-white text-decoration-none">
          <i class="bi bi-cart"></i> <!-- Bootstrap Cart Icon -->
        </a>
        <a href="{{ route('profile') }}" class="fs-4 text-white text-decoration-none" title="Profile">
          <i class="bi bi-person-circle"></i> <!-- Bootstrap Profile Icon -->
        </a>
      </div>

    </div>
  </header>

  <!-- Main Content -->
  <main class="container py-4">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="footer bg-black border-top border-white py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-3">
          <h4 class="text-white">Resources</h4>
          <a href="{{ route('findstore') }}" class="d-block text-white text-decoration-none">Find A Store</a>
          <a href="{{ route('register') }}" class="d-block text-white text-decoration-none">Become A Member</a>
        </div>
        <div class="col-md-4 mb-3">
          <h4 class="text-white">Help</h4>
          <a href="order" class="d-block text-white text-decoration-none">Order Status</a>
          <a href="contactus" class="d-block text-white text-decoration-none">Contact Us</a>
        </div>
        <div class="col-md-4 mb-3">
          <h4 class="text-white">Company</h4>
          <a href="aboutus" class="d-block text-white text-decoration-none">About Sport Indirect</a>
        </div>
      </div>
      <div class="d-flex justify-content-between align-items-center pt-3 border-top border-white">
        <p class="mb-0">© 2025 Sport Indirect, Inc. All rights reserved</p>
        <div class="footer-region">🌐 Malaysia</div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
