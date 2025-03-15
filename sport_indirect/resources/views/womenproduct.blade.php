<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product - Sport Indirect</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">  
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
    ];
    @endphp

    <!-- Top Controls -->
    <div class="container d-flex justify-content-between align-items-center my-3">
        <button class="btn btn-dark" onclick="toggleFilter()">Hide Filter</button>

        <div>
            <label for="sort" class="me-2">Sort By:</label>
            <select id="sort" class="form-select d-inline-block w-auto">
                <option value="featured">Featured</option>
                <option value="newest">Newest</option>
                <option value="high-low">Price: High-Low</option>
                <option value="low-high">Price: Low-High</option>
            </select>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3" id="sidebar">
                <div class="bg-light p-3 rounded">
                    <h3 class="fw-bold text-black">Women's Shoes</h3>
                    <ul class="list-group" id="category-list">
                        <li class="list-group-item"><a href="#" class="text-decoration-none text-dark" data-category="All">All</a></li>
                        <li class="list-group-item"><a href="#" class="text-decoration-none text-dark" data-category="Lifestyle">Lifestyle</a></li>
                        <li class="list-group-item"><a href="#" class="text-decoration-none text-dark" data-category="Running">Running</a></li>
                        <li class="list-group-item"><a href="#" class="text-decoration-none text-dark" data-category="Basketball">Basketball</a></li>
                        <li class="list-group-item"><a href="#" class="text-decoration-none text-dark" data-category="Football">Football</a></li>
                    </ul>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="col-md-9">
                <div class="row">
                    @foreach ($dummyProducts as $product)
                        <div class="col-md-4 col-sm-6 mb-4 product-card" data-category="{{ $product['category'] }}">
                            <div class="card shadow">
                                <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['name'] }}">
                                <div class="card-body text-center">
                                    <p class="badge bg-warning text-dark">{{ $product['status'] }}</p>
                                    <h4 class="card-title">{{ $product['name'] }}</h4>
                                    <p class="text-muted">{{ $product['category'] }}</p>
                                    <p class="fw-bold">{{ $product['price'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Sidebar Toggle and Filtering -->
    <script>
        function toggleFilter() {
            let categoryList = document.getElementById("category-list");
            categoryList.classList.toggle("d-none");
        }

        // Filter products based on the selected category
        document.querySelectorAll('.list-group-item a').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelectorAll('.list-group-item a').forEach(el => el.classList.remove('fw-bold'));
                this.classList.add('fw-bold');

                const selectedCategory = this.getAttribute('data-category');
                document.querySelectorAll('.product-card').forEach(card => {
                    card.style.display = (selectedCategory === "All" || card.getAttribute('data-category') === selectedCategory) ? "block" : "none";
                });
            });
        });
    </script>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
