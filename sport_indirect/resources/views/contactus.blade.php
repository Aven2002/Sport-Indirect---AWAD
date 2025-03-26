<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Sport Indirect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/contactus.css') }}">
</head>

@extends('layouts.user')

@section('content')
<div class="container contact-page shadow-lg rounded">
    <h2 class="fw-bold text-center">Contact Us</h2>
    <p class="text-dark">Fill out the form below with your inquiry and we will get back to you soon.</p>

    <form action="#" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Your Name:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label fw-bold">Your Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
        </div>

        <div class="mb-3">
            <label for="subject" class="form-label fw-bold">Subject:</label>
            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label fw-bold">Your Message:</label>
            <textarea class="form-control" id="message" name="message" placeholder="Type your message here" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary w-100">Send Message</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@endsection
</body>
</html>
