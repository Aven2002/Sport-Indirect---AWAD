
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Management - Sport Indirect</title>
  <!-- Include any admin-specific CSS -->
  <link rel="stylesheet" href="{{ asset('css/contactus.css') }}">
</head>
<body>
@extends('layout.userlayout')

@section('content')
<div class="contact-page">
    <h2>Contact Us</h2>
    <p>Please fill out the form below with your inquiry and we will get back to you as soon as possible.</p>
    <form action="#" method="POST">
        <!-- For frontend demo, we're using a dummy action. -->
        <div class="form-group">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>
        </div>
        <div class="form-group">
            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" placeholder="Subject" required>
        </div>
        <div class="form-group">
            <label for="message">Your Message:</label>
            <textarea id="message" name="message" placeholder="Type your message here" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn submit-btn">Send Message</button>
    </form>
</div>
</body>
</html>
@endsection
