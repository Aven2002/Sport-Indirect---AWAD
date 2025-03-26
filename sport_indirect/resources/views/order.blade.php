<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order - Sport Indirect</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/order.css') }}">
</head>

@extends('layouts.user')

@section('content')
<body class="bg-light">
    @php
        $orders = collect([
            (object)['id' => 1, 'order_id' => '#ORD1001', 'name' => 'Nike Dunk Low Retro', 'category' => "Men's Shoe", 'color' => 'White/Black', 'size' => '10', 'status' => 'To Pay', 'image' => '/images/Nike Vomero 18.png'],
            (object)['id' => 2, 'order_id' => '#ORD1002', 'name' => 'Nike Air Max', 'category' => "Men's Shoe", 'color' => 'Black/White', 'size' => '9', 'status' => 'To Ship', 'image' => '/images/Nike Vomero 18.png'],
            (object)['id' => 3, 'order_id' => '#ORD1003', 'name' => 'Nike Revolution', 'category' => "Men's Shoe", 'color' => 'Blue/White', 'size' => '10', 'status' => 'To Receive', 'image' => '/images/Nike Vomero 18.png'],
            (object)['id' => 4, 'order_id' => '#ORD1004', 'name' => 'Nike Zoom Fly', 'category' => "Men's Shoe", 'color' => 'Red/Black', 'size' => '10', 'status' => 'Completed', 'image' => '/images/Nike Vomero 18.png'],
            (object)['id' => 5, 'order_id' => '#ORD1005', 'name' => 'Nike Cortez', 'category' => "Men's Shoe", 'color' => 'White/Black', 'size' => '9', 'status' => 'Return/Refund', 'image' => '/images/Nike Vomero 18.png'],
            (object)['id' => 6, 'order_id' => '#ORD1006', 'name' => 'Nike Pegasus', 'category' => "Men's Shoe", 'color' => 'Grey/Black', 'size' => '10', 'status' => 'Cancelled', 'image' => '/images/Nike Vomero 18.png'],
        ]);

        $statuses = ['To Pay', 'To Ship', 'To Receive', 'Completed', 'Return/Refund', 'Cancelled'];
        $activeStatus = request()->query('status', 'To Receive');
    @endphp

    <div class="container my-4">
        <h2 class="text-white text-center mb-4" style="font-weight: bold;">Order Status</h2>

        <!-- Order Status Navigation -->
        <ul class="nav nav-pills justify-content-center mb-4">
            @foreach($statuses as $status)
                <li class="nav-item">
                    <a class="nav-link {{ $activeStatus == $status ? 'active' : 'text-dark' }}" href="{{ url('order') }}?status={{ urlencode($status) }}">
                        {{ $status }} ({{ $orders->where('status', $status)->count() }})
                    </a>
                </li>
            @endforeach
        </ul>

        <!-- Orders List Section -->
        <h3 class="text-white">{{ $activeStatus }} Orders</h3>
        @forelse($orders->where('status', $activeStatus) as $order)
        <div class="card mb-3 shadow-sm">
            <div class="card-body d-flex flex-column flex-md-row align-items-center justify-content-between">
                
                <!-- Product Details -->
                <div class="d-flex align-items-center">
                    <img src="{{ $order->image }}" alt="Product Image" class="img-thumbnail me-3" style="width: 100px; height: 100px;">
                    <div>
                        <h4 class="h5">{{ $order->name }}</h4>
                        <p class="mb-1 text-muted">{{ $order->category }} - {{ $order->color }}</p>
                        <p class="mb-1">Size: <strong>{{ $order->size }}</strong></p>
                        <p class="mb-1">Order ID: <strong>{{ $order->order_id }}</strong></p>
                    </div>
                </div>

                <!-- Order Location (Static) -->
                <div class="text-center text-md-start">
                    <h5 class="h6 text-dark">Current Location</h5>
                    <p class="mb-0 text-muted">Warehouse, City, State</p>
                </div>

                <!-- Order Actions -->
                <div>
                    @if($activeStatus == 'To Receive')
                        <button class="btn btn-success">Order Received</button>
                    @elseif($activeStatus == 'Return/Refund')
                        <button class="btn btn-danger">Return / Refund</button>
                    @else
                        <button class="btn btn-primary">View Details</button>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <p class="text-center text-muted">No orders found for "{{ $activeStatus }}".</p>
        @endforelse
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
