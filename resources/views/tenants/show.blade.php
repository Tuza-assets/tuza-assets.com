@extends('layouts.web')

@section('content')
<!-- Custom Styles -->
<style type="text/css">
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
            font-size: 2em;
        }

        .hero p {
            font-size: 1.2em;
        }
    }

    /* Content Section */
    .content-section {
        padding: 2rem 0;
    }

    .content-section .container {
        max-width: 1200px;
        margin: auto;
    }

    .content-section .card {
        background-color: #fff;
        border: none;
        border-radius: 1px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        overflow: hidden;
        margin-bottom: 2rem;
    }

    .content-section .card:hover {
        transform: scale(1.03);
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
    }

    .content-section .card img {
        height: 350px;
        object-fit: cover;
        width: 100%;
        border-bottom: 2px solid #045501;
    }

    .content-section .card-body {
        padding: 1rem;
    }

    .content-section .card-footer {
        padding: 1rem;
        background: #f8f9fa;
        border-top: none;
    }

    .content-section .btn {
        background-color: #045501;
        color: white;
        padding: 10px 20px;
        text-transform: uppercase;
        transition: background-color 0.3s;
        border-radius: 5px;
    }

    .content-section .btn:hover {
        background-color: #033f01;
    }

    .feature-list i {
        color: green;
        margin-right: 10px;
    }

    /* Details Section */
    .details p i {
        color: green;
        margin-right: 8px;
    }
</style>

<section class="hero">
    <div class="container">
        <h1 class="display-4">TUZA ASSETS Ltd</h1>
        <p class="lead">Property</p>
    </div>
</section>

<section class="content-section">
    <div class="container">
        @if(isset($property) && is_array($property))
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div id="propertyCarousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @if(isset($property['thumbnail']) && isset($property['thumbnail']['image']))
                                    <div class="carousel-item active">
                                        <img src="{{ $property['thumbnail']['image'] }}" class="d-block w-100" alt="House Image">
                                    </div>
                                @endif
                                
                                @if(isset($property['property_images']) && is_array($property['property_images']))
                                    @foreach ($property['property_images'] as $image)
                                        @if (isset($image['image']) && !empty($image['image']))
                                            <div class="carousel-item">
                                                <img src="{{ $image['image'] }}" class="d-block w-100" alt="Property Image">
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            
                            @if(isset($property['property_images']) && count($property['property_images']) > 0)
                                <a class="carousel-control-prev" href="#propertyCarousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#propertyCarousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $property['name'] ?? 'Property Name Not Available' }}</h5>
                            <p class="card-text">{{ $property['description'] ?? 'No description available' }}</p>
                            <div class="details">
                                <p><i class="fas fa-home"></i> {{ $property['type'] ?? 'Type Not Specified' }}</p>
                                <p><i class="fas fa-shield-alt"></i> {{ $property['utilities'] ?? 'Utilities Not Specified' }}</p>
                                <p><i class="fas fa-map-marker-alt"></i> 
                                    {{ isset($property['district']) ? $property['district'] : 'District Not Specified' }}, 
                                    {{ isset($property['sector']) ? $property['sector'] : 'Sector Not Specified' }}
                                </p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex flex-column flex-md-row justify-content-between">
                                <div class="purchase-info mt-2">
                                    <a href="https://property.tuza-assets.com/register" class="btn btn-success mt-3" target="_blank">Start Rent Process</a>
                                </div>
                                <div class="mt-2">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}"
                                        class="btn btn-success" target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}&text={{ urlencode($property['name'] ?? 'Property') }}"
                                        class="btn btn-success ml-2" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-warning">
                <h4>Property Not Found</h4>
                <p>Sorry, the requested property information is not available.</p>
            </div>
        @endif
    </div>
</section>
@endsection