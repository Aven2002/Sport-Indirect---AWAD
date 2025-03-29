<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'User Page')</title>
     <!-- Bootstrap CDN -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>


    {{-- Header --}}
    <header class="bg-dark text-white py-3">
        <div class="container d-flex justify-content-between align-items-center flex-wrap px-4">
            
            <!-- Logo -->
            <a href="{{ url('/') }}" class="d-flex align-items-center text-white text-decoration-none">
                <img src="{{ asset('images/comLogo.png') }}" alt="Sport Indirect Logo" height="100" width="300">
            </a>

            <!-- Search Bar -->
            <div class="d-flex align-items-center flex-grow-1 mx-3" style="max-width: 250px;">
                <input type="text" 
                    class="form-control bg-black text-white border-white rounded-pill px-3"
                    placeholder="Search..."
                    style="width: 100%;"
                    onfocus="this.style.backgroundColor='rgba(255,255,255,0.1)';"
                    onblur="this.style.backgroundColor='black';">
            </div>

            <!-- Location & Cart & Profile Icons -->
            <div class="d-flex gap-4 align-items-center">
                <a href="{{ url('/store') }}" class="fs-5 text-white text-decoration-none d-flex align-items-center gap-1">
                    <i class="bi bi-geo-alt fs-4"></i> 
                </a>
                <a href="{{ url('/cart') }}" class="fs-5 text-white text-decoration-none d-flex align-items-center gap-1">
                    <i class="bi bi-cart fs-4"></i> 
                </a>
                <a href="{{ url('/profile') }}" class="fs-5 text-white text-decoration-none d-flex align-items-center gap-1">
                    <i class="bi bi-person-lines-fill fs-4"></i>
                </a>
            </div>
        </div>
    </header>



    {{-- Navigation Bar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/product') }}">Sports</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/contactUs') }}">Brands</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/aboutUs') }}">About</a></li>
            </ul>
        </div>
    </div>
</nav>


    {{-- Main Content --}}
    <div class="container mt-4">
        @yield('content')
    </div>

    {{-- Footer --}}
    <!-- Footer -->
  <footer class="footer bg-black border-top border-white py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-3">
          <h4 class="text-white">Resources</h4>
          <a href="{{ url('/store') }}" class="d-block text-white text-decoration-none">Find A Store</a>
          <a href="{{ url('register') }}" class="d-block text-white text-decoration-none">Become A Member</a>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
