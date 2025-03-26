<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Location Management - Sport Indirect</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

@extends('layouts.admin')

@section('title', 'Manage Locations')

@section('content')

@php
    // Dummy location data for frontend demonstration
    $dummyLocations = [
        (object)['id' => 1, 'name' => 'Location One', 'address' => '123 Main Street, City A, Country X', 'latitude' => '40.7128', 'longitude' => '-74.0060'],
        (object)['id' => 2, 'name' => 'Location Two', 'address' => '456 Market Street, City B, Country Y', 'latitude' => '34.0522', 'longitude' => '-118.2437'],
        (object)['id' => 3, 'name' => 'Location Three', 'address' => '789 Broadway, City C, Country Z', 'latitude' => '51.5074', 'longitude' => '-0.1278'],
    ];
@endphp

<div class="container my-5">
    <h1 class="text-center">Location Management</h1>

    <!-- Top Buttons: Create and Search Location -->
    <div class="text-center my-3">
        <button class="btn btn-primary me-2" onclick="toggleCreateForm()">Create New Location</button>
        <button class="btn btn-secondary" onclick="toggleSearchForm()">Search Location</button>
    </div>

    <!-- Create Location Form -->
    <div id="createForm" class="p-4 border rounded bg-light d-none">
        <h2>Create New Location</h2>
        <form action="#" method="POST">
            @csrf
            <div class="mb-3">
                <label for="locationName" class="form-label">Location Name</label>
                <input type="text" class="form-control" name="name" id="locationName" required>
            </div>
            <div class="mb-3">
                <label for="locationAddress" class="form-label">Address</label>
                <input type="text" class="form-control" name="address" id="locationAddress" required>
            </div>
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" class="form-control" name="latitude" id="latitude" required>
            </div>
            <div class="mb-3">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" class="form-control" name="longitude" id="longitude" required>
            </div>
            <button type="submit" class="btn btn-success">Create Location</button>
            <button type="button" class="btn btn-secondary" onclick="toggleCreateForm()">Cancel</button>
        </form>
    </div>

    <!-- Search Location Form -->
    <div id="searchForm" class="p-4 border rounded bg-light d-none">
        <h2>Search Location</h2>
        <form onsubmit="searchLocation(event)">
            <div class="mb-3">
                <label for="searchQuery" class="form-label">Location Name or Address</label>
                <input type="text" class="form-control" id="searchQuery" required>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
            <button type="button" class="btn btn-secondary" onclick="toggleSearchForm()">Cancel</button>
        </form>
    </div>

    <!-- Location Table -->
    <table class="table table-striped mt-4">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Location Name</th>
                <th>Address</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dummyLocations as $location)
            <tr>
                <td>{{ $location->id }}</td>
                <td>{{ $location->name }}</td>
                <td>{{ $location->address }}</td>
                <td>{{ $location->latitude }}</td>
                <td>{{ $location->longitude }}</td>
                <td>
                    <button class="btn btn-warning btn-sm" onclick="showEditLocationModal({{ $location->id }})">Edit</button>
                    <button class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Edit Location Modal -->
<div id="editLocationModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content p-4">
            <h3>Edit Location</h3>
            <form id="editLocationForm">
                <input type="hidden" id="editLocationId">
                <div class="mb-3">
                    <label for="editLocationName" class="form-label">Location Name</label>
                    <input type="text" id="editLocationName" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="editLocationAddress" class="form-label">Address</label>
                    <input type="text" id="editLocationAddress" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="editLatitude" class="form-label">Latitude</label>
                    <input type="text" id="editLatitude" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="editLongitude" class="form-label">Longitude</label>
                    <input type="text" id="editLongitude" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </form>
        </div>
    </div>
</div>

<script>
    function toggleCreateForm() {
        document.getElementById('createForm').classList.toggle('d-none');
        document.getElementById('searchForm').classList.add('d-none');
    }

    function toggleSearchForm() {
        document.getElementById('searchForm').classList.toggle('d-none');
        document.getElementById('createForm').classList.add('d-none');
    }

    function searchLocation(e) {
        e.preventDefault();
        let query = document.getElementById('searchQuery').value.trim().toLowerCase();
        let rows = document.querySelectorAll('tbody tr');
        let found = false;
        rows.forEach(row => {
            let name = row.children[1].innerText.toLowerCase();
            let address = row.children[2].innerText.toLowerCase();
            row.style.display = (name.includes(query) || address.includes(query)) ? '' : 'none';
            found = found || name.includes(query) || address.includes(query);
        });
        if (!found) alert("No location found.");
    }

    function showEditLocationModal(id) {
        new bootstrap.Modal(document.getElementById('editLocationModal')).show();
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
