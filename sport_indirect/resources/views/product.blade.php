<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product - Sport Indirect</title>
  <link rel="stylesheet" href="{{ asset('css/product.css') }}">
</head>

@extends('layout.userlayout')

@section('content')

<body>
    @php
    $dummyProducts = [
        [
            'name' => 'Nike Air Force 1',
            'category' => 'Lifestyle',
            'status' => 'New',
            'price' => 'RM 450.00',
            'image' => '/images/category-fitness.png'
        ],
        [
            'name' => 'Nike Revolution 5',
            'category' => 'Running',
            'status' => 'Sale',
            'price' => 'RM 399.00',
            'image' => '/images/category-fitness.png'
        ],
        [
            'name' => 'Nike Kyrie 7',
            'category' => 'Basketball',
            'status' => 'New',
            'price' => 'RM 550.00',
            'image' => '/images/category-fitness.png'
        ],
        [
            'name' => 'Nike Mercurial Superfly',
            'category' => 'Football',
            'status' => 'Hot',
            'price' => 'RM 600.00',
            'image' => '/images/category-fitness.png'
        ],
        // Add more dummy products as needed
    ];
    @endphp

    <!-- Top Controls (Right Aligned) -->
    <div class="top-controls">
        <button class="btn" onclick="toggleSidebar()">Hide Filter</button>

        <div class="filter-dropdown">
            <label for="sort">Sort By:</label>
            <select id="sort">
                <option value="featured">Featured</option>
                <option value="newest">Newest</option>
                <option value="high-low">Price: High-Low</option>
                <option value="low-high">Price: Low-High</option>
            </select>
        </div>
    </div>

    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <h3>Men's Shoes</h3>
            <ul>
                <li><a href="#" data-category="All">All</a></li>
                <li><a href="#" data-category="Lifestyle">Lifestyle</a></li>
                <li><a href="#" data-category="Running">Running</a></li>
                <li><a href="#" data-category="Basketball">Basketball</a></li>
                <li><a href="#" data-category="Football">Football</a></li>
            </ul>
        </div>

        <!-- Product Grid -->
        <div class="product-grid">
            @foreach ($dummyProducts as $product)
                <div class="product-card" data-category="{{ $product['category'] }}">
                    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}">
                    <p class="status">{{ $product['status'] }}</p>
                    <h4>{{ $product['name'] }}</h4>
                    <p>{{ $product['category'] }}</p>
                    <p class="price">{{ $product['price'] }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- JavaScript for Sidebar Toggle and Filtering -->
    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("hidden");
        }

        // Filter products based on the selected category
        document.querySelectorAll('.sidebar ul li a').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                // Remove 'active' class from all sidebar links
                document.querySelectorAll('.sidebar ul li a').forEach(el => el.classList.remove('active'));
                // Add 'active' class to clicked link
                this.classList.add('active');

                const selectedCategory = this.getAttribute('data-category');
                const cards = document.querySelectorAll('.product-card');
                cards.forEach(card => {
                    if (selectedCategory === "All" || card.getAttribute('data-category') === selectedCategory) {
                        card.style.display = "block";
                    } else {
                        card.style.display = "none";
                    }
                });
            });
        });
    </script>
</body>
</html>
@endsection