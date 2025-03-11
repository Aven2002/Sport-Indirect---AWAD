<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart - Sport Indirect</title>
  <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
</head>

@extends('layout.userlayout')

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
            'quantity' => 1,
            'image' => '/images/category-fitness.png'
        ],
        (object)[
            'id' => 2,
            'name' => 'Nike Dunk Low Retro',
            'category' => "Men's Shoe",
            'color' => 'White/White/Black',
            'size' => '10.5',
            'price' => 489.00,
            'quantity' => 1,
            'image' => 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/0ccbd6b2-8561-4aa3-a4d3-f74c1f110443/dunk-low-retro-mens-shoes-6Q1tFQ.png'
        ]
    ];
@endphp

<div class="cart-container">
    <h2 class="cart-title">Shopping Bag</h2>

    <div class="cart-content">
        <!-- Cart Items -->
        <div class="cart-items">
            @foreach ($cartItems as $item)
            <div class="cart-item" data-id="{{ $item->id }}" data-base-price="{{ $item->price }}">
                <div class="cart-item-details">
                    <img src="{{ $item->image }}" alt="Product Image" class="cart-item-image">
                    <div class="cart-item-info">
                        <h5>{{ $item->name }}</h5>
                        <p>{{ $item->category }}</p>
                        <p>{{ $item->color }}</p>
                        <p>Size: <strong>{{ $item->size }}</strong></p>
                    </div>
                </div>
                <div class="cart-item-price">
                    <!-- Display unit price (unchanged) -->
                    <p class="price">RM {{ number_format($item->price, 2) }}</p>
                    <div class="quantity-controls">
                        <button class="quantity-btn minus-btn">-</button>
                        <span class="quantity-value">{{ $item->quantity }}</span>
                        <button class="quantity-btn plus-btn">+</button>
                        <button class="delete-btn"><i class="bi bi-trash"></i></button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Summary Section -->
        <div class="cart-summary">
            <h3>Summary</h3>
            <!-- Container for item breakdown -->
            <div id="itemSummaries"></div>
            <hr>
            <div class="summary-row total">
                <h4>Total</h4>
                <h4 id="finalTotal">RM 0.00</h4>
            </div>
            <button class="checkout-btn member" onclick="window.location.href='/checkout'">Checkout</button>            </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {

        // Function to update the summary breakdown and final total
        function updateSummary() {
            let total = 0;
            const summaryContainer = document.getElementById("itemSummaries");
            summaryContainer.innerHTML = ""; // Clear existing summary

            document.querySelectorAll(".cart-item").forEach(item => {
                let basePrice = parseFloat(item.getAttribute("data-base-price"));
                let quantity = parseInt(item.querySelector(".quantity-value").textContent);
                let subTotal = basePrice * quantity;
                total += subTotal;

                // Create a row for this product's summary
                let row = document.createElement("div");
                row.classList.add("summary-row");
                // For example: "Nike Dunk Low Retro: RM 489.00 x 2 = RM 978.00"
                let productName = item.querySelector(".cart-item-info h5").textContent;
                row.innerHTML = `<p>${productName}:</p>
                                 <p>RM ${basePrice.toFixed(2)} x ${quantity} = RM ${subTotal.toFixed(2)}</p>`;
                summaryContainer.appendChild(row);
            });
            document.getElementById("finalTotal").textContent = `RM ${total.toFixed(2)}`;
        }

        // Initial update of summary
        updateSummary();

        // Loop through each cart item to update quantity and recalc summary
        document.querySelectorAll(".cart-item").forEach((item) => {
            const minusBtn = item.querySelector(".minus-btn");
            const plusBtn = item.querySelector(".plus-btn");
            const quantitySpan = item.querySelector(".quantity-value");
            const basePrice = parseFloat(item.getAttribute("data-base-price"));
            let quantity = parseInt(quantitySpan.textContent);

            minusBtn.addEventListener("click", function () {
                quantity--;
                if (quantity > 0) {
                    quantitySpan.textContent = quantity;
                    updateSummary();
                } else {
                    // Remove item from cart if quantity becomes 0
                    item.remove();
                    updateSummary();
                }
            });

            plusBtn.addEventListener("click", function () {
                quantity++;
                quantitySpan.textContent = quantity;
                updateSummary();
            });
        });
    });
</script>
@endsection
