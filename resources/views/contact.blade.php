@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="bg-dark text-white text-center py-5">
        <h1 class="display-4">Contact Us</h1>
        <p class="lead">We'd love to hear from you. Get in touch with us today!</p>
    </div>

    <div class="container py-5">
        <div class="row text-center">
            <div class="col-md-4">
                <h4>Email Us</h4>
                <p>Send us an email at <strong>contact@example.com</strong></p>
            </div>
            <div class="col-md-4">
                <h4>Call Us</h4>
                <p>Reach us at <strong>+123 456 7890</strong></p>
            </div>
            <div class="col-md-4">
                <h4>Visit Us</h4>
                <p>123 Street, City, Country</p>
            </div>
        </div>

        <div class="row align-items-center mt-5">
            <div class="col-md-6">
                <img src="https://picsum.photos/300/200?random=3" class="img-fluid rounded shadow" alt="Contact Image">
                <p class="text-muted mt-2">We’re here to help and answer any questions you may have.</p>
            </div>
            <div class="col-md-6">
                <h2 class="my-4">Send Us a Message</h2>
                <form action="{{ route('contact.submit') }}" method="POST" class="bg-light p-4 rounded shadow">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Your Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea id="message" name="message" class="form-control" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Send Message</button>
                </form>
            </div>
        </div>
    </div>
@endsection
