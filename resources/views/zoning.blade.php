@extends('layouts.web')

<style>
    .feature-list i {
        color: green;
        margin-right: 10px;
    }

    .heroo {
        background-size: cover;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        transition: background-image 1s ease-in-out, opacity 1s ease-in-out;
    }

    .heroo::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1;
    }

    .heroo .container {
        position: relative;
        z-index: 2;
        text-align: center;
    }

    .heroo h1 {
        font-size: 2rem;
        font-weight: bold;
    }

    .heroo p {
        font-size: 1.2rem;
        margin-bottom: 1rem;
    }

    .nav-tabs .nav-link {
        color: green;
    }

    .nav-tabs .nav-link.active {
        color: orange;
        background-color: transparent;
    }

    .thumbnail-container {
        cursor: pointer;
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem;
        border-bottom: 1px solid #e2e8f0;
    }

    .card-header h5 {
        margin: 0;
    }

    .btn-view-all {
        background-color: #4299e1;
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        transition: background-color 0.3s ease;
    }

    .btn-view-all:hover {
        background-color: #3182ce;
    }

    .card1 {
        border-radius: 1px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
        font-family: 'Roboto Slab', serif;
        text-decoration: none !important;
    }

    .card1:hover {
        transform: scale(1.05);
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.2);
    }

    .card {
        border: none !important;
        border-radius: 1px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
        font-family: 'Roboto Slab', serif;
        text-decoration: none !important;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.2);
    }

    .card a:hover {
        text-decoration: none !important;
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

    .btn-successs {
        background-color: #28a745;
        border: none;
        color: white;
        padding: 10px 15px;
        font-size: .7rem;
        transition: background-color 0.3s ease;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    /* Media Queries for Responsive Design */
    @media (min-width: 576px) {
        .heroo h1 {
            font-size: 3rem;
        }

        .heroo p {
            font-size: 1.5rem;
        }
    }

    @media (min-width: 768px) {
        .heroo h1 {
            font-size: 4rem;
        }

        .heroo p {
            font-size: 1.8rem;
        }

        .card-header {
            padding: 1.5rem;
        }

        .card-title {
            font-size: 1.5rem;
        }

        .card-price {
            font-size: 1.3rem;
        }

        .btn-successs {
            font-size: 1rem;
        }
    }
</style>

@section('content')
<section class="heroo text-white text-center py-5 d-flex align-items-center">
    <div class="container d-flex flex-column align-items-center">
        <h1 class="display-4">TUZA ASSETS Ltd</h1>
        <p class="lead">Zoning</p>
        <div class="d-flex flex-wrap mb-4 align-items-center">
            <img
                src="{{ asset('assets/images/gif.gif') }}"
                class="img-fluid mb-3 mb-md-0"
                style="width: 80px; height: 50px; object-fit: cover;" />
            <div class="px-3">
                <a class="text-white fw-bold" href="{{ route('new-propertyonsell') }}">
                    {{ __('home.PROPERTY_AVAILABLE_FOR_SELL') }}
                </a>
            </div>
        </div>  
    </div>
</section>


<section>
    @php
        use App\Models\Design;
        $designs = Design::inRandomOrder()->take(5)->get();
        use App\Models\Zonning;
        $zonnings = Zonning::all();
    @endphp
    <div class="container mt-5">
        <div class="container">
            <div class="card-header d-flex justify-content-between ">
                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                    @foreach($zonnings as $index => $zonning)
                    <li class="nav-item">
                        <a class="nav-link @if($index === 0) active @endif" id="link{{ $index }}-tab" data-toggle="tab" href="#link{{ $index }}" role="tab" aria-controls="link{{ $index }}" aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                            {{ $zonning->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    @foreach($zonnings as $index => $zonning)
                    <div class="tab-pane fade @if($index === 0) show active @endif" id="link{{ $index }}" role="tabpanel" aria-labelledby="link{{ $index }}-tab">
                        <h5>{{ $zonning->name }}</h5>
                        <p>{!! $zonning->description !!}</p>
                        @if ($zonning->images)
                        @php
                        $images = is_string($zonning->images) ? json_decode($zonning->images, true) : $zonning->images;
                        if (!is_array($images)) {
                            $images = [];
                        }
                        @endphp
                        <div class="row">
                           <div class="card py-2 col-lg-6">
                                <div id="carousel{{ $index }}" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        @foreach ($images as $imageIndex => $image)
                                        <li data-target="#carousel{{ $index }}" data-slide-to="{{ $imageIndex }}" class="{{ $imageIndex == 0 ? 'active' : '' }}"></li>
                                        @endforeach
                                    </ol>
                                    <div class="carousel-inner">
                                        @foreach ($images as $imageIndex => $image)
                                        @php
                                        $imagePath = is_array($image) && isset($image['path']) ? $image['path'] : $image;
                                        @endphp
                                        <div class="carousel-item {{ $imageIndex == 0 ? 'active' : '' }}">
                                            <img src="{{ $imagePath }}" class="d-block w-100" alt="Post Image">
                                        </div>
                                        

                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carousel{{ $index }}" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel{{ $index }}" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        @foreach ($images as $imageIndex => $image)
                                        @php
                                        $imagePath = is_array($image) && isset($image['path']) ? $image['path'] : $image;
                                        @endphp
                                        <div class="col-3 p-1">
                                            <div class="thumbnail-container">
                                                <img src="{{ $imagePath }}" class="img-thumbnail thumbnail-image" alt="Property Thumbnail" data-target="#carousel{{ $index }}" data-slide-to="{{ $imageIndex }}">
                                            </div>
                                        </div>
                                        
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            @if ($designs->isNotEmpty())
                            <div class="col-lg-6">
                                <div class="card bg-white shadow-lg">
                                    <div class="d-flex flex-lg-row flex-md-row flex-sm-column flex-column justify-content-between align-items-center w-100">
                                        <h5 class="mb-sm-2 mb-2">Design For Sell</h5>
                                        <ul class="nav">
                                            <li class="nav-item">
                                                <a class="nav-link text-success" href="{{ route('blogs') }}">{{ __('message.designs1') }}</a>
                                            </li>
                                        </ul>
                                    </div>


                                    <div class="card-body">
                                        <div class="row">
                                            @foreach ($designs as $design)
                                            <div class="col-12 col-md-6 mb-4">
                                                <div class="card1 rental-card h-100">
                                                    <a href="{{ route('blog.details', ['id' => $design->id]) }}" class="view-more-link">
                                                        <img src="{{ asset('public/'.$design->main_image) }}" class="card-img-top" alt="Design Image">
                                                        <div class="card-body">
                                                            <p class="card-title">{{ $design->name }}</p>
                                                            <p class="card-price">{{ $design->price }} {{ $design->currency }}</p>
                                                            <div class="btn-successs">Download The Design</div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            @endif
                            @else
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var carousels = document.querySelectorAll('.carousel');

        carousels.forEach(function(carousel) {
            var thumbnails = carousel.querySelectorAll('.thumbnail-image');

            thumbnails.forEach(function(thumbnail) {
                thumbnail.addEventListener('click', function() {
                    var newIndex = this.getAttribute('data-slide-to');
                    var targetCarousel = this.getAttribute('data-target');
                    $(targetCarousel).carousel(parseInt(newIndex));
                });
            });

            $(carousel).carousel({
                interval: 3000 // Set the interval to 3 seconds
            });
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const images = ["zon1.jpg", "zone2.jpg", "zone3.jpg", "zone4.jpg"];
        let currentIndex = 0;

        function changeBackground() {
            // Update the background image
            document.querySelector(".heroo").style.backgroundImage =
                `url('{{ asset('assets/images/') }}/${images[currentIndex]}')`;
            currentIndex = (currentIndex + 1) % images.length; // Move to the next image
        }
        setInterval(changeBackground, 5000);
    });
</script>
@endsection
