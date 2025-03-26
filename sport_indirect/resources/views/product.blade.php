@extends('layouts.user')

@section('content')

<head>
    <title>Product - Sport Indirect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
</head>

<body>

    <!-- Top Controls -->
    <div class="container d-flex justify-content-between align-items-center my-3">
        <div>
            <label for="sort" class="me-2">Sort By:</label>
            <select id="sort" class="form-select d-inline-block w-auto">
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
                    <ul class="list-group" id="category-list">
                        <li class="list-group-item"><a href="#" class="text-decoration-none text-dark" data-category="All">All</a></li>
                        <li class="list-group-item"><a href="#" class="text-decoration-none text-dark" data-category="Racquet">Racquet</a></li>
                        <li class="list-group-item"><a href="#" class="text-decoration-none text-dark" data-category="Footwear">Footwear</a></li>
                        <li class="list-group-item"><a href="#" class="text-decoration-none text-dark" data-category="Shuttlecock">Shuttlecocks</a></li>
                        <li class="list-group-item"><a href="#" class="text-decoration-none text-dark" data-category="Apparel">Apparel</a></li>
                    </ul>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="col-md-9">
                <div class="row" id="product-grid">
                    <!-- Products will be dynamically injected here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Include JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/product.js') }}"></script>

</body>
@endsection
