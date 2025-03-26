<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Sport Indirect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
</head>

@extends('layouts.user')

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

<div class="container mt-5 p-4 shadow rounded bg-white">
    <h2 class="fw-bold text-center mb-4">Check Out</h2>

    <!-- Order Summary -->
    <div id="order-summary" class="border p-3 bg-light rounded shadow-sm mb-4">
        <h4 class="fw-bold text-center mb-3">Order Summary</h4>
        <div class="receipt-items">
            @foreach($cartItems as $item)
            <div class="d-flex justify-content-between border-bottom py-2">
                <div>
                    <strong>{{ $item->name }}</strong>
                    <small class="d-block text-muted">Size: {{ $item->size }}</small>
                </div>
                <div>
                    <span class="text-muted">{{ $item->quantity }} x RM {{ number_format($item->price, 2) }}</span> =
                    <strong>RM {{ number_format($item->price * $item->quantity, 2) }}</strong>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-3">
            <div class="d-flex justify-content-between">
                <span>Subtotal:</span>
                <span id="receiptSubtotal">RM 0.00</span>
            </div>
            <div class="d-flex justify-content-between">
                <span>Delivery Fee:</span>
                <span id="receiptDelivery">RM 10.00</span>
            </div>
            <div class="d-flex justify-content-between">
                <span>Estimated Delivery:</span>
                <span id="receiptDeliveryTime">3-5 days</span>
            </div>
            <hr>
            <div class="d-flex justify-content-between fw-bold">
                <strong>Total:</strong>
                <strong id="receiptTotal">RM 0.00</strong>
            </div>
        </div>
    </div>

    <!-- Delivery Method -->
    <h4 class="fw-bold">Delivery Method</h4>
    <div class="btn-group w-100 mb-4">
        <button class="btn btn-dark w-50" onclick="selectMethod('delivery')">Delivery</button>
        <button class="btn btn-outline-dark w-50" onclick="selectMethod('pickup')">Pick Up</button>
    </div>

    <!-- Delivery Form -->
    <div id="delivery-form">
        <h5 class="fw-bold">Select a Saved Address</h5>
        <select class="form-select mb-3" id="saved-address" onchange="fillAddress()">
            <option value="">Choose an Address</option>
            <option value="John Doe, 123 Main Street, 012-3456789">John Doe - 123 Main Street</option>
            <option value="Jane Smith, 456 Elm Street, 011-9876543">Jane Smith - 456 Elm Street</option>
        </select>

        <h5 class="fw-bold">Delivery Information</h5>
        <input type="text" class="form-control mb-3" id="fullName" placeholder="Full Name">
        <input type="text" class="form-control mb-3" id="address" placeholder="Address">
        <input type="text" class="form-control mb-3" id="phoneNumber" placeholder="Phone Number">
    </div>

    <!-- Pickup Form -->
    <div id="pickup-form" class="d-none">
        <h5 class="fw-bold">Pick Up Information</h5>
        <input type="text" class="form-control mb-3" placeholder="Enter Postcode" onkeyup="findBranch()">
        <select class="form-select mb-3">
            <option>Select Nearest Branch</option>
            <option>Kuala Lumpur</option>
            <option>Penang</option>
            <option>Johor Bahru</option>
        </select>
        <h6 class="fw-bold">Person Picking Up</h6>
        <input type="text" class="form-control mb-3" placeholder="Full Name">
        <input type="text" class="form-control mb-3" placeholder="Phone Number">
    </div>

    <!-- Payment Section -->
    <h4 class="fw-bold">Payment</h4>
    <input type="text" class="form-control mb-3" placeholder="Promo Code (Optional)">
    <select class="form-select mb-3">
        <option>Credit/Debit Card</option>
        <option>PayPal</option>
        <option>Online Banking</option>
        <option>GrabPay</option>
    </select>
    <button class="btn btn-dark w-100" id="paymentButton" onclick="processPayment()">Pay Now</button>
</div>

<!-- JavaScript -->
<script>
    function selectMethod(method) {
        if(method === 'delivery') {
            document.getElementById('delivery-form').classList.remove('d-none');
            document.getElementById('pickup-form').classList.add('d-none');
        } else {
            document.getElementById('pickup-form').classList.remove('d-none');
            document.getElementById('delivery-form').classList.add('d-none');
        }
    }

    function fillAddress() {
        let selected = document.getElementById("saved-address").value;
        if (selected) {
            let details = selected.split(", ");
            document.getElementById("fullName").value = details[0];
            document.getElementById("address").value = details[1];
            document.getElementById("phoneNumber").value = details[2];
        } else {
            document.getElementById("fullName").value = "";
            document.getElementById("address").value = "";
            document.getElementById("phoneNumber").value = "";
        }
    }

    function processPayment() {
        const paymentButton = document.getElementById("paymentButton");
        paymentButton.disabled = true;
        paymentButton.textContent = "Processing...";
        setTimeout(() => { window.location.href = '/order'; }, 2000);
    }

    document.addEventListener("DOMContentLoaded", function () {
        let subtotal = 0;
        @foreach($cartItems as $item)
            subtotal += {{ $item->price * $item->quantity }};
        @endforeach
        document.getElementById("receiptSubtotal").textContent = "RM " + subtotal.toFixed(2);
        let total = subtotal + 10.00;
        document.getElementById("receiptTotal").textContent = "RM " + total.toFixed(2);
    });
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
@endsection
