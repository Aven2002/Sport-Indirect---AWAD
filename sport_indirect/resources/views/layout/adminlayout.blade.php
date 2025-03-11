<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - @yield('title', 'Dashboard')</title>
  <!-- Include any admin-specific CSS -->
  <link rel="stylesheet" href="{{ asset('css/adminlayout.css') }}">
</head>
<body>
  <header class="admin-header">
    <div class="header-top">
      <img src="{{ asset('images/logo.png') }}" alt="Logo" class="admin-logo">
      <h1>Admin Dashboard</h1>
    </div>
    <nav class="admin-nav">
      <ul>
        <li><a href="{{ route('admin.orders.index') }}">Orders</a></li>
        <li><a href="{{ route('admin.products.index') }}">Products</a></li>
        <li><a href="{{ route('admin.users.index') }}">Users</a></li>
      </ul>
    </nav>
  </header>

  <div class="container">
    @yield('content')
  </div>

  <footer>
    <p>&copy; {{ date('Y') }} Sport Indirect. All rights reserved.</p>
  </footer>
</body>
</html>
