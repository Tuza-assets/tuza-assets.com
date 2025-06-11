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
        min-height: 70%;
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
    }
button{
    color:orange;
}
    .heroo h1 {
        font-size: 3rem;
        font-weight: bold;
    }

    .heroo p {
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }
    
    
      .scrolling-wrapper {
        display: flex;
        flex-wrap: nowrap;
        overflow-x: auto;
        padding-bottom: 10px;
        gap: 35px; /* Adds space between cards */
        scroll-behavior: smooth;
    }

    /* Hide scrollbars in WebKit browsers */
    .scrolling-wrapper::-webkit-scrollbar {
        display: none;
    }

    /* Card styling for flexbox container */
    .scrolling-wrapper .card {
        min-width: 300px;
    }

    /* For large screens (show 4 cards, scroll if more) */
    @media (min-width: 992px) {
        .scrolling-wrapper .card {
            flex: 0 0 25%; /* Each card takes up 25% of the container (4 per row) */
        }
    }

    /* Slider controls */
    .slider-controls {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 15px;
    }

    .slider-controls .arrow {
        background-color: #fe6900;
        border: none;
        color: white;
        padding: 10px;
        border-radius: 50%;
        cursor: pointer;
    }

    /* Slider indicators */
    .slider-indicators {
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }

    .slider-indicators .dot {
        height: 10px;
        width: 10px;
        margin: 0 5px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.3s;
    }

    .slider-indicators .active {
        background-color: #fe6900;
    }
    
</style>

