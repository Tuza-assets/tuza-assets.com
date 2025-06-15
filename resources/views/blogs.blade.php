@extends('layouts.web')

<!-- Import Roboto Slab Font -->
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&display=swap" rel="stylesheet">

@section('content')
<!-- Hero Section -->
<section class="hero text-white text-center py-5">
    <div class="container">
        <h1 class="display-4">TUZA ASSETS Ltd</h1>
        <p class="lead">{{ __('message.designs') }}</p>
    </div>
</section>

<!-- Design Showcase Section -->
<section>
    <div class="min-vh-100 d-flex bg-overlay py-5">
        <div class="container">
            <div class="row text-center">

                @php
                    use App\Models\Design;
                    $designs = Design::all();
                @endphp

                @if ($designs->isNotEmpty())
                    @foreach ($designs as $design)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card rental-card h-100">
                                <a href="{{ route('blog.details', ['id' => $design->id]) }}" class="view-more-link">
                                    <img src="{{ asset('public/'.$design->main_image) }}" class="card-img-top" alt="Design Image">
                                    <div class="card-body">
                                        <p class="card-title">{{ $design->name }}</p>
                                        <p class="card-price">{{ $design->price }} {{ $design->currency }}</p>
                                        <div class="btn btn-success">Download The Design</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="lead">No designs available at the moment. Please check back later.</p>
                @endif

            </div>
        </div>
    </div>
</section>
@endsection

<style>
    /* General Styles */
    body {
        font-family: 'Roboto Slab', serif;
        color: #333;
    }

    /* Hero Section */
    .hero {
        background-color: #007bff;
        color: white;
    }

    .hero .display-4 {
        font-weight: bold;
    }

    .hero .lead {
        font-size: 1.25rem;
    }

    /* Card Styles */
    .card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
        font-family: 'Roboto Slab', serif;
        text-decoration: none !important; /* Ensure no underline */
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.2);
        text-decoration: none !important; /* Ensure no underline */
    }

    .card img {
        display: block; /* Ensures the image fills the card and prevents underline */
    }

    .card a {
        text-decoration: none; /* Remove underline from link */
        color: inherit; /* Inherit the text color */
    }

    .card a:hover {
        text-decoration: none !important; /* Ensure no underline on hover */
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
        border-radius: 10px 10px 0 0;
    }

    .card-body {
        padding: 20px;
        text-align: left;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
        color: #333;
    }

    .card-price {
        color: orange;
        font-size: 1.1rem;
        margin: 10px 0;
    }

    .btn-success {
        background-color: #28a745;
        border: none;
        color: white;
        padding: 10px 15px;
        font-size: 1rem;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    /* Overlay Effect */
    .bg-overlay {
        background: linear-gradient(to right, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.8)), url('path/to/your/image.jpg') center center/cover no-repeat;
        background-size: cover;
    }

    /* Responsive Styles */
    @media (max-width: 767px) {
        .card {
            margin-bottom: 20px;
        }
    }
</style>
