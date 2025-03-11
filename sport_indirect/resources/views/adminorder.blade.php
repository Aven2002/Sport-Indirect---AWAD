<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Management - Sport Indirect</title>
  <link rel="stylesheet" href="{{ asset('css/adminpage.css') }}">
</head>

@extends('layout.adminlayout')

@section('title', 'Order Management - Sport Indirect')

@section('content')
    @php
        // Dummy order data for frontend demonstration
        $dummyOrders = [
            (object)[
                'id' => 1,
                'order_id' => '#ORD1001',
                'customer_name' => 'Alice Smith',
                'status' => 'Pending',
                'total' => 250.00,
                'tracking_info' => ''
            ],
            (object)[
                'id' => 2,
                'order_id' => '#ORD1002',
                'customer_name' => 'Bob Johnson',
                'status' => 'To Ship',
                'total' => 150.00,
                'tracking_info' => ''
            ],
            (object)[
                'id' => 3,
                'order_id' => '#ORD1003',
                'customer_name' => 'Charlie Brown',
                'status' => 'Shipped',
                'total' => 300.00,
                'tracking_info' => 'Tracking #: TRK123456'
            ],
            (object)[
                'id' => 4,
                'order_id' => '#ORD1004',
                'customer_name' => 'Dana White',
                'status' => 'Return/Refund',
                'total' => 120.00,
                'tracking_info' => 'Item returned'
            ],
            (object)[
                'id' => 5,
                'order_id' => '#ORD1005',
                'customer_name' => 'Eve Adams',
                'status' => 'Cancelled',
                'total' => 90.00,
                'tracking_info' => 'Order cancelled'
            ],
            (object)[
                'id' => 6,
                'order_id' => '#ORD1006',
                'customer_name' => 'Frank Miller',
                'status' => 'Delivered',
                'total' => 180.00,
                'tracking_info' => 'Delivered on 2023-10-10'
            ]
        ];
    @endphp

    <div class="admin-order-page">
        <h1>Order Management</h1>

        <!-- Button to toggle the create order form -->
        <button class="btn create-btn" onclick="showCreateOrderForm()">Create New Order</button>

        <!-- Create Order Form (hidden by default) -->
        <div id="createOrderForm" class="create-form" style="display: none;">
            <h2>Create New Order</h2>
            <form action="#" method="POST">
                @csrf
                <div class="form-group">
                    <label for="orderId">Order ID</label>
                    <input type="text" name="order_id" id="orderId" placeholder="Enter Order ID" required>
                </div>
                <div class="form-group">
                    <label for="customerName">Customer Name</label>
                    <input type="text" name="customer_name" id="customerName" placeholder="Enter Customer Name" required>
                </div>
                <div class="form-group">
                    <label for="orderStatus">Status</label>
                    <select name="status" id="orderStatus" required>
                        <option value="Pending">Pending</option>
                        <option value="To Ship">To Ship</option>
                        <option value="Shipped">Shipped</option>
                        <option value="Delivered">Delivered</option>
                        <option value="Return/Refund">Return/Refund</option>
                        <option value="Cancelled">Cancelled</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="orderTotal">Total (RM)</label>
                    <input type="number" step="0.01" name="total" id="orderTotal" placeholder="Enter Order Total" required>
                </div>
                <div class="form-group">
                    <label for="trackingInfo">Tracking Info</label>
                    <input type="text" name="tracking_info" id="trackingInfo" placeholder="Enter Tracking Info (if any)">
                </div>
                <button type="submit" class="btn submit-btn">Create Order</button>
                <button type="button" class="btn cancel-btn" onclick="hideCreateOrderForm()">Cancel</button>
            </form>
        </div>

        <!-- Order Filter Tabs -->
        <div class="order-filters">
            <button class="filter-btn active" data-filter="all">All Orders</button>
            <button class="filter-btn" data-filter="Pending">Pending</button>
            <button class="filter-btn" data-filter="To Ship">To Ship</button>
            <button class="filter-btn" data-filter="Shipped">Shipped</button>
            <button class="filter-btn" data-filter="Delivered">Delivered</button>
            <button class="filter-btn" data-filter="Return/Refund">Return/Refund</button>
            <button class="filter-btn" data-filter="Cancelled">Cancelled</button>
        </div>
        
        <!-- Order List Table -->
        <table class="orders-table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th id="selectHeader" style="display: none;">Select</th>
                    <th>Customer Name</th>
                    <th>Status</th>
                    <th>Total (RM)</th>
                    <th>Tracking Info</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="orderTableBody">
                @foreach ($dummyOrders as $order)
                <tr class="order-row" data-status="{{ $order->status }}">
                    <td>{{ $order->order_id }}</td>
                    <td class="select-cell" style="display: none;">
                        <input type="checkbox" class="order-select" value="{{ $order->id }}">
                    </td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ number_format($order->total, 2) }}</td>
                    <td>{{ $order->tracking_info }}</td>
                    <td class="action-cell">
                        <button class="btn action-btn edit-btn" title="Edit Order">Edit</button>
                        @if($order->status == 'To Ship')
                            <button class="btn action-btn ship-btn" title="Ship Order">Ship</button>
                        @endif
                        @if($order->status == 'Shipped')
                            <button class="btn action-btn track-btn" title="Track Order">Track</button>
                        @endif
                        @if($order->status == 'Return/Refund')
                            <button class="btn action-btn refund-btn" title="Accept Return/Refund">Refund</button>
                        @endif
                        @if($order->status != 'Cancelled')
                            <button class="btn action-btn cancel-btn" title="Cancel Order" onclick="cancelOrder({{ $order->id }})">Cancel</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <!-- Batch Edit Button (visible only for non-"all" filters) -->
        <div id="batchEditContainer" style="text-align: right; margin-top: 10px; display: none;">
            <button id="batchEditBtn" class="btn batch-edit-btn">Batch Edit Selected</button>
        </div>
    </div>

    <!-- Modal for Batch Edit Action -->
    <div id="batchEditModal" class="modal" style="display: none;">
        <div class="modal-content">
            <h3>Select an action for selected orders</h3>
            <div class="modal-actions">
                <button class="btn modal-action-btn" data-action="ship">Ship</button>
                <button class="btn modal-action-btn" data-action="cancel">Cancel</button>
                <button class="btn modal-action-btn" data-action="refund">Refund</button>
                <button class="btn modal-action-btn" data-action="delete">Delete</button>
                <button class="btn modal-action-btn" data-action="edit">Edit</button>
            </div>
            <button class="btn close-modal-btn">Close</button>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const filterButtons = document.querySelectorAll(".filter-btn");
            const orderRows = document.querySelectorAll(".order-row");
            const selectHeader = document.getElementById("selectHeader");
            const selectCells = document.querySelectorAll(".select-cell");
            const batchEditContainer = document.getElementById("batchEditContainer");
            
            // Update view on filter button click
            filterButtons.forEach(button => {
                button.addEventListener("click", function() {
                    // Remove active class from all filter buttons
                    filterButtons.forEach(btn => btn.classList.remove("active"));
                    // Add active class to clicked button
                    this.classList.add("active");
                    
                    const filter = this.getAttribute("data-filter");
                    
                    orderRows.forEach(row => {
                        if(filter === "all" || row.getAttribute("data-status") === filter) {
                            row.style.display = "";
                        } else {
                            row.style.display = "none";
                        }
                    });
                    
                    // Show checkboxes and batch edit button only if filter is not "all"
                    if(filter === "all") {
                        selectHeader.style.display = "none";
                        selectCells.forEach(cell => cell.style.display = "none");
                        batchEditContainer.style.display = "none";
                    } else {
                        selectHeader.style.display = "";
                        selectCells.forEach(cell => cell.style.display = "");
                        batchEditContainer.style.display = "block";
                    }
                });
            });
            
            // Attach click event for Batch Edit button
            document.getElementById("batchEditBtn").addEventListener("click", batchEditOrders);
            
            // Attach click event to modal action buttons
            document.querySelectorAll(".modal-action-btn").forEach(button => {
                button.addEventListener("click", function() {
                    const action = this.getAttribute("data-action");
                    applyBatchEditAction(action);
                });
            });
            
            // Close modal button event
            document.querySelector(".close-modal-btn").addEventListener("click", function() {
                closeModal();
            });
        });

        function cancelOrder(orderId) {
            alert("Order " + orderId + " has been cancelled.");
        }

        function batchEditOrders() {
            const selectedCheckboxes = document.querySelectorAll(".order-select:checked");
            if(selectedCheckboxes.length === 0) {
                alert("Please select at least one order for batch editing.");
                return;
            }
            showModal();
        }

        function showModal() {
            document.getElementById("batchEditModal").style.display = "flex";
        }

        function closeModal() {
            document.getElementById("batchEditModal").style.display = "none";
        }

        function applyBatchEditAction(action) {
            const selectedCheckboxes = document.querySelectorAll(".order-select:checked");
            const selectedIds = Array.from(selectedCheckboxes).map(cb => cb.value);
            alert("Applying action '" + action + "' to orders: " + selectedIds.join(", "));
            closeModal();
        }

        function showCreateOrderForm(){
            document.getElementById('createOrderForm').style.display = 'block';
        }
        function hideCreateOrderForm(){
            document.getElementById('createOrderForm').style.display = 'none';
        }
    </script>
@endsection
