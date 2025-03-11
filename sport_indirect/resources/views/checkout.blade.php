<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout - Sport Indirect</title>
  <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
</head>

@extends('layout.userlayout')

@section('title', 'Checkout - Sport Indirect')

@section('content')
@php
    // Dummy cart data for frontend demonstration
    $cartItems = [
        (object)[
            'id' => 1,
            'name' => 'Nike Dunk Low Retro',
            'category' => "Men's Shoe",
            'color' => 'White/White/Black',
            'size' => '10',
            'price' => 489.00,
            'quantity' => 2,
            'image' => '/images/item1.png'
        ],
        (object)[
            'id' => 2,
            'name' => 'Nike Air Max',
            'category' => "Men's Shoe",
            'color' => 'Black/White',
            'size' => '9',
            'price' => 399.00,
            'quantity' => 1,
            'image' => '/images/item2.png'
        ]
    ];
@endphp

<div class="container mt-5">
    <h2 class="checkout-title">Check Out</h2>

    <!-- Order Summary as Receipt -->
    <div id="order-summary" class="receipt">
        <h4 class="receipt-header">Order Summary</h4>
        <div class="receipt-items">
            @foreach($cartItems as $item)
            <div class="receipt-item">
                <div class="receipt-item-info">
                    <span class="receipt-item-name">{{ $item->name }}</span>
                    <span class="receipt-item-size">Size: {{ $item->size }}</span>
                </div>
                <div class="receipt-item-details">
                    <span class="receipt-item-qty">{{ $item->quantity }}</span> x 
                    <span class="receipt-item-unit">RM {{ number_format($item->price, 2) }}</span>
                    = <span class="receipt-item-subtotal">RM {{ number_format($item->price * $item->quantity, 2) }}</span>
                </div>
            </div>
            @endforeach
        </div>
        <div class="receipt-totals">
            <div class="receipt-row">
                <span>Subtotal:</span>
                <span id="receiptSubtotal">RM 0.00</span>
            </div>
            <div class="receipt-row">
                <span>Delivery Fee:</span>
                <span id="receiptDelivery">RM 10.00</span>
            </div>
            <div class="receipt-row">
                <span>Estimated Delivery:</span>
                <span id="receiptDeliveryTime">3-5 days</span>
            </div>
            <hr>
            <div class="receipt-row total">
                <strong>Total:</strong>
                <strong id="receiptTotal">RM 0.00</strong>
            </div>
        </div>
        <!-- Payment Button with loading effect -->
    </div>

    <!-- Delivery Method Buttons -->
    <h4 class="fw-bold">Delivery Method</h4>
    <div class="mb-4 delivery-method-buttons">
        <button class="btn delivery-btn active" onclick="selectMethod('delivery')">Delivery</button>
        <button class="btn pickup-btn" onclick="selectMethod('pickup')">Pick Up</button>
    </div>

    <!-- Delivery Form -->
    <div id="delivery-form">
        <h5 class="fw-bold">Delivery Information</h5>
        <div>
            <input type="text" class="form-control mb-2" placeholder="Full Name">
        </div>
        <div>
            <input type="text" class="form-control mb-2" placeholder="Address">
        </div>
        <div>
            <input type="text" class="form-control mb-2" placeholder="Phone Number">
        </div>
    </div>

    <!-- Pickup Form -->
    <div id="pickup-form" style="display: none;">
        <h5 class="fw-bold">Pick Up Information</h5>
        <input type="text" class="form-control mb-2" placeholder="Enter Postcode" onkeyup="findBranch()">
        <select class="form-control mb-2">
            <option>Select Nearest Branch</option>
            <option>Kuala Lumpur</option>
            <option>Penang</option>
            <option>Johor Bahru</option>
        </select>
        <h6 class="fw-bold">Person Picking Up</h6>
        <input type="text" class="form-control mb-2" placeholder="Full Name">
        <input type="text" class="form-control mb-2" placeholder="Phone Number">
    </div>

    <!-- Payment Section -->
    <div>
        <h4 class="fw-bold">Payment</h4>
    </div>
    <div>
        <input type="text" class="form-control mb-2" placeholder="Promo Code (Optional)">
    </div>
    <div>
        <select class="form-control mb-2">
            <option>Credit/Debit Card</option>
            <option>PayPal</option>
            <option>Online Banking</option>
            <option>GrabPay</option>
        </select>
    </div>
    <button class="checkout-btn" id="paymentButton" onclick="processPayment()">Pay Now</button>
</div>

<script>
    // Toggle between delivery and pickup forms via buttons
    function selectMethod(method) {
        const deliveryBtn = document.querySelector('.delivery-btn');
        const pickupBtn = document.querySelector('.pickup-btn');
        const deliveryForm = document.getElementById('delivery-form');
        const pickupForm = document.getElementById('pickup-form');

        if(method === 'delivery') {
            deliveryBtn.classList.add('active');
            pickupBtn.classList.remove('active');
            deliveryForm.style.display = 'block';
            pickupForm.style.display = 'none';
        } else {
            pickupBtn.classList.add('active');
            deliveryBtn.classList.remove('active');
            pickupForm.style.display = 'block';
            deliveryForm.style.display = 'none';
        }
    }

    // Payment processing function: disable button, show loading state, then navigate
    function processPayment() {
        const paymentButton = document.getElementById("paymentButton");
        paymentButton.disabled = true;
        paymentButton.textContent = "Processing...";
        // Simulate payment processing delay (e.g., 2 seconds)
        setTimeout(function() {
            window.location.href = '/order';
        }, 2000);
    }

    // Update receipt totals using dummy data from PHP
    document.addEventListener("DOMContentLoaded", function () {
        let subtotal = 0;
        @foreach($cartItems as $item)
            subtotal += {{ $item->price * $item->quantity }};
        @endforeach

        document.getElementById("receiptSubtotal").textContent = "RM " + subtotal.toFixed(2);
        let deliveryFee = 10.00;
        let total = subtotal + deliveryFee;
        document.getElementById("receiptTotal").textContent = "RM " + total.toFixed(2);
    });
</script>

</body>
</html>
@endsection
