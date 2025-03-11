<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Management - Sport Indirect</title>
  <!-- Include any admin-specific CSS -->
  <link rel="stylesheet" href="{{ asset('css/adminpage.css') }}">
</head>

@extends('layout.adminlayout')

@section('content')

<body>

    @php
        // Dummy user data for frontend demonstration
        $dummyUsers = [
            (object)[ 'id' => 1, 'name' => 'Alice Smith', 'email' => 'alice@example.com', 'role' => 'Customer' ],
            (object)[ 'id' => 2, 'name' => 'Bob Johnson', 'email' => 'bob@example.com', 'role' => 'Admin' ],
            (object)[ 'id' => 3, 'name' => 'Charlie Brown', 'email' => 'charlie@example.com', 'role' => 'Customer' ]
        ];
    @endphp

    <div class="admin-user-page">
        <h1>User Management</h1>
        
        <!-- Button to toggle the create user form -->
        <button class="btn create-btn" onclick="showCreateForm()">Create New User</button>
        
        <!-- Create User Form (hidden by default) -->
        <div id="createForm" class="create-form" style="display: none;">
            <h2>Create New User</h2>
            <form action="#" method="POST">
                <!-- Frontend demo uses a dummy action -->
                <div class="form-group">
                    <label for="userName">Name</label>
                    <input type="text" name="name" id="userName" placeholder="Enter user name" required>
                </div>
                <div class="form-group">
                    <label for="userEmail">Email</label>
                    <input type="email" name="email" id="userEmail" placeholder="Enter user email" required>
                </div>
                <div class="form-group">
                    <label for="userRole">Role</label>
                    <select name="role" id="userRole" required>
                        <option value="Customer">Customer</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn submit-btn">Create User</button>
                <button type="button" class="btn cancel-btn" onclick="hideCreateForm()">Cancel</button>
            </form>
        </div>
        
        <!-- User List Table -->
        <table class="users-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dummyUsers as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <!-- Edit and Delete actions -->
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
