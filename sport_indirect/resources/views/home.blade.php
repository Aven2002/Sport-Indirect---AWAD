<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home - Sport Indirect</title>
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

@extends('layout.userlayout')

@section('content')

<body>
    <!-- Slideshow Section -->
    <div class="slideshow-container">
        <div class="slides">
            <img src="{{ asset('images/banner1.jpg') }}" class="slide active">
            <img src="{{ asset('images/banner2.jpg') }}" class="slide">
            <img src="{{ asset('images/banner3.jpg') }}" class="slide">
        </div>
        
        <!-- Controls (Left, Stop, Right) -->
        <div class="controls">
            <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
            <button class="stop" onclick="toggleSlideshow()">
                <span id="stopIcon">⏸️</span>
            </button>
            <button class="next" onclick="changeSlide(1)">&#10095;</button>
        </div>
    </div>

    <!-- Featured Products -->
    <section class="featured-products">
        <h2 style="color:black">Featured Products</h2>
        <div class="featured-container">
            <div class="featured-item">
                <img src="{{ asset('images/category-tennis.png') }}" alt="Product 1">
                <h3>Product Name 1</h3>
                <p>$99.99</p>
            </div>
            <div class="featured-item">
                <img src="{{ asset('images/category-tennis.png') }}" alt="Product 2">
                <h3>Product Name 2</h3>
                <p>$129.99</p>
            </div>
        </div>
    </section>

    <!-- Animated Product Introduction -->
    <section class="animated-intro">
        <h2 style="color:black">Our Latest Collection</h2>
        <div class="animated-product">
            <img src="{{ asset('images/animation.gif') }}" alt="Animated Product">
            <p>Experience the latest innovation in sports gear with our new collection. Designed for performance and comfort.</p>
        </div>
    </section>

    <!-- Sports Equipment Categories -->
    <section class="categories">
        <h2 style="color:black">Shop by Category</h2>
        <div class="category-list">
            <a href="{{ route('product', ['category' => 'man']) }}" class="category-item">🏀 Man</a>
            <a href="{{ route('product', ['category' => 'women']) }}" class="category-item">⚽ Women</a>
            <a href="{{ route('product', ['category' => 'kid']) }}" class="category-item">🎾 Kid</a>
        </div>
    </section>


    <!-- Slideshow Script -->
    <script>
        let index = 0;
        let autoSlide = setInterval(nextSlide, 5000); // Auto slide every 5 seconds
        let slides = document.querySelectorAll(".slide");
        let isPlaying = true;

        function changeSlide(direction) {
            slides[index].classList.remove("active");
            index = (index + direction + slides.length) % slides.length;
            slides[index].classList.add("active");
        }

        function nextSlide() {
            changeSlide(1);
        }

        function toggleSlideshow() {
            let stopIcon = document.getElementById("stopIcon");
            if (isPlaying) {
                clearInterval(autoSlide);
                stopIcon.innerHTML = "▶️"; // Play Icon
            } else {
                autoSlide = setInterval(nextSlide, 5000);
                stopIcon.innerHTML = "⏸️"; // Pause Icon
            }
            isPlaying = !isPlaying;
        }
    </script>
</body>
</html>
@endsection
