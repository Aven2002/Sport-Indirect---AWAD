<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home - Sport Indirect</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

@extends('layouts.user')

@section('content')

<body>
    <!-- Slideshow Section -->
    <div class="container-fluid p-0 position-relative">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/banner1.jpg') }}" class="d-block w-100 img-fluid" alt="Banner 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/banner2.jpg') }}" class="d-block w-100 img-fluid" alt="Banner 2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/banner3.jpg') }}" class="d-block w-100 img-fluid" alt="Banner 3">
                </div>
            </div>
            
            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            
            <!-- Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2"></button>
            </div>
        </div>
    </div>

    <!-- Popular Sports Brands -->
    <div class="container my-5">
    <h3 class="text-center mb-4">Popular Sports Brands</h3>
    <div class="d-flex justify-content-center align-items-center flex-wrap gap-4">
        <a href="{{ url('/products?brand=Adidas') }}">
            <img src="{{ asset('images/Brand_Logo/YONEX.png') }}" class="brand-logo">
        </a>
        <a href="{{ url('/products?brand=Puma') }}">
            <img src="{{ asset('images/Brand_Logo/LI- NING.png') }}" class="brand-logo">
        </a>
        <a href="{{ url('/products?brand=Under Armour') }}">
            <img src="{{ asset('images/Brand_Logo/VICTOR.png') }}" class="brand-logo">
        </a>
    </div>
</div>

    <!-- Featured Products -->
    <section class="container text-center my-5">
        <h2 class="text-white">Featured Products</h2>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card bg-dark text-white">
                    <img src="{{ asset('images/category-tennis.png') }}" class="card-img-top">
                    <div class="card-body">
                        <h3>Product Name 1</h3>
                        <p>$99.99</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-dark text-white">
                    <img src="{{ asset('images/category-tennis.png') }}" class="card-img-top">
                    <div class="card-body">
                        <h3>Product Name 2</h3>
                        <p>$129.99</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Animated Product Introduction -->
    <section class="container text-center my-5">
        <h2 class="text-white">Our Latest Collection</h2>
        <div class="d-flex flex-column align-items-center">
            <img src="{{ asset('images/animation.gif') }}" class="img-fluid w-75">
            <p>Experience the latest innovation in sports gear with our new collection. Designed for performance and comfort.</p>
        </div>
    </section>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
@endsection
