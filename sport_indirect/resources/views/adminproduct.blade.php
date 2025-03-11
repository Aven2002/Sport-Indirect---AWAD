<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Management - Sport Indirect</title>
  <link rel="stylesheet" href="{{ asset('css/adminpage.css') }}">
</head>

@extends('layout.adminlayout')

@section('content')

<body>
    @php
        // Dummy products for frontend demo
        $dummyProducts = [
            (object)[ 'id' => 1, 'name' => 'Product 1', 'description' => 'Description for product 1', 'price' => 100.00, 'image' => '/images/dummy1.jpg' ],
            (object)[ 'id' => 2, 'name' => 'Product 2', 'description' => 'Description for product 2', 'price' => 200.00, 'image' => '/images/dummy2.jpg' ],
            (object)[ 'id' => 3, 'name' => 'Product 3', 'description' => 'Description for product 3', 'price' => 150.00, 'image' => '/images/dummy3.jpg' ]
        ];
    @endphp

    <div class="admin-page">
        <h1>Product Management</h1>
        
        <!-- Button to show the create product form -->
        <button class="btn create-btn" onclick="showCreateForm()">Create New Product</button>
        
        <!-- Create Product Form (hidden by default) -->
        <div id="createForm" class="create-form" style="display: none;">
            <h2>Create New Product</h2>
            <form action="#" method="POST">
                <!-- For frontend demo, using a dummy action -->
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter product name" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" placeholder="Enter product description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price (RM)</label>
                    <input type="number" step="0.01" name="price" id="price" placeholder="Enter product price" required>
                </div>
                <div class="form-group">
                    <label for="image">Image URL</label>
                    <input type="text" name="image" id="image" placeholder="Enter image URL" required>
                </div>
                <button type="submit" class="btn submit-btn">Create Product</button>
                <button type="button" class="btn cancel-btn" onclick="hideCreateForm()">Cancel</button>
            </form>
        </div>
        
        <!-- Product List Table -->
        <table class="products-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price (RM)</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dummyProducts as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ number_format($product->price, 2) }}</td>
                    <td><img src="{{ $product->image }}" alt="{{ $product->name }}" class="product-thumb"></td>
                    <td>
                        <!-- Edit and Delete Buttons (dummy actions) -->
                        <a href="#" class="btn edit-btn">Edit</a>
                        <button type="button" class="btn delete-btn">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function showCreateForm(){
            document.getElementById('createForm').style.display = 'block';
        }
        function hideCreateForm(){
            document.getElementById('createForm').style.display = 'none';
        }
    </script>
</body>
</html>
@endsection
