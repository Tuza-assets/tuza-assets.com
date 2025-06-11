@extends('layouts.web')

@section('content')
<!-- Custom Styles -->
<style>
    /* Hero Section */
    .hero {
        min-height: 70vh;
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/assets/images/hero-bg.jpg') center center no-repeat;
        background-size: cover;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #fff;
    }

    .hero h1 {
        font-size: 3em;
        font-family: 'Roboto Slab', serif;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .hero p {
        font-size: 1.5em;
        margin-top: 0;
    }

    @media (max-width: 424px) {
        .hero h1 {
            font-size: 1.7em;
        }

        .hero p {
            font-size: 1.2em;
        }
    }

    /* Content Section */
    .content-section {
        padding: 2rem 0;
        background-color: #f8f9fa;
    }

    .content-section .container {
        max-width: 1200px;
        margin: auto;
    }

    .content-section .card {
        background-color: #fff;
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 1.5rem;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .content-section .card:hover {
        transform: scale(1.03);
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
    }
    
    .card {
        background-color: #fff;
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 1.5rem;
        transition: transform 0.3s, box-shadow 0.3s;
    }
    
    .card:hover {
            transform: scale(1.03);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
        }
        
    .content-section .card img {
        height: 350px;
        object-fit: cover;
        width: 100%;
    }

    .content-section .card-body {
        padding: 1rem;
    }

    .content-section .btn {
        background-color: #045501;
        color: white;
        padding: 10px 20px;
        text-transform: uppercase;
        transition: background-color 0.3s;
        border-radius: 5px;
        text-align: center;
    }

    .content-section .btn:hover {
        background-color: #033f01;
    }

    .feature-list i {
        color: green;
        margin-right: 10px;
    }

    /* Carousel Controls */
    .carousel-control-prev,
    .carousel-control-next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: transparent;
        border: none;
        padding: 10px;
        cursor: pointer;
    }

    .carousel-control-prev {
        left: 10px;
    }

    .carousel-control-next {
        right: 10px;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-size: 100%, 100%;
    }

    .carousel-control-prev-icon {
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23ffffff' viewBox='0 0 16 16'%3e%3cpath d='M11.354 1.354a.5.5 0 0 0-.708-.708l-7 7a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708L4.707 8l6.647-6.646z'/%3e%3c/svg%3e");
    }

    .carousel-control-next-icon {
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' fill='%23ffffff' viewBox='0 0 16 16'%3e%3cpath d='M4.646 1.354a.5.5 0 0 1 .708 0l7 7a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708L11.293 8 4.646 1.354z'/%3e%3c/svg%3e");
    }
</style>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <h1 class="display-4">TUZA ASSETS Ltd</h1>
        <p class="lead">{{ __('message.tenants_title') }}</p>
    </div>
</section>

<!-- Content Section -->
<section class="content-section">
    <div class="container">
        <div class="row">
            <!-- Image Carousel Card -->
            <div class="col-md-6">
                <div class="card">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @php
                                $images = [
                                    'invetor1.jpg',
                                    'prop1.jpg',
                                    'prop2.jpg',
                                    'prop3.jpg',
                                    'prop4.jpg',
                                    'prop5.jpg',
                                ];
                            @endphp

                            @foreach ($images as $index => $image)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    <img src="{{ asset('/assets/images/' . $image) }}" class="d-block w-100" alt="Slide {{ $index + 1 }}">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </button>
                    </div>
                    <div class="card-body text-center">
                        <a class="btn" href="{{ route('Contact') }}">{{ __('message.tenants_oinus') }}</a>
                    </div>
                </div>
            </div>

            <!-- Overview Section Card -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-success">{{ __('message.tenants_title') }}</h3>
                        <p class="card-text pb-5">{{ __('message.tenants_message') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
       @if ($properties)
        <section class="recent-rental pb-5">
            <div class="container"> 
           
            <a href="https://www.tuza-assets.com/en/Api/Property/all">  <h5 class="text-left  text-success mb-5 font-weight-bold ">{{ __('home.PROPERTY_AVAILABLE_FOR_RENT') }}</h5></a>
               
                <div class="row">
                    @if ($properties)
                        @forelse ($properties as $property)
                            <div class="col-md-3"> 
                                <div class="card rental-card">
                                    <a href="{{ route('api-property-v2.show', $property['id']) }}"
                                        class="view-more-link text-success" style="text-decoration: none;">
                                        <img src="{{ $property['thumbnail']['image'] }}" class="card-img-top"
                                            alt="Rental 1" style="min-height:200px;max-height:200px;width:100%">
                                        <div class="p-3 w-100">
                                           <p class="p display-5 font-weight-bold text-dark">{{ \Illuminate\Support\Str::limit($property['name'], 25) }}</p>

                                            <p class="text-dark ">
                                                <span>Price:</span>  {{ number_format($property['available_units'][0]['rent'], 0, ',', '.') }}
                                            </p>
                                            <div class="property-card-details">
                                                <span><i class="fas fa-ruler-combined"></i> <span>Size:</span> {{ $property['available_units'][0]['dimensions'] }} m²</span>
                                                <span><i class="fas fa-bed"></i> <span>Rooms:</span> {{ $property['available_units'][0]['bedroom'] }}</span><br>
                                                <span><i class="fa fa-map-signs" aria-hidden="true"></i> <span>Property Type:</span> {{ $property['type'] }}</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
    
                            </div>
                        @empty
                        @endforelse
                    @endif
    
                </div>
    
            </div>
        </section>
    @endif
<!-- Carousel Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('.carousel').carousel({
            interval: 3000,
            wrap: true
        });
    });
</script>
@endsection
