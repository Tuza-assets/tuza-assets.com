@extends('layouts.web')
@section('content')
    <style type="text/css">
        .hero-buttons .hero-button {
            border: 3px solid #1D940F;
            padding: 20px 10px;
            display: flex;
            gap: 10px;
            font-weight: bold;
            transition: transform 0.3s, border-color 0.3s;
        }

        .hero-buttons .hero-button:hover {
            transform: scale(1.05);
            border-color: #ED5303;
        }

        @media (max-width: 970px) {
            .hero-buttons {
                display: flex;
                gap: 17px 45px;
                flex-wrap: wrap;
                justify-content: center;
            }
        }

        /* Green Swiper Navigation Buttons */
        .green-swiper::part(button-prev),
        .green-swiper::part(button-next) {
            color: #1D940F;
            /* Green color */
            background-color: rgba(255, 255, 255, 0.8);
            /* White background with opacity */
            border-radius: 50%;
            /* Circular buttons */
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            /* Add shadow */
        }

        .green-swiper::part(button-prev):hover,
        .green-swiper::part(button-next):hover {
            background-color: rgba(255, 255, 255, 1);
            /* Solid white on hover */
        }

        /* Optional: Add a green border to the Swiper container */
        .green-swiper {
            border-radius: 10px;
            /* Rounded corners */
            padding: 20px;
            /* Add some padding */
        }

        /* Optional: Style the Swiper slides */
        .green-swiper swiper-slide {
            border-radius: 8px;
            /* Rounded corners for slides */
            padding: 10px;
            /* Add padding to slides */
        }

        .btn-success {
            background: #1D940F;
        }

        .text-success {
            color: #1D940F;
        }

        .what-we-do p {
            font-size: 1.1rem;
            margin-bottom: 40px;
        }

        .background-image {
            background-size: cover;
            padding: 200px 0;
            border-radius: 1px;
            margin-top: 20px;
            position: relative;
            overflow: hidden;
        }

        .background-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.363);
            z-index: 1;
        }

        .icon-container {
            border-right: 1px solid #ccc;
            padding-right: 20px;
            margin-right: 20px;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .icon-container img {
            width: 60px;
            margin-bottom: 20px;
            transition: transform 0.3s;
        }

        .icon-container h4 {
            font-size: 1.5rem;
            margin-top: 10px;
            margin-bottom: 20px;
            color: white;
        }

        .icon-container:hover img {
            transform: scale(1.1);
        }

        .icon-container .info-list {
            list-style: none;
            padding: 0;
            margin: 0;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease-in-out;
            position: absolute;
            top: 70%;
            left: 50%;
            transform: translateX(-50%);
            background: transparent;
            color: white;
            padding: 1rem;
            border-radius: 5px;
            width: max-content;
            text-align: left;
        }

        .icon-container:hover .info-list {
            opacity: 1;
            visibility: visible;
            width: 330px;
            margin-top: -21px;
        }

        .info-list li {
            transition: color 0.2s ease, transform 0.1s ease;
        }

        .info-list li:hover {
            cursor: pointer;
            color: #1D940F;
            transform: translateX(5px);
        }

        .info-list {
            display: none;
            list-style: none;
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 10px;
            position: relative;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 5px;
            text-align: left;
        }

        .icon-container:hover .info-list {
            display: block;
            text-align: center;
            padding: 4rem;
            cursor: pointer;
        }

        .info-list li {
            padding: 5px 0;
        }

        .info-list li a {
            color: white;
        }

        button {
            border: none;
            cursor: pointer;
            color: white;
            fill: white;
            background: #1D940F;
            transition: all .3s ease-in-out;
        }

        .carousel-view {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 4px 0;
            transition: all 0.25s ease-in;
        }

        .carousel-view .item-list {
            width: 100%;
            display: flex;
            gap: 8px;
            scroll-behavior: smooth;
            transition: all 0.25s ease-in;
            -ms-overflow-style: none;
            scrollbar-width: none;
            overflow: auto;
            scroll-snap-type: x mandatory;
        }

        .item-list::-webkit-scrollbar {
            display: none;
        }

        .prev-btn {
            background: #1D940F;
            color: white;
            cursor: pointer;
        }

        .next-btn {
            cursor: pointer;
        }

        .item {
            scroll-snap-align: center;
            min-width: 150px;
            height: 120px;
            background-color: deeppink;
            border-radius: 8px;
        }

        .what-we-do-container .card-content:hover {
            background: transparent;
        }

        .info-list {
            background: transparent;
        }

        .what-we-do-container {
            border-radius: 0;
        }

        .what-we-do-container::before {
            border-radius: 0;
        }


        .scrolling-wrapper {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            padding-bottom: 10px;
        }


        /* Hide scrollbars in WebKit browsers */
        .scrolling-wrapper::-webkit-scrollbar {
            display: none;
        }


        /* Card styling with margin-right */
        .scrolling-wrapper .card {
            min-width: 300px;
            margin-right: 35px;
            /* Adds space between cards */
        }

        /* Remove margin from last card to avoid extra space at the end */
        .scrolling-wrapper .card:last-child {
            margin-right: 0;
        }

        /* For large screens (show 4 cards, scroll if more) */
        @media (min-width: 992px) {
            .scrolling-wrapper .card {
                flex: 0 0 25%;
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

        /* Hide the "Embed Google Reviews on your website" link */
        .sk-ww-google-reviews a[href*="sociablekit.com"] {
            display: none !important;
        }


        .maindiv {
            margin: 0;
            height: 100vh;
            overflow: hidden;
            position: relative;
            font-family: Arial, sans-serif;
            color: white;
            background-image: url('{{ asset('assets/images/3.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            /* Make .maindiv a flex container */
            flex-direction: column;
            /* Stack children vertically */
            justify-content: flex-end;
            /* Align children to the bottom */
        }

        .background {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-size: cover;
            background-position: center;
            opacity: 0;
            animation: fade 30s infinite;
            transition: opacity 1s ease-in-out;
        }

        .background:nth-child(1) {
            background-image: url('{{ asset('assets/images/bg1.jpg') }}');
            animation-delay: 0s;
        }

        .background:nth-child(2) {
            background-image: url('{{ asset('assets/images/1.jpg') }}');
            animation-delay: 5s;
        }

        .background:nth-child(3) {
            background-image: url('{{ asset('assets/images/2.jpg') }}');
            animation-delay: 10s;
        }

        .background:nth-child(4) {
            background-image: url('{{ asset('assets/images/bg4.jpg') }}');
            animation-delay: 15s;
        }

        .background:nth-child(5) {
            background-image: url('{{ asset('assets/images/bg6.jpg') }}');
            animation-delay: 20s;
        }

        @keyframes fade {
            0% {
                opacity: 0;
            }

            10% {
                opacity: 1;
            }

            20% {
                opacity: 1;
            }

            30% {
                opacity: 0;
            }

            100% {
                opacity: 0;
            }
        }

        .maindiv {
            margin: 0;
            height: 100vh;
            overflow: hidden;
            position: relative;
            font-family: Arial, sans-serif;
            color: white;
            background-image: url('{{ asset('assets/images/3.jpg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: center;
            /* Center content horizontally */
        }

        .background {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-size: cover;
            background-position: center;
            opacity: 0;
            animation: fade 30s infinite;
            transition: opacity 1s ease-in-out;
            z-index: 1;
            /* Ensure backgrounds are behind content */
        }

        .w-100 {
            position: relative;
            /* Ensure it stays in the normal flow */
            z-index: 2;
            /* Bring it above the .background divs */
            text-align: center;
            /* Center text */
            margin-bottom: 20px;
            /* Add space between text and buttons */
        }

        .hero-buttons {
            display: flex;
            gap: 57px;
            flex-wrap: wrap;
            justify-content: center;
            margin-bottom: 20px;
            position: relative;
            /* Ensure it stays in the normal flow */
            z-index: 2;
            /* Bring it above the .background divs */
        }

        .hero-buttons .hero-button {
            border: 3px solid #1D940F;
            padding: 20px 10px;
            display: flex;
            gap: 10px;
            font-weight: bold;
        }

        .hero-buttons .hero-button .hero-content {
            display: flex;
            justify-content: center;
            flex-direction: column;
            place-items: center;
            align-items: center;
            gap: 1rem;
        }

        .hero-buttons .hero-button .hero-content img {
            width: 50px;
            height: 50px;
        }
    </style>

    <section class="py-5 text-center text-white maindiv">
        <!-- Background divs -->
        <div class="background"></div>
        <div class="background"></div>
        <div class="background"></div>
        <div class="background"></div>
        <div class="background"></div>

        <!-- Content -->
        <div class="container">
            <div class="w-100">
                <h1 class="text-green-600 display-4 header">TUZA ASSETS Ltd</h1>
                <p class="lead">{{ __('message.landing.title') }}</p>
            </div>
            <div class="mt-3 hero-buttons">
                <div class="hero-button row">
                    <a class="dropdown-item" href="{{ route('diaspora') }}"
                        style="cursor: pointer; color:white; font-weight: bold; background-color: transparent;"
                        onmouseover="this.style.backgroundColor='transparent';" onmouseout="this.style.backgroundColor='';">
                        <div class="col-lg-12 hero-content">
                            <img src="{{ asset('assets/images/diaspora.webp') }}" style="width: 10rem; height: 8rem;"
                                alt="For Rwandan Diaspora">
                            {!! __('home.for_Diaspora') !!}
                        </div>
                    </a>
                </div>
                <div class="hero-button row">
                    <a class="dropdown-item" href="{{ route('all_property') }}"
                        style="cursor: pointer;font-weight: bold;color:white; background-color: transparent;"
                        onmouseover="this.style.backgroundColor='transparent';" onmouseout="this.style.backgroundColor='';">
                        <div class="col-lg-12 hero-content">
                            <img src="{{ asset('assets/images/tenant.png') }}" style="width: 10rem; height: 8rem;"
                                alt="For Tenants">
                            <h5>{!! __('home.For_Tenants') !!}</h5>
                        </div>
                    </a>
                </div>
                <div class="hero-button row">
                    <a class="dropdown-item" href="{{ route('diplomats') }}"
                        style="cursor: pointer;font-weight: bold;color:white; background-color: transparent;"
                        onmouseover="this.style.backgroundColor='transparent';" onmouseout="this.style.backgroundColor='';">
                        <div class="col-lg-12 hero-content">
                            <img src="{{ asset('assets/images/diplomatic.png') }}" style="width: 10rem; height: 8rem;"
                                alt="For Diplomats">
                            <h5>{!! __('home.For_Diplomats') !!}</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 text-center text-white content-section" style="background:#1D940F; ">
        <div class="container">
            <h5 class="p-3">{{ __('message.get_services_title') }}</h5>
            </p>
            <div class="pt-10 carousel">
                <a href="https://bid.tuza-assets.com/" target="_blank" class="btn"
                    style="background-color: #ED5303; border: none; color: white;">{{ __('message.get_started_button') }}</a>
            </div>
        </div>
    </section>

    <section class="py-5 text-center what-we-do">
        <div class="container">
            <h5 class="mb-3 text-center text-success font-weight-bold">{{ __('message.WHAT-WE-DO') }}</h5>
            <p>{{ __('message.buyploydescription') }}</p>


            @include('layouts.slider.service-section')

        </div>
    </section>
    <section>
        @include('layouts.propertyonsell.partner_prpperties')
    </section>
    <section class="py-5 introduction">
        <div class="container">
            <div class="gap-4 row align-items-center">
                    <div class="d-flex justify-content-center col-md-12">
                        <div class="col-md-6">
                            <h5 class="mb-5 font-weight-bold text-success">{{ __('home.TUZA_ASSETS_INTRODUCTION') }}</h5>
                        </div>
                        <div class="text-center col-md-6">
                            <button
                                class="border btn btn-sm text-success btn-light font-weight-bold">{{ __('home.OUR_STATS') }}</button>
                        </div>
                    </div>

                <div class="col-md-6">
                    <div class="pt-5 video-wrapper">
                        <video width="100%" height="100%" controls>
                            <source src="{{ asset(__('message.home_video')) }}" type="video/mp4">
                            <source src="{{ asset(__('message.home_video')) }}" type="video/ogg">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center">
                        <button
                            class="border btn btn-lg text-success btn-light font-weight-bold d-none">{{ __('home.OUR_STATS') }}</button>
                    </div>
                    <div id="column-chart" class="pt-5"></div>
                </div>
                <div class="col-md-3"></div>
                <div class="pt-5 text-center col-md-12" style="margin-top: 35px;">
                    <h5> {{ __('home.BUY_PLOT_DIRECTLY') }}</h5>
                    <p>{{ __('message.buyploydescription') }}</p>

                    <a href="https://bid.tuza-assets.com/" target="_blank" class="border btn btn-success get-started-link">
                        {{ __('message.get_start') }}</a>


                </div>
            </div>
        </div>
    </section>

    @if ($plots)
        <section class="recent-rental">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <a href="https://bid.tuza-assets.com" target="_blank">
                        <h5 class="text-left text-success font-weight-bold">{{ __('message.plot-on-bid') }}</h5>
                    </a>
                </div>
            </div>
            <div class="px-5">
                <!-- Swiper for Large Screens -->
                <swiper-container class="green-swiper large-swiper mySwiper" navigation="true">
                    @foreach (array_chunk($plots, 4) as $chunk)
                        <swiper-slide>
                            <div class="px-5 row">
                                @foreach ($chunk as $plot)
                                    <div class="col-3">
                                        <div class="mb-4 card">
                                            <a href="https://bid.tuza-assets.com/plot/{{ $plot['id'] }}" target="__blank">
                                            <img src="{{ $plot['featured_photo'] }}" class="card-img-top" alt="Plot"
                                                style="height: 200px; object-fit: cover; width: 100%;">
                                                </a>
                                            <div class="pt-2 card-body">
                                           <div class="flex items-center space-x-2">
                                                <img src="{{ asset('assets/images/locationicon.png') }}" alt="Location" class="w-5 h-5">
                                                <span class="text-sm">
                                                    @php
                                                        $locationParts = [];
                                                        if (isset($plot['province'])) {
                                                            $locationParts[] = $plot['province'];
                                                        }
                                                        if (isset($plot['district'])) {
                                                            $locationParts[] = $plot['district'];
                                                        }
                                                        if (isset($plot['sector'])) {
                                                            $locationParts[] = $plot['sector'];
                                                        }
                                                        $location = implode(', ', $locationParts);
                                                    @endphp
                                                    {{ $location }}
                                                </span>
                                            </div>

                                                <span class="p-0 m-0 fs-5"><strong>UPI:</strong> {{ $plot['upi'] }}</span>
                                                <span class="p-0 m-0"><strong>Starting price:</strong>
                                                    {{ Number::currency($plot['max_price'] ?? 0, in: 'RWF') }}</span>
                                                <p class="p-0 m-0"><strong>Plot size:</strong>
                                                    {{ number_format($plot['size']) }} m<sup>2</sup></p>
                                                <p class="py-0 m-0 text-success"><strong>{{ $plot['bidders'] ?? 0 }}
                                                        BIDDERS</strong></p>
                                                @if (isset($plot['is_bidding']['end_date']))
                                                    <div class="py-3" x-data="timer('{{ $plot['is_bidding']['end_date'] }}')" x-init="init()">
                                                        <div class="px-3 d-flex justify-content-between">
                                                            <div class="">
                                                                <div class="p-3 badge bg-warning text-dark">
                                                                    <span x-text="time().totalHours"
                                                                        class="text-white">00</span>
                                                                </div>
                                                                <div class="time-text">Hours</div>
                                                            </div>
                                                            <div class="">
                                                                <div class="p-3 badge bg-warning text-dark">
                                                                    <span x-text="time().minutes"
                                                                        class="text-white">59</span>
                                                                </div>
                                                                <div class="time-text">Minutes</div>
                                                            </div>
                                                            <div class="">
                                                                <div class="p-3 badge bg-warning text-dark">
                                                                    <span x-text="time().seconds"
                                                                        class="text-white">28</span>
                                                                </div>
                                                                <div class="time-text">Seconds</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                <a href="https://bid.tuza-assets.com/plot/{{ $plot['id'] }}"
                                                    target="__blank" class="mt-3 btn btn-success w-100">
                                                    <div class="d-flex justify-content-between align-items-end">
                                                        <div>Bid Now</div>
                                                        <div>
                                                            <img src="{{ asset('assets/images/buttonicon.png') }}"
                                                                alt="Bid Now">
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </swiper-slide>
                    @endforeach
                </swiper-container>
            </div>
            <!-- Swiper for Small Screens -->
            <swiper-container class="green-swiper small-swiper mySwiper">
                @foreach ($plots as $plot)
                    <swiper-slide>
                        <div class="property-card">
                            <div class="mb-4 card">
                                <a href="https://bid.tuza-assets.com/plot/{{ $plot['id'] }}" target="__blank"
                                       >
                                <img src="{{ $plot['featured_photo'] }}" class="card-img-top" alt="Plot"
                                    style="height: 280px; object-fit: cover; width: 100%;">
                                    </a>
                                <div class="pt-2 card-body">
                                    <img src="{{ asset('assets/images/locationicon.png') }}" alt="Location">
                                    <h6 class="">
                                        @php
                                            $locationParts = [];
                                            if (isset($plot['province'])) {
                                                $locationParts[] = $plot['province'];
                                            }
                                            if (isset($plot['district'])) {
                                                $locationParts[] = $plot['district'];
                                            }
                                            if (isset($plot['sector'])) {
                                                $locationParts[] = $plot['sector'];
                                            }
                                            $location = implode(', ', $locationParts);
                                        @endphp
                                        {{ $location }}
                                    </h6>
                                    <p class="p-0 m-0"><strong>UPI:</strong> {{ $plot['upi'] }}</p>
                                    <p class="p-0 m-0"><strong>Starting price:</strong>
                                        {{ Number::currency($plot['max_price'] ?? 0, in: 'RWF') }}</p>
                                    <p class="p-0 m-0"><strong>Plot size:</strong>
                                        {{ number_format($plot['size']) }} m<sup>2</sup></p>
                                    <p class="py-0 m-0 text-success"><strong>{{ $plot['bidders'] ?? 0 }}
                                            BIDDERS</strong>
                                    </p>
                                    @if (isset($plot['is_bidding']['end_date']))
                                        <div class="py-3" x-data="timer('{{ $plot['is_bidding']['end_date'] }}')" x-init="init()">
                                            <div class="px-3 d-flex justify-content-between">
                                                <div class="">
                                                    <div class="px-4 py-1 badge bg-warning text-dark">
                                                        <span x-text="time().totalHours" class="text-white">00</span>
                                                    </div>
                                                    <div class="time-text">Hours</div>
                                                </div>
                                                <div class="">
                                                    <div class="px-4 py-1 badge bg-warning text-dark">
                                                        <span x-text="time().minutes" class="text-white">59</span>
                                                    </div>
                                                    <div class="time-text">Minutes</div>
                                                </div>
                                                <div class="">
                                                    <div class="px-4 py-1 badge bg-warning text-dark">
                                                        <span x-text="time().seconds" class="text-white">28</span>
                                                    </div>
                                                    <div class="time-text">Seconds</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <a href="https://bid.tuza-assets.com/plot/{{ $plot['id'] }}" target="__blank"
                                        class="mt-3 btn btn-success w-100">
                                        <div class="d-flex justify-content-between align-items-end">
                                            <div>Bid Now</div>
                                            <div>
                                                <img src="{{ asset('assets/images/buttonicon.png') }}" alt="Bid Now">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </swiper-slide>
                @endforeach
            </swiper-container>

        </section>
    @endif

    @if ($properties)
        <section class="recent-rental">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <a href="https://www.tuza-assets.com/en/Api/Property/all">
                        <h5 class="text-left text-success font-weight-bold">
                            {{ __('home.PROPERTY_AVAILABLE_FOR_RENT') }}
                        </h5>
                    </a>
                </div>
            </div>
            <div class="px-5">
                <!-- Convert $properties to a collection -->
                @php
                    $propertiesCollection = collect($properties);
                @endphp

                <!-- Swiper for Large Screens (3 per slide) -->
                {{-- <swiper-container class="green-swiper large-swiper mySwiper" navigation="true" pagination="true"> --}}
                    <swiper-container class="green-swiper large-swiper mySwiper" navigation="true" >
                    @foreach ($propertiesCollection->chunk(4) as $chunk)
                        <swiper-slide>
                            <div class="px-5 row">
                                @foreach ($chunk as $property)
                                    <div class="col-md-3">
                                        <div class="card rental-card">
                                            <a href="{{ route('api-property-v2.show', $property['id']) }}"
                                                class="view-more-link text-success text-decoration-none">
                                                <img src="{{ $property['thumbnail']['image'] }}" class="card-img-top"
                                                    alt="Rental Image"
                                                    style="min-height:200px;max-height:200px;width:100%;">
                                                <div class="card-body">
                                                    <p class="card-location">
                                                        <img src="{{ asset('assets/images/5.svg') }}"
                                                            alt="Location Icon">
                                                        {{ $property['province'] }},<br>
                                                         {{ $property['district'] }}, {{ $property['sector'] }}, {{ $property['cell'] }}, {{ $property['village'] }}
                                                    </p>
                                                    <p class="p-0 m-0"><strong>Property:</strong>
                                                        {{$property['property_identity'] ?? '' }}
                                                    </p>
                                                    <p class="card-text">
                                                        {{ Str::limit($property['description'], 70) }}</p>
                                                    <span class="text-success">View more →</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </swiper-slide>
                    @endforeach
                </swiper-container>
            </div>
            <!-- Swiper for Small Screens (1 per slide) -->
            <swiper-container class="green-swiper small-swiper mySwiper">
                @foreach ($propertiesCollection as $property)
                    <swiper-slide>
                        <div class="card rental-card">
                            <a href="{{ route('api-property-v2.show', $property['id']) }}"
                                class="view-more-link text-success text-decoration-none">
                                <img src="{{ $property['thumbnail']['image'] }}" class="card-img-top" alt="Rental Image"
                                    style="min-height:200px;max-height:200px;width:100%;">
                                <div class="card-body">
                                    <p class="card-location">
                                        <img src="{{ asset('assets/images/5.svg') }}" alt="Location Icon">
                                        {{ $property['province'] }},<br>
                                        {{ $property['district'] }}, {{ $property['sector'] }}, {{ $property['cell'] }}, {{ $property['village'] }}
                                    </p>
                                    <p class="p-0 m-0"><strong>Property:</strong>
                                        {{$property['property_identity'] ?? '' }}
                                    </p>
                                    <p class="card-text">{{ Str::limit($property['description'], 70) }}
                                    </p>
                                    <span class="text-success">View more →</span>
                                </div>
                            </a>
                        </div>
                    </swiper-slide>
                @endforeach
            </swiper-container>


        </section>
    @endif

    @if ($plots_on_sell)
        <section class="property-for-sale">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <a href="https://bid.tuza-assets.com/" target="_blank">
                        <h5 class="text-left text-success font-weight-bold">
                            {{ __('home.PROPERTY_AVAILABLE_FOR_SELL') }}
                        </h5>
                    </a>
                </div>
            </div>
            <div class="px-5">
                <!-- Swiper for Large Screens -->
                <swiper-container class="green-swiper large-swiper mySwiper" navigation="true">
                    @foreach (array_chunk($plots_on_sell, 4) as $chunk)
                        <swiper-slide>
                            <div class="px-5 row">
                                @foreach ($chunk as $property)
                                    <div class="col-md-3">
                                        <div class="card rental-card">
                                            <div class="mb-4">
                                                <a href="https://bid.tuza-assets.com/plot/{{ $property['id'] }}" target="__blank">
                                                <img src="{{ $property['featured_photo'] }}" class="card-img-top"
                                                    alt="Property"
                                                    style="min-height: 200px; max-height: 200px; width: 100%;">
                                                </a>
                                                <div class="px-3 pt-2">
                                                    <div class="d-flex">
                                                        <img src="{{ asset('assets/images/5.svg') }}"
                                                            alt="Location Icon">
                                                        <h6 class="text-bold">
                                                            @php
                                                                $locationParts = [];
                                                                if (isset($property['province'])) {
                                                                    $locationParts[] = $property['province'];
                                                                }
                                                                if (isset($property['district'])) {
                                                                    $locationParts[] = $property['district'];
                                                                }
                                                                if (isset($property['sector'])) {
                                                                    $locationParts[] = $property['sector'];
                                                                }
                                                                $location = implode(', ', $locationParts);
                                                            @endphp
                                                            {{ $location }}
                                                        </h6>
                                                    </div>

                                                    <p class="p-0 m-0"><strong>Price:</strong>
                                                        {{ Number::currency($property['max_price'] ?? 0, in: 'RWF') }}
                                                    </p>
                                                    <p class="p-0 m-0"><strong>Size:</strong>
                                                        {{ number_format($property['size']) }} m<sup>2</sup>
                                                    </p>
                                                    <p class="p-0 m-0"><strong>Description:</strong>
                                                        {!! Str::limit(strip_tags($property['descriptions']), 60) !!}
                                                    </p>
                                                    <a href="https://bid.tuza-assets.com/plot/{{ $property['id'] }}"
                                                        target="_blank" class="mt-3 btn btn-success w-100">
                                                        <div class="d-flex justify-content-between align-items-end">
                                                            <div>{{ __('home.View_more') }}</div>
                                                            <div>
                                                                <img src="{{ asset('assets/images/buttonicon.png') }}"
                                                                    alt="View More Icon">
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </swiper-slide>
                    @endforeach
                </swiper-container>
            </div>
            <!-- Swiper for Small Screens -->
            <swiper-container class="green-swiper small-swiper mySwiper">
                @foreach ($plots_on_sell as $property)
                    <swiper-slide>
                        <div class="card rental-card">
                            <div class="mb-4 card">
                                <img src="{{ $property['featured_photo'] }}" class="card-img-top" alt="Property"
                                    style="min-height: 200px; max-height: 200px; width: 100%;">
                                <div class="px-3 pt-2">
                                    <div class="d-flex">
                                        <a href="https://bid.tuza-assets.com/plot/{{ $property['id'] }}" target="_blank">
                                            <img src="{{ asset('assets/images/5.svg') }}" alt="Location Icon">
                                        </a>
                                        <h6 class="text-bold">
                                            @php
                                                $locationParts = [];
                                                if (isset($property['province'])) {
                                                    $locationParts[] = $property['province'];
                                                }
                                                if (isset($property['district'])) {
                                                    $locationParts[] = $property['district'];
                                                }
                                                if (isset($property['sector'])) {
                                                    $locationParts[] = $property['sector'];
                                                }
                                                $location = implode(', ', $locationParts);
                                            @endphp
                                            {{ $location }}
                                        </h6>
                                    </div>
                                    <p class="p-0 m-0"><strong>Price:</strong>
                                        {{ Number::currency($property['max_price'] ?? 0, in: 'RWF') }}
                                    </p>
                                    <p class="p-0 m-0"><strong>Size:</strong>
                                        {{ number_format($property['size']) }} m<sup>2</sup>
                                    </p>
                                    <p class="p-0 m-0"><strong>Description:</strong>
                                        {!! Str::limit(strip_tags($property['descriptions']), 60) !!}
                                    </p>
                                </div>
                                <a href="https://bid.tuza-assets.com/plot/{{ $property['id'] }}" target="_blank"
                                    class="mt-3 btn btn-success w-100">
                                    <div class="d-flex justify-content-between align-items-end">
                                        <div>{{ __('home.View_more') }}</div>
                                        <div>
                                            <img src="{{ asset('assets/images/buttonicon.png') }}" alt="View More Icon">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </swiper-slide>
                @endforeach
            </swiper-container>
        </section>
    @endif
    @php
        $properties = \App\Models\PropertyOnSell::all();

    @endphp

    @if ($properties instanceof \Illuminate\Support\Collection && $properties->count() > 0)
        <section>
            <div class="py-0 my-0 row">
                <div class="py-0 my-0 col-1"></div>
                <div class="py-0 my-0 col-10">
                    <a href="https://www.tuza-assets.com/en/property-on-sell">
                        <h5 class="text-left text-success font-weight-bold">HOUSE FOR SALE</h5>
                    </a>
                    <p class="mb-5 text-center d-none">
                        "Explore a selection of properties available through Tuza Assets, showcasing diverse options
                        tailored to
                        your needs."
                    </p>
                </div>
            </div>
            <div class="px-5">
                <!-- Swiper for Large Screens -->
                <swiper-container class="green-swiper large-swiper mySwiper" navigation="true">
                    @foreach ($properties->chunk(4) as $chunk)
                        <swiper-slide class="text-success">
                            <div class="px-5 row">
                                @foreach ($chunk as $property)
                                    @php
                                        // Determine the first image
                                        $images = is_string($property->images)
                                            ? json_decode($property->images, true)
                                            : $property->images;
                                        $firstImage = 'assets/images/default-image.jpg'; // Default fallback image
                                        if (is_array($images) && !empty($images)) {
                                            $firstImage = isset($images[0]['path'])
                                                ? $images[0]['path']
                                                : (is_string($images[0])
                                                    ? $images[0]
                                                    : 'assets/images/default-image.jpg');
                                        }
                                    @endphp
                                    <div class="col-3">
                                        <div class="property-card">
                                            <div class="overflow-hidden text-white card h-100">
                                                <a href="{{ route('new-propertyonselldetail', $property->id) }}"
                                                    class="text-decoration-none">
                                                    <div class="card-img-top zoom-image"
                                                        style="background: url('{{ asset('public/' . $firstImage) }}') center/cover no-repeat; height: 200px;">
                                                    </div>
                                                </a>
                                                <div class="card-body" style="font-size:14px;">
                                                    <div class="pb-3" style="color: black ">
                                                        <div>
                                                            <i class="fas fa-home"></i><span style="font-size:12px;"
                                                                class="px-3">{{ $property->name }}</span>
                                                        </div>
                                                        <div>
                                                            <i class="fas fa-tag"></i>
                                                            <span style="font-size:12px;" class="px-3">{{ $property->property_code ?? '' }}</span>
                                                        </div>

                                                        <div class="">
                                                            <p class="text-lg font-semibold text-gray-800">
                                                                Price:{{ $property->currency }}
                                                                &nbsp;{{ number_format($property->price, 2) }}</p>

                                                            <p class="text-lg font-semibold text-gray-800">Location:</p>
                                                            <ul class="text-black">
                                                                @if ($property->district)
                                                                    <li><span class="font-semibold">District:</span>
                                                                        {{ $property->district }}</li>
                                                                @endif
                                                                @if ($property->sector)
                                                                    <li><span class="font-semibold">Sector:</span>
                                                                        {{ $property->sector }}</li>
                                                                @endif
                                                            </ul>
                                                        </div>

                                                    </div>
                                                    <a href="{{ route('new-propertyonselldetail', $property->id) }}"
                                                        class="p-0 btn btn-link text-success">Details →</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </swiper-slide>
                    @endforeach
                </swiper-container>
            </div>
            <!-- Swiper for Small Screens -->
            <swiper-container class="green-swiper small-swiper mySwiper">
                @foreach ($properties as $property)
                    <swiper-slide>
                        <div class="property-card">
                            <a href="{{ route('new-propertyonselldetail', $property->id) }}"
                                class="text-decoration-none">
                                <div class="overflow-hidden text-white card h-100">
                                    <div class="card-img-top zoom-image"
                                        style="background: url('{{ asset('public/' . $firstImage) }}') center/cover no-repeat; height: 280px;">
                                    </div>
                                    <div class="card-body">
                                        <div class="pb-3 text-success">
                                            <div>
                                                <i class="fas fa-home"></i><span style="font-size:12px;"
                                                    class="px-3">{{ $property->name }}</span>
                                            </div>
                                            <div>
                                                <i class="fas fa-tag"></i>
                                                <span style="font-size:12px;" class="px-3">{{ $property->property_code ?? '' }}</span>
                                            </div>
                                            <div>
                                                <i class="fas fa-map-marker-alt"></i><span style="font-size:12px;"
                                                    class="px-3">{{ $property->district }}</span>
                                            </div>
                                        </div>
                                        <h5 class="card-title text-dark">{{ $property->name }}</h5>
                                        <p class="card-text text-muted" style="font-size:15px;">
                                            {!! Str::limit($property->description, 100) !!}
                                        </p>
                                        <a href="{{ route('new-propertyonselldetail', $property->id) }}"
                                            class="p-0 btn btn-link text-success">Details →</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </swiper-slide>
                @endforeach
            </swiper-container>
        </section>
    @else
        <p>No properties available at this time.</p>
    @endif



    @if ($blogs->count() > 0)
        <section>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <h5 class="font-weight-bold text-success">OUR BLOG</h5>
                    <p class="py-2">
                        "Tuza Assets is a trusted provider of professional property management services, born out of the
                        ideas
                        and experiences of the Rwandan Diaspora in the European Union and the United States."
                    </p>
                </div>
            </div>
            <div class="px-5">
                <!-- Swiper for Large Screens -->
                <swiper-container class="green-swiper large-swiper mySwiper" navigation="true">
                    @if ($blogs && count($blogs) > 0)
                        @foreach ($blogs->chunk(2) as $blogChunk)
                            <swiper-slide>
                                <div class="px-5 row">
                                    @foreach ($blogChunk as $blog)
                                        <div class="mb-2 col-6">
                                            <div class="flex-row bg-white shadow-sm d-flex w-100 text-decoration-none"
                                                style="border: 1px solid #e3e3e3; padding: 10px;">
                                                <a href="{{ route('blogdetail', $blog->slug) }}">
                                                    <div class="flex-shrink-0 px-0" style="width: 230px;">
                                                        <img src="{{ isset($blog->images) ? asset('public/storage/' . $blog->images) : asset('assets/images/Logo-nobg.png') }}"
                                                            alt="{{ $blog->title }}" class="img-fluid"
                                                            style="width: 100%; height: 200px; object-fit: cover;">
                                                    </div>
                                                </a>
                                                <div class="px-3 text-left card-body">
                                                    <div class="pb-3 text-success">
                                                        <div class="py-0 my-0">
                                                            <i class="fas fa-user"></i>
                                                            <span style="font-size:12px;">{{ $blog->Authname }}</span>
                                                        </div>
                                                        <div class="py-0 my-0">
                                                            <i class="fas fa-calendar"></i>
                                                            <span
                                                                style="font-size:12px;">{{ $blog->created_at ? \Carbon\Carbon::parse($blog->created_at)->format('m-d-Y') : 'N/A' }}</span>
                                                        </div>
                                                    </div>
                                                    <p class="card-text text-dark">{{ Str::limit($blog->title, 30) }}</p>
                                                    <div class="py-1 my-1 text-black" style="font-size:13px;">
                                                        {!! Str::limit($blog->summary, 90) !!}
                                                    </div>
                                                    <a href="{{ route('blogdetail', $blog->slug) }}"
                                                        class="p-0 btn btn-link text-success">Details →</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </swiper-slide>
                        @endforeach
                    @else
                        <p>No blogs available at this time.</p>
                    @endif
                </swiper-container>
            </div>

            <!-- Swiper for Small Screens -->
            <swiper-container class="green-swiper small-swiper mySwiper">
                @foreach ($blogs as $blog)
                    <swiper-slide>
                        <div class="property-card">
                            <a href="{{ route('blogdetail', $blog->slug) }}" class="text-decoration-none">
                                <div class="overflow-hidden text-white card h-100">
                                    <div class="card-img-top zoom-image"
                                        style="background: url('{{ asset('public/storage/' . $blog->images ?? 'assets/images/Logo-nobg.png') }}') center/cover no-repeat; height: 200px;">
                                    </div>
                                    <div class="card-body">
                                        <div class="pb-3 text-success">
                                            <div>
                                                <i class="fas fa-user"></i><span style="font-size:12px;"
                                                    class="px-3">{{ $blog->Authname }}</span>
                                            </div>
                                            <div>
                                                <i class="fas fa-calendar"></i><span style="font-size:12px;"
                                                    class="px-3">{{ $blog->created_at ? \Carbon\Carbon::parse($blog->created_at)->format('m-d-Y') : 'N/A' }}</span>
                                            </div>
                                        </div>
                                        <h5 class="card-title text-dark">{{ $blog->title }}</h5>
                                        <p class="card-text text-muted" style="font-size:15px;">
                                            {!! Str::limit($blog->summary, 100) !!}
                                        </p>
                                        <a href="{{ route('blogdetail', $blog->slug) }}"
                                            class="p-0 btn btn-link text-success">Details →</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </swiper-slide>
                @endforeach
            </swiper-container>
        </section>
    @endif
    <section class="pb-5">
        @if ($latestMagazine)
            <div class="px-5 d-flex justify-content-end">



                <div class="px-5 d-flex flex-column align-items-end" style="right: 0">
                    <p class="mb-2"><strong>{{ __('home.RWANDA_REAL_ESTATE_MAGAZINE') }}</strong></p>
                    <button type="button" data-toggle="modal" data-target="#exampleModal"
                        class="btn btn-outline-success" style="height: 35px; width: 205px;">
                        {{ __('home.FreeDownload') }}
                    </button>
                    <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ __('home.FreeDownload') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('download.link', $latestMagazine) }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="recipient-name"
                                                class="col-form-label">{{ __('home.full_name') }}</label>
                                            <input type="text" class="form-control" name="name"
                                                id="recipient-name">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name"
                                                class="col-form-label">{{ __('home.Email') }}</label>
                                            <input type="text" class="form-control" name="email"
                                                id="recipient-name">
                                        </div>
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" name="subscribed"
                                                id="subscribed" value="1">
                                            <label class="form-check-label"
                                                for="subscribed">{{ __('home.Subscribe') }}</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit"
                                            class="btn btn-primary bg-success">{{ __('home.FreeDownload') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
        @endif
    </section>
  <hr>
<section class="py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="text-center col-md-8">
        <h2 class="mb-4">SUBSCRIBE</h2>
        <form action="{{ route('subscribe') }}" method="POST" class="row g-3">
          @csrf
          <div class="col-md-5">
            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
          </div>
          <div class="col-md-5">
            <input type="email" name="email" class="form-control" placeholder="Your Email" required>
          </div>
          <div class="col-md-2">
            <button type="submit" class="btn btn-success w-100">Subscribe</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>



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
    <style>
        hr {
            border: 1px solid #fe6900;
            width: 80%;
        }

        .time-text {
            color: #fe6900;
        }

        .card-title {
            color: white;
            font-size: 1rem;
            font-weight: bold;
        }

        .card-text {
            font-size: 0.875rem;
        }

        .bg-warning {
            background-color: #fe6900 !important;
        }

        .btn-link {
            font-size: 0.875rem;
        }

        .card-body.bg-primary {
            background-color: green;
        }

        .card-body.bg-primary .card-title,
        .card-body.bg-primary .card-text,
        .card-body.bg-primary .btn-link {
            color: #fff;
        }

        .card-img-overlay {
            height: 100%;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
        }

        .card-img-overlay .bg-primary {
            background-color: green;
        }

        .zoom-image {
            transition: transform 0.5s ease;
            height: 100%;
        }

        .zoom-image:hover {
            transform: scale(1.1);
        }


        /* General blog card styles */
        .blog-card {
            margin: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
            width: 100%;
        }

        /* Swiper button colors */
        .swiper-button-next,
        .swiper-button-prev {
            color: orange !important;
        }

        /* Hide large swiper by default, show small swiper */
        .large-swiper {
            display: none;
        }

        .small-swiper {
            display: block;
        }

        /* Media query for large screens */
        @media (min-width: 1024px) {

            /* Show large swiper, hide small swiper */
            .large-swiper {
                display: block;
            }

            .small-swiper {
                display: none;
            }

            /* Ensure swiper slides display in a flex row */
            .large-swiper .swiper-slide {
                display: flex;
                flex-direction: row;
                justify-content: space-between;
            }

            /* Adjust blog card width for large screens */
            .large-swiper .blog-card {
                width: 90%;
                /* Three cards per row */
            }
        }
    </style>




    <script>
        function timer(endDate) {
            return {
                endDate: new Date(endDate),
                remaining: null,
                init() {
                    this.setRemaining();
                    setInterval(() => {
                        this.setRemaining();
                    }, 1000);
                },
                setRemaining() {
                    const diff = this.endDate - new Date();
                    this.remaining = parseInt(diff / 1000);
                    if (this.remaining <= 0 || this.remaining < -1) {
                        location.reload();
                    }
                },
                totalHours() {
                    return {
                        value: Math.floor(this.remaining / (60 * 60)),
                        remaining: this.remaining % (60 * 60)
                    };
                },
                minutes() {
                    return {
                        value: Math.floor(this.totalHours().remaining / 60),
                        remaining: this.totalHours().remaining % 60
                    };
                },
                seconds() {
                    return {
                        value: this.totalHours().remaining
                    };
                },
                format(value) {
                    return ("0" + parseInt(value)).slice(-2);
                },
                time() {
                    return {
                        totalHours: this.format(this.totalHours().value),
                        minutes: this.format(this.minutes().value),
                        seconds: this.format(this.seconds().value),
                    };
                },
            }
        }
    </script>


    <script>
        const largeSwiper = new Swiper('.large-swiper', {
            slidesPerView: 3, // Three slides for large screens
            spaceBetween: 30,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        const smallSwiper = new Swiper('.small-swiper', {
            slidesPerView: 1, // One slide for small screens
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById('modal');
            var icon = document.getElementById('icon');
            var close = document.getElementById('close');

            // When the icon is clicked, open the modal
            icon.onclick = function() {
                modal.style.display = 'block';
            }

            // When the close button is clicked, close the modal
            close.onclick = function() {
                modal.style.display = 'none';
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            }
        });

        document.addEventListener("DOMContentLoaded", function() {
            const images = ["1.jpg", "2.jpg", "3.jpg", "4.jpg", "5.jpg"]; // List of image filenames
            let currentIndex = 0; // Initialize currentIndex

            function changeBackground() {
                // Update the background image
                document.querySelector(".hero").style.backgroundImage =
                    `url('{{ asset('assets/images/') }}/${images[currentIndex]}')`;
                currentIndex = (currentIndex + 1) % images.length; // Move to the next image
            }
            setInterval(changeBackground, 8000);
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const months = {!! json_encode($data['categories']) !!};
            const rentalProperties = {!! json_encode($data['rental_properties']) !!};
            const lettingProperties = {!! json_encode($data['letting_properties']) !!};
            const completedProjects = {!! json_encode($data['completed_projects']) !!};
            const plotsOnBid = {!! json_encode($data['plots_on_bid']) !!};
            const currentMonth = {!! json_encode($data['currentMonth']) !!};

            console.log('Months:', months); // Debugging line
            console.log('Rental Properties:', rentalProperties); // Debugging line
            console.log('Letting Properties:', lettingProperties); // Debugging line
            console.log('Completed Projects:', completedProjects); // Debugging line
            console.log('Plots on Bid:', plotsOnBid); // Debugging line

            const options = {
                colors: ["#045501", "#ED5303", "#34D399", "#F87171"],
                series: [{
                        name: "Rental Properties",
                        data: rentalProperties
                    },
                    {
                        name: "Letting Properties",
                        data: lettingProperties
                    },
                    {
                        name: "Completed Projects",
                        data: completedProjects
                    },
                    {
                        name: "Plots on Bid",
                        data: plotsOnBid
                    },
                ],
                chart: {
                    type: "bar",
                    height: 320,
                    fontFamily: "Inter, sans-serif",
                    toolbar: {
                        show: false
                    },
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: "70%",
                        borderRadiusApplication: "end",
                        borderRadius: 8,
                    },
                },
                tooltip: {
                    shared: true,
                    intersect: false,
                    style: {
                        fontFamily: "Inter, sans-serif"
                    },
                },
                states: {
                    hover: {
                        filter: {
                            type: "darken",
                            value: 1,
                        },
                    },
                },
                stroke: {
                    show: true,
                    width: 0,
                    colors: ["transparent"],
                },
                grid: {
                    show: false,
                    strokeDashArray: 4,
                    padding: {
                        left: 2,
                        right: 2,
                        top: -14
                    },
                },
                dataLabels: {
                    enabled: false
                },
                legend: {
                    show: true,
                    position: "top",
                },
                xaxis: {
                    categories: months,
                    labels: {
                        show: true,
                        style: {

                            fontFamily: "Inter, sans-serif",
                            cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                        },
                        formatter: function(value) {
                            return value === currentMonth ? 'Current Month' : value;
                        },
                    },
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                },
                yaxis: {
                    show: true,
                    labels: {
                        style: {
                            fontFamily: "Inter, sans-serif",
                            cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                        }
                    }
                },
                fill: {
                    opacity: 1
                },
            };

            if (document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("column-chart"), options);
                chart.render();
            } else {
                console.error("ApexCharts library not found or element 'column-chart' not found.");
            }
        });
    </script>
    <script>
        const prev = document.getElementById("prev-btn");
        const next = document.getElementById("next-btn");
        const list = document.getElementById("item-list");

        const itemWidth = 150;
        const padding = 10;

        prev.addEventListener("click", () => {
            list.scrollLeft -= itemWidth + padding;
        });

        next.addEventListener("click", () => {
            list.scrollLeft += itemWidth + padding;
        });
    </script>
@endsection
