<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order - Sport Indirect</title>
  <!-- Include any admin-specific CSS -->
  <link rel="stylesheet" href="{{ asset('css/order.css') }}">
</head>

@extends('layout.userlayout')

@section('content')
<body>
    @php
        // Dummy order data for demonstration
        $dummyOrders = [
            (object)[
                'id' => 1,
                'order_id' => '#ORD1001',
                'name' => 'Nike Dunk Low Retro',
                'category' => "Men's Shoe",
                'color' => 'White/White/Black',
                'size' => '10',
                'status' => 'To Pay',
                'image' => '/images/product-placeholder.png'
            ],
            (object)[
                'id' => 2,
                'order_id' => '#ORD1002',
                'name' => 'Nike Air Max',
                'category' => "Men's Shoe",
                'color' => 'Black/White',
                'size' => '9',
                'status' => 'To Ship',
                'image' => '/images/product-placeholder.png'
            ],
            (object)[
                'id' => 3,
                'order_id' => '#ORD1003',
                'name' => 'Nike Revolution',
                'category' => "Men's Shoe",
                'color' => 'Blue/White',
                'size' => '10',
                'status' => 'To Receive',
                'image' => '/images/product-placeholder.png'
            ],
            (object)[
                'id' => 4,
                'order_id' => '#ORD1004',
                'name' => 'Nike Zoom Fly',
                'category' => "Men's Shoe",
                'color' => 'Red/Black',
                'size' => '10',
                'status' => 'Completed',
                'image' => '/images/product-placeholder.png'
            ],
            (object)[
                'id' => 5,
                'order_id' => '#ORD1005',
                'name' => 'Nike Cortez',
                'category' => "Men's Shoe",
                'color' => 'White/Black',
                'size' => '9',
                'status' => 'Return/Refund',
                'image' => '/images/product-placeholder.png'
            ],
            (object)[
                'id' => 6,
                'order_id' => '#ORD1006',
                'name' => 'Nike Pegasus',
                'category' => "Men's Shoe",
                'color' => 'Grey/Black',
                'size' => '10',
                'status' => 'Cancelled',
                'image' => '/images/product-placeholder.png'
            ],
        ];
        $orders = collect($dummyOrders);
        $statuses = ['To Pay', 'To Ship', 'To Receive', 'Completed', 'Return/Refund', 'Cancelled'];
        $activeStatus = request()->query('status', 'To Receive'); // default to 'To Receive'
    @endphp

    <div class="order-status-page">
        <h2 class="page-title">Order Status</h2>

        <!-- Order Status Navigation -->
        <ul class="status-nav">
            @foreach($statuses as $status)
            <li class="{{ $activeStatus == $status ? 'active' : '' }}">
                <a href="{{ route('order') }}?status={{ urlencode($status) }}">
                    {{ $status }} ({{ $orders->where('status', $status)->count() }})
                </a>
            </li>
            @endforeach
        </ul>

        <!-- Orders List Section -->
        <div class="orders-list">
            <h3>{{ $activeStatus }} Orders</h3>
            @forelse($orders->where('status', $activeStatus) as $order)
            <div class="order-card">
                <div class="order-info">
                    <!-- Product Details -->
                    <div class="product-details">
                        <img src="{{ $order->image }}" alt="Product Image" class="product-image">
                        <div class="product-info">
                            <h4>{{ $order->name }}</h4>
                            <p>{{ $order->category }} - {{ $order->color }}</p>
                            <p>Size: <strong>{{ $order->size }}</strong></p>
                            <p>Order ID: <strong>{{ $order->order_id }}</strong></p>
                        </div>
                    </div>
                    <!-- Current Location (dummy text) -->
                    <div class="order-location">
                        <h5>Current Location</h5>
                        <p>Warehouse, City, State</p>
                    </div>
                </div>
                <!-- Order Actions -->
                <div class="order-actions">
                    @if($activeStatus == 'To Receive')
                        <button class="btn order-received-btn">Order Received</button>
                    @elseif($activeStatus == 'Return/Refund')
                        <button class="btn return-refund-btn">Return / Refund</button>
                    @else
                        <button class="btn view-details-btn">View Details</button>
                    @endif
                </div>
            </div>
            @empty
            <p>No orders found for "{{ $activeStatus }}".</p>
            @endforelse
        </div>
    </div>
</body>
</html>
@endsection
