<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Management - Sport Indirect</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

@extends('layouts.admin')

@section('title', 'Order Management - Sport Indirect')

@section('content')
@php
    $dummyOrders = [
        (object)[ 'id' => 1, 'order_id' => '#ORD1001', 'customer_name' => 'Alice Smith', 'status' => 'Pending', 'total' => 250.00, 'tracking_info' => '' ],
        (object)[ 'id' => 2, 'order_id' => '#ORD1002', 'customer_name' => 'Bob Johnson', 'status' => 'To Ship', 'total' => 150.00, 'tracking_info' => '' ],
        (object)[ 'id' => 3, 'order_id' => '#ORD1003', 'customer_name' => 'Charlie Brown', 'status' => 'Shipped', 'total' => 300.00, 'tracking_info' => 'Tracking #: TRK123456' ],
        (object)[ 'id' => 4, 'order_id' => '#ORD1004', 'customer_name' => 'Dana White', 'status' => 'Return/Refund', 'total' => 120.00, 'tracking_info' => 'Item returned' ],
        (object)[ 'id' => 5, 'order_id' => '#ORD1005', 'customer_name' => 'Eve Adams', 'status' => 'Cancelled', 'total' => 90.00, 'tracking_info' => 'Order cancelled' ],
        (object)[ 'id' => 6, 'order_id' => '#ORD1006', 'customer_name' => 'Frank Miller', 'status' => 'Delivered', 'total' => 180.00, 'tracking_info' => 'Delivered on 2023-10-10' ]
    ];
@endphp

<div class="container my-5">
    <h1 class="text-center mb-4">Order Management</h1>
    
    <!-- Top Buttons -->
    <div class="text-center mb-4">
        <button class="btn btn-primary me-2" onclick="toggleCreateOrderForm()">Create New Order</button>
        <button class="btn btn-dark" onclick="toggleSearchOrder()">Search Order</button>
        <select id="orderFilter" class="btn btn-secondary me-2" onchange="filterOrders()">
            <option value="All">All Orders</option>
            <option value="Pending">Pending</option>
            <option value="To Ship">To Ship</option>
            <option value="Shipped">Shipped</option>
            <option value="Delivered">Delivered</option>
            <option value="Return/Refund">Return/Refund</option>
            <option value="Cancelled">Cancelled</option>
        </select>
    </div>

    <!-- Search Order Form -->
    <div id="searchOrderForm" class="border p-3 mb-3 text-center" style="display: none;">
        <label for="searchOrderId" class="form-label">Enter Order ID:</label>
        <input type="text" id="searchOrderId" class="form-control d-inline-block w-25 me-2">
        <button class="btn btn-info" onclick="searchOrder()">Search</button>
        <button class="btn btn-danger" onclick="clearSearch()">Clear</button>
    </div>

    <!-- Create Order Form -->
    <div id="createOrderForm" class="border p-3 mb-3" style="display: none;">
        <h2>Create New Order</h2>
        <form id="orderForm">
            <div class="mb-3">
                <label for="orderId" class="form-label">Order ID</label>
                <input type="text" name="order_id" id="orderId" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="customerName" class="form-label">Customer Name</label>
                <input type="text" name="customer_name" id="customerName" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="orderStatus" class="form-label">Status</label>
                <select name="status" id="orderStatus" class="form-select" required>
                    <option value="Pending">Pending</option>
                    <option value="To Ship">To Ship</option>
                    <option value="Shipped">Shipped</option>
                    <option value="Delivered">Delivered</option>
                    <option value="Return/Refund">Return/Refund</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="orderTotal" class="form-label">Total (RM)</label>
                <input type="number" step="0.01" name="total" id="orderTotal" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Create Order</button>
            <button type="button" class="btn btn-danger" onclick="toggleCreateOrderForm()">Cancel</button>
        </form>
    </div>

    <!-- Order List Table -->
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Status</th>
                <th>Total (RM)</th>
                <th>Tracking Info</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="orderTable">
            @foreach ($dummyOrders as $order)
            <tr class="order-row" data-status="{{ $order->status }}" data-order-id="{{ $order->order_id }}">
                <td>{{ $order->order_id }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->status }}</td>
                <td>{{ number_format($order->total, 2) }}</td>
                <td>{{ $order->tracking_info }}</td>
                <td>
                    @if($order->status != 'Cancelled')
                        @if($order->status == 'To Ship')
                            <button class="btn btn-success btn-sm">Ship</button>
                        @endif
                        @if($order->status == 'Shipped')
                            <button class="btn btn-info btn-sm">Track</button>
                        @endif
                        @if($order->status == 'Return/Refund')
                            <button class="btn btn-warning btn-sm">Refund</button>
                        @endif
                        <button class="btn btn-danger btn-sm" onclick="cancelOrder({{ $order->id }})">Cancel</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- JavaScript Functions -->
<script>
    function toggleCreateOrderForm() {
        var createForm = document.getElementById('createOrderForm');
        var searchForm = document.getElementById('searchOrderForm');

        // Close the search form when opening the create form
        searchForm.style.display = 'none';

        // Toggle create order form
        createForm.style.display = (createForm.style.display === 'block') ? 'none' : 'block';
    }

    function toggleSearchOrder() {
        var createForm = document.getElementById('createOrderForm');
        var searchForm = document.getElementById('searchOrderForm');

        // Close the create form when opening the search form
        createForm.style.display = 'none';

        // Toggle search order form
        searchForm.style.display = (searchForm.style.display === 'block') ? 'none' : 'block';
    }

    function searchOrder() {
        var searchId = document.getElementById("searchOrderId").value.trim().toUpperCase();
        var rows = document.querySelectorAll(".order-row");

        rows.forEach(row => {
            var orderId = row.getAttribute("data-order-id").toUpperCase();
            row.style.display = (orderId === searchId || searchId === '') ? '' : 'none';
        });
    }

    function clearSearch() {
        document.getElementById("searchOrderId").value = "";
        searchOrder();
    }

    function cancelOrder(orderId) {
        alert("Order " + orderId + " has been cancelled.");
    }

    function filterOrders() {
        var selectedStatus = document.getElementById("orderFilter").value;
        var rows = document.querySelectorAll(".order-row");

        rows.forEach(row => {
            var orderStatus = row.getAttribute("data-status");
            if (selectedStatus === "All" || orderStatus === selectedStatus) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }

    document.getElementById("orderForm").addEventListener("submit", function(event) {
        event.preventDefault();
        alert("Order Created Successfully!");
        toggleCreateOrderForm();
    });
</script>
@endsection