@section('content')
    <section class="heroo text-white text-center py-5">
        <div class="container">
            <h1 class="display-4">TUZA ASSETS Ltd</h1>
            <p class="lead">{{ __('message.diaspora') }}</p>
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
    
        <div class="bg-white container-fluid " style="padding: 20px 30px">
        <div class="container mt-4">
            <!-- Top Section with Image and Overview -->
            <div class="row ">
                <div class="col-md-6">
                    <img src="{{ asset('/assets/images/2new.jpg') }}" style="width: 500px;border-radius: 3px" class="img-fluid"
                        alt="Living Room">
                </div>
                <div class="col-md-6">
                    <p>{{ __('message.specialize') }}</p>
                    <ul class="feature-list list-unstyled">
                        <li><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6" style="width: 20px;color:orangered">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            {{ __('message.design_construction') }}</li>
                        <li><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6" style="width: 20px;color:orangered">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg> {{ __('message.property_management') }}</li>
                        <li><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6" style="width: 20px;color:orangered">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg> {{ __('message.marketing') }}</li>
                        <li><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6" style="width: 20px;color:orangered">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg> {{ __('message.property_inspection') }}</li>
                        <li><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6" style="width: 20px;color:orangered">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg> {{ __('message.maintenance_remodeling') }}</li>
                        <li><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6" style="width: 20px;color:orangered">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg> {{ __('message.rent_collection') }}</li>
                        <li><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6" style="width: 20px;color:orangered">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg> {{ __('message.tenant_relationship_management') }}</li>
                        <li><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6" style="width: 20px;color:orangered">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg> {{ __('message.electronic_property_monitoring') }}</li>
                    </ul>
                    
                </div>
            </div>
            
            
             @include('diaspora.What-we-offer-Section')

            <div class="container ">
                <div class="row">
                    <h2 class="text-center my-5">{{ __('message.services') }}</h2>
                    <div class="col-lg-12">
                        <ul class="nav nav-tabs" id="myTab" style="font-size: 13px" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="letting-tab" data-toggle="tab" data-target="#letting"
                                    type="button" role="tab" aria-controls="letting" aria-selected="true">{{ __('message.letting_services') }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="Emergency-tab" data-toggle="tab" data-target="#Emergency"
                                    type="button" role="tab" aria-controls="Emergency" aria-selected="false">{{ __('message.emergency_service_support') }}</button>
                            </li>
                            <!--<li class="nav-item" role="presentation">-->
                            <!--    <button class="nav-link" id="Rent-tab" data-toggle="tab" data-target="#Rent"-->
                            <!--        type="button" role="tab" aria-controls="Rent" aria-selected="false">{{ __('message.rent_collection') }}</button>-->
                            <!--</li>-->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="Reporting-tab" data-toggle="tab" data-target="#Reporting"
                                    type="button" role="tab" aria-controls="Reporting"
                                    aria-selected="false">{{ __('message.reporting') }}</button>
                            </li>
                            <!--<li class="nav-item" role="presentation">-->
                            <!--    <button class="nav-link" id="Tenant-tab" data-toggle="tab" data-target="#Tenant"-->
                            <!--        type="button" role="tab" aria-controls="Tenant" aria-selected="false">{{ __('message.tenant_relationship') }}</button>-->
                            <!--</li>-->
                            <!--<li class="nav-item" role="presentation">-->
                            <!--    <button class="nav-link" id="Electronic-tab" data-toggle="tab" data-target="#Electronic"-->
                            <!--        type="button" role="tab" aria-controls="Electronic"-->
                            <!--        aria-selected="false">{{ __('message.electronic_property_monitoring') }}</button>-->
                            <!--</li>-->
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="Best-tab" data-toggle="tab" data-target="#Best"
                                    type="button" role="tab" aria-controls="Best" aria-selected="false">{{ __('message.best_kept_secret') }}</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane  border p-4 fade show active" id="letting" role="tabpanel"
                                aria-labelledby="letting-tab">
                                {{ __('message.letting_services_content') }}
                            </div>
                            <div class="tab-pane border p-4 fade" id="Emergency" role="tabpanel"
                                aria-labelledby="Emergency-tab">
                                <p>{{ __('message.emergency_service_content') }}</p>
                                <ul>
                                    <li>{{ __('message.always_at_your_service') }}</li>
                                    <li>{{ __('message.quick_and_easy_access') }}</li>
                                    <li>{{ __('message.online_monitoring') }}</li>
                                </ul>
                            </div>
                            <div class="tab-pane border p-4 fade" id="Rent" role="tabpanel"
                                aria-labelledby="Rent-tab">
                                {{ __('message.rent_collection_content') }}
                            </div>
                            <div class="tab-pane border p-4 fade" id="Reporting" role="tabpanel"
                                aria-labelledby="Reporting-tab">
                                {{ __('message.reporting_content') }}
                            </div>
                            <div class="tab-pane  border p-4 fade" id="Tenant" role="tabpanel"
                                aria-labelledby="Tenant-tab">
                                {{ __('message.tenant_relationship_content') }}
                            </div>
                            <div class="tab-pane border p-4 fade" id="Electronic" role="tabpanel"
                                aria-labelledby="Electronic-tab">
                                {{ __('message.electronic_property_monitoring_content') }}
                            </div>
                            <div class="tab-pane  border p-4 fade" id="Best" role="tabpanel"
                                aria-labelledby="Best-tab">
                                {{ __('message.best_kept_secret_content') }}
                                <a href="{{ route('Bestkeptsecret') }}">{{ __('message.see_services') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="container pt-5">
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6">
                    <a href="{{ route('Contact') }}" class="btn btn-success d-flex  align-items-center justify-content-center gap-2">
                        <span class="px-3">{{ __('message.contact_title') }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6" style="width: 20px">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </a>
                    </div>
                </div>
            </div>
            </div>
            
        </div>
    </div>
    <hr>
  
        @if ($properties)
        <section class="recent-rental py-5">
            <div class="container"> 
                <a href="https://www.tuza-assets.com/en/Api/Property/all"> 
                    <h5 class="text-left  text-success mb-5 font-weight-bold ">PROPERTY AVAILABLE FOR RENT</h5>
                </a>
               
                <div class="row">
                    @if ($properties)
                    <div class="container">
                        <!-- Scrollable card section for all screen sizes -->
                        <div class="scrolling-wrapper">
                            @foreach($properties as $property)
                            <div class="card rental-card">
                                <a href="{{ route('api-property-v2.show', $property['id']) }}" class="view-more-link text-success" style="text-decoration: none;">
                                    <img src="{{ $property['thumbnail']['image'] }}" class="card-img-top" alt="Rental 1" style="min-height:200px;max-height:200px;width:100%">
                                    <div class="card-body">
                                        <p class="card-location"><img src="{{ asset('assets/images/5.svg') }}" alt="Location Icon">
                                            {{ $property['province'] }},<br> {{ $property['district'] }}, {{ $property['sector'] }}
                                        </p>
                                        <p class="card-text">{{ Str::limit($property['description'], 70) }}</p>
                                        View more
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <!-- Slider controls -->
                        <div class="slider-controls">
                            <button class="arrow left-arrow">←</button>
                            <button class="arrow right-arrow">→</button>
                        </div>

                        <!-- Slider indicators -->
                        <div class="slider-indicators">
                            @foreach($properties as $index => $property)
                                <span class="dot {{ $index == 0 ? 'active' : '' }}"></span>
                            @endforeach
                        </div>
                    </div>

                    @endif

                </div>

            </div>
        </section>
       @endif
    <hr>
        <div class="container py-4">
            <div class="row">
                
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                    <a href="{{ route('PropertyManagement') }}" class="btn btn-success d-flex  align-items-center justify-content-center gap-2">
                        <span class="px-3">{{ __('message.see_property_button') }}</span>
                    </a>
                    
                </div>
            </div>
        </div>
<style>
        hr {
        border: 1px solid #fe6900;
        width: 80%;
       }               
        .tab-pane a {
            color: green;
        }
        .tab-pane a:hover {
            color: orange;
        }
</style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const scrollingWrapper = document.querySelector('.scrolling-wrapper');
            const dots = document.querySelectorAll('.dot');
            let currentIndex = 0;

            // Update active indicator dot
            function updateIndicators() {
                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentIndex);
                });
            }

            // Scroll to a specific card
            function scrollToCard(index) {
                const cardWidth = scrollingWrapper.querySelector('.card').offsetWidth + 35; // card width + gap
                scrollingWrapper.scrollTo({
                    left: index * cardWidth,
                    behavior: 'smooth'
                });
                currentIndex = index;
                updateIndicators();
            }

            // Handle left/right arrows
            document.querySelector('.left-arrow').addEventListener('click', () => {
                if (currentIndex > 0) {
                    scrollToCard(currentIndex - 1);
                }
            });

            document.querySelector('.right-arrow').addEventListener('click', () => {
                if (currentIndex < dots.length - 1) {
                    scrollToCard(currentIndex + 1);
                }
            });

            // Auto-scroll background images
            const images = ["ten.jpg"];
            let bgIndex = 0;

            function changeBackground() {
                document.querySelector(".heroo").style.backgroundImage =
                    `url('{{ asset('assets/images/') }}/${images[bgIndex]}')`;
                bgIndex = (bgIndex + 1) % images.length;
            }
            setInterval(changeBackground, 5000);

        });
    </script>
@endsection
