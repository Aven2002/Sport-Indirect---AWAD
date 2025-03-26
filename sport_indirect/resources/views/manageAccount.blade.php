<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Management - Sport Indirect</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>

@extends('layouts.admin')

@section('title', 'User Management - Sport Indirect')

@section('content')
@php
    // Dummy user data for frontend demonstration
    $dummyUsers = [
        (object)[ 'id' => 1, 'name' => 'Alice Smith', 'email' => 'alice@example.com', 'password' => '******', 'role' => 'Customer' ],
        (object)[ 'id' => 2, 'name' => 'Bob Johnson', 'email' => 'bob@example.com', 'password' => '******', 'role' => 'Admin' ],
        (object)[ 'id' => 3, 'name' => 'Charlie Brown', 'email' => 'charlie@example.com', 'password' => '******', 'role' => 'Customer' ]
    ];
@endphp

<div class="container mt-5">
    <h1 class="text-center">User Management</h1>
    
    <!-- Top Buttons: Create and Search User -->
    <div class="d-flex justify-content-center my-3">
        <button class="btn btn-primary me-2" onclick="toggleCreateForm()">Create New User</button>
        <button class="btn btn-secondary" onclick="toggleSearchForm()">Search User</button>
    </div>
    
    <!-- Create User Form -->
    <div id="createForm" class="card p-4 shadow-lg" style="display: none;">
        <h2>Create New User</h2>
        <form action="#" method="POST">
            @csrf
            <div class="mb-3">
                <label for="userName" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="userName" placeholder="Enter user name" required>
            </div>
            <div class="mb-3">
                <label for="userEmail" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="userEmail" placeholder="Enter user email" required>
            </div>
            <div class="mb-3">
                <label for="userPassword" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="userPassword" placeholder="Enter user password" required>
            </div>
            <div class="mb-3">
                <label for="userRole" class="form-label">Role</label>
                <select class="form-select" name="role" id="userRole" required>
                    <option value="Customer">Customer</option>
                    <option value="Admin">Admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Create User</button>
            <button type="button" class="btn btn-danger" onclick="toggleCreateForm()">Cancel</button>
        </form>
    </div>

    <!-- Search User Form -->
    <div id="searchForm" class="card p-4 shadow-lg mt-3" style="display: none;">
        <h2>Search User</h2>
        <form onsubmit="searchUser(event)">
            <div class="mb-3">
                <label for="searchQuery" class="form-label">Name or Email</label>
                <input type="text" class="form-control" name="search_query" id="searchQuery" placeholder="Enter user name or email" required>
            </div>
            <button type="submit" class="btn btn-primary">Search User</button>
            <button type="button" class="btn btn-danger" onclick="toggleSearchForm()">Cancel</button>
        </form>
    </div>

    <!-- User List Table -->
    <table class="table table-striped table-bordered mt-4">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="userTableBody">
            @foreach ($dummyUsers as $user)
            <tr class="user-row" 
                data-user-id="{{ $user->id }}"
                data-name="{{ $user->name }}"
                data-email="{{ $user->email }}"
                data-password="{{ $user->password }}"
                data-role="{{ $user->role }}">
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->password }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm" onclick="showEditUserModal(this)">Edit</a>
                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Edit User Modal -->
<div id="editUserModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editUserForm" onsubmit="saveUserEdit(event)">
                    <input type="hidden" id="editUserId">
                    <div class="mb-3">
                        <label for="editUserName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="editUserName" required>
                    </div>
                    <div class="mb-3">
                        <label for="editUserEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="editUserEmail" required>
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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


    function searchUser(event) {
        event.preventDefault();
        let query = document.getElementById('searchQuery').value.trim().toLowerCase();
        let rows = document.querySelectorAll('#userTableBody .user-row');
        let found = false;

        rows.forEach(row => {
            let name = row.cells[1].innerText.toLowerCase();
            let email = row.cells[2].innerText.toLowerCase();
            row.style.display = (name.includes(query) || email.includes(query)) ? "" : "none";
        });
    }
</script>

@endsection
