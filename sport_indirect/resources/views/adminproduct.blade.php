<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Management - Sport Indirect</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

@extends('layout.adminlayout')

@section('title', 'Product Management - Sport Indirect')

@section('content')

@php
    // Dummy products for frontend demo
    $dummyProducts = [
        (object)[ 'id' => 1, 'name' => 'Product 1', 'description' => 'Description for product 1', 'price' => 100.00, 'image' => '/images/dummy1.jpg' ],
        (object)[ 'id' => 2, 'name' => 'Product 2', 'description' => 'Description for product 2', 'price' => 200.00, 'image' => '/images/dummy2.jpg' ],
        (object)[ 'id' => 3, 'name' => 'Product 3', 'description' => 'Description for product 3', 'price' => 150.00, 'image' => '/images/dummy3.jpg' ]
    ];
@endphp

<div class="container my-5">
    <h1 class="text-center mb-4">Product Management</h1>
    
    <!-- Top Buttons: Create and Search Product -->
    <div class="text-center mb-4">
        <button class="btn btn-primary me-2" onclick="toggleCreateForm()">Create New Product</button>
        <button class="btn btn-secondary" onclick="toggleSearchForm()">Search Product</button>
    </div>
    
    <!-- Create Product Form -->
    <div id="createForm" class="border p-4 mb-4 bg-light rounded" style="display: none;">
        <h2>Create New Product</h2>
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price (RM)</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-success">Create Product</button>
            <button type="button" class="btn btn-danger" onclick="toggleCreateForm()">Cancel</button>
        </form>
    </div>
    
    <!-- Search Product Form -->
    <div id="searchForm" class="border p-4 mb-4 bg-light rounded" style="display: none;">
        <h2>Search Product</h2>
        <form onsubmit="searchProduct(event)">
            <div class="mb-3">
                <label for="searchQuery" class="form-label">Product Name or ID</label>
                <input type="text" name="search_query" id="searchQuery" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
            <button type="button" class="btn btn-danger" onclick="toggleSearchForm()">Cancel</button>
        </form>
    </div>
    
    <!-- Product List Table -->
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price (RM)</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="productTableBody">
            @foreach ($dummyProducts as $product)
            <tr class="product-row" data-product-id="{{ $product->id }}" data-name="{{ $product->name }}"
                data-description="{{ $product->description }}" data-price="{{ $product->price }}" 
                data-image="{{ asset($product->image) }}">
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ number_format($product->price, 2) }}</td>
                <td><img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="img-thumbnail" style="width: 60px;"></td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm" onclick="showEditProductModal(this)">Edit</a>
                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Edit Product Modal -->
<div id="editProductModal" class="modal" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content p-4">
            <h3>Edit Product</h3>
            <form id="editProductForm" onsubmit="saveProductEdit(event)">
                <input type="hidden" id="editProductId">
                <div class="mb-3">
                    <label for="editProductName" class="form-label">Product Name</label>
                    <input type="text" id="editProductName" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="editProductDescription" class="form-label">Description</label>
                    <textarea id="editProductDescription" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="editProductPrice" class="form-label">Price (RM)</label>
                    <input type="number" step="0.01" id="editProductPrice" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="editProductImage" class="form-label">Image URL</label>
                    <input type="text" id="editProductImage" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-danger" onclick="closeEditModal()">Cancel</button>
            </form>
        </div>
    </div>
</div>

<script>
    function toggleCreateForm() {
        var createForm = document.getElementById('createForm');
        var searchForm = document.getElementById('searchForm');

        // Close the search form when opening the create form
        searchForm.style.display = 'none';

        // Toggle create form visibility
        createForm.style.display = (createForm.style.display === 'block') ? 'none' : 'block';
    }

    function toggleSearchForm() {
        var createForm = document.getElementById('createForm');
        var searchForm = document.getElementById('searchForm');

        // Close the create form when opening the search form
        createForm.style.display = 'none';

        // Toggle search form visibility
        searchForm.style.display = (searchForm.style.display === 'block') ? 'none' : 'block';
    }


    function closeEditModal() {
        document.getElementById('editProductModal').style.display = 'none';
    }
</script>
@endsection
