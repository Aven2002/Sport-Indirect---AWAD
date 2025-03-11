<!DOCTYPE html>
<body lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About us - Sport Indirect</title>
  <link rel="stylesheet" href="{{ asset('css/aboutus.css') }}">
</head>

@extends('layout.userlayout')

@section('content')

<body>
    <div class="about-page">
        <h1>About Sport Indirect</h1>
        
        <!-- Company Background Section -->
        <div class="company-background">
            <img src="/images/logo.png" alt="Company Background" class="background-image">
            <p class="company-description">
                Sport Indirect began with a passion for athletic excellence and a vision to offer premium sports products that empower athletes at every level. Our journey is driven by a commitment to innovation, quality, and a love for the game.
            </p>
        </div>
        
        <!-- Vision Section -->
        <section class="vision">
            <h2>Our Vision</h2>
            <p>
                Our vision is to be the world’s leading provider of innovative sports solutions, inspiring healthier lifestyles and a more active community across the globe.
            </p>
        </section>
        
        <!-- Mission Section -->
        <section class="mission">
            <h2>Our Mission</h2>
            <p>
                Our mission is to empower athletes of all levels by delivering top-quality sports equipment, apparel, and accessories. We are dedicated to continuous innovation, sustainability, and excellence in everything we do.
            </p>
        </section>
    </div>
</body>
</html>
@endsection
