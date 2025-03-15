<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home - Sport Indirect</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

@extends('layout.userlayout')

@section('content')

<body>
    <!-- Slideshow Section -->
    <div class="container-fluid p-0 position-relative">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/banner1.jpg') }}" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/banner2.jpg') }}" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/banner3.jpg') }}" class="d-block w-100">
                </div>
            </div>
            
            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
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

    <!-- Sports Equipment Categories -->
    <section class="container text-center my-5">
        <h2 class="text-white">Shop by Category</h2>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ route('product', ['category' => 'man']) }}" class="btn btn-dark">🏀 Man</a>
            <a href="{{ route('womenproduct', ['category' => 'women']) }}" class="btn btn-dark">⚽ Women</a>
            <a href="{{ route('kidproduct', ['category' => 'kid']) }}" class="btn btn-dark">🎾 Kid</a>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
@endsection
