<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sport Indirect - @yield('title', 'Home')</title>
  <link rel="stylesheet" href="{{ asset('css/userlayout.css') }}">
</head>
<body>
  <!-- Header Section -->
  <header class="navbar">
    <!-- Top Navigation -->
    <div class="top-nav">
      <a href="{{ route('findstore') }}" class="store-link">Find a Store</a>
      <a href="help" class="help-link">Help</a>
      <a href="{{ route('register') }}" class="join-link">Join Us</a>
      <a href="{{ route('login') }}" class="sign-in-link">Sign In</a>
    </div>
    <!-- Main Navigation -->
    <!-- Main Navigation -->
    <div class="main-nav">
      <a class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="Nike Logo">
      </a>
      <nav class="menu">
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ route('product') }}">Men</a>
        <a href="{{ route('womenproduct') }}">Women</a>
        <a href="{{ route('kidproduct') }}">Kids</a>
      </nav>
      <div class="right-icons">
        <input type="text" class="search-bar" placeholder="Search">
        <a href="{{ url('/cart') }}" class="cart-icon">🛒</a>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main>
    @yield('content')
  </main>

  <!-- Footer Section -->
  <footer class="footer">
    <div class="footer-container">
      <div class="footer-links">
        <div class="footer-column">
          <h4>Resources</h4>
          <a href="{{ route('findstore') }}">Find A Store</a>
          <a href="{{ route('register') }}">Become A Member</a>
        </div>
        <div class="footer-column">
          <h4>Help</h4>
          <a href="order">Order Status</a>
          <a href="contactus">Contact Us</a>
        </div>
        <div class="footer-column">
          <h4>Company</h4>
          <a href="aboutus">About Sport Indirect</a>
        </div>
      </div>
      <div class="footer-bottom">
        <p>© 2025 Sport Indirect, Inc. All rights reserved</p>
        <div class="footer-region">
          🌐 Malaysia
        </div>
      </div>
    </div>
  </footer>
</body>
</html>
