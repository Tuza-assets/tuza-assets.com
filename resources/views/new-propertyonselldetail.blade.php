@extends('layouts.web')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

<style>
    i {
        color: darkorange;

    }

    .container .fas {
        color: darkorange !important;
        margin-right: 7px !important;

    }

    .container .fa {
        color: darkorange !important;
        margin-right: 7px !important;

    }

    span {
        margin-left: 7px !important;
    }

    .status {
        background: darkorange;
        border-radius: 5px;

    }

    .img-responsive {
        height: 500px;
        width: 100%;
        max-width: 100%;
    }

    .modal-dialog {
        max-width: 100%;
        margin: 0;
    }
</style>
@section('content')
    <section class="py-5 text-center text-white bg-success">
        <div class="container mb-2">
        </div>
    </section>

    <div class="container px-3 px-md-2">
        <div class="pt-5 mt-3 row">
            <div class="mb-4 col-md-8 position-relative">
                @php
                    $images = isset($property->images)
                        ? (is_string($property->images)
                            ? json_decode($property->images, true)
                            : $property->images)
                        : [];
                    $mainImage = 'default.jpg'; // Default value
                    if (is_array($images) && !empty($images)) {
                        $mainImage = isset($images[0]['path'])
                            ? $images[0]['path']
                            : (is_string($images[0])
                                ? $images[0]
                                : 'default.jpg');
                    }
                @endphp

                <div class="py-3 text-white card card-img-top fixed-height-image main-image"
                    style="background-image: url('{{ asset('public/' . $mainImage) }}');
                                background-size: cover; background-position: center;  height: 500px;">

                    <!-- Card Content -->
                    <div class="card-body" style=" height: 500px;">
                    </div>
                </div>

                <div class="d-flex position-absolute" style="top: 10px; left: 18px;">
                    <div class="px-1 py-2 status px-sm-1 px-md-2 px-lg-3">
                        <span class="font-weight-bold ">
                            {{ $property->status }}
                        </span>
                    </div>
                </div>
                <!-- Share and Favorite buttons -->
                <div class="bg-white d-flex position-absolute" style="top: 10px; right: 18px;">
                    <!-- Share button -->
                    <button class="btn share-button" data-toggle="modal" data-target="#shareModal"
                        data-count="{{ $property->share_count ?? 0 }}">
                        <i class="fas fa-share-alt"></i>
                    </button>
                    @php
                        use App\Models\Favority;
                        $favoriteCount = Favority::where('product_id', $property->id)->count();
                    @endphp

                    <!-- Favorite Button -->
                    <button class="ml-2 btn favorite-button" data-toggle="modal" data-target="#emailModal">
                        <i class="fas fa-heart"></i>
                        <span class="favorite-count">{{ $favoriteCount }}</span>
                    </button>

                    <!-- Email Modal -->
                    <div class="px-5 modal fade" id="emailModal" tabindex="-1" role="dialog"
                        aria-labelledby="emailModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="px-5 modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="emailModalLabel">Enter Your Email</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('properties.favority', $property->id) }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">Enter your email to favorite this property:</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                required>
                                            <input type="hidden" name="property_id" value="{{ $property->id }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-heart"></i>
                                            Favorite
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-md-4 d-none d-md-block">
                <div class="row">
                    @foreach (array_slice($images, 1, 4) as $image)
                        <div class="mb-4 col-6">
                            <div class="image-wrapper">
                                <div class="py-3 text-white card img-fluid thumbnail-image"
                                    style="background-image: url('{{ asset('public/' . (is_string($image) ? $image : $image['path'])) }}');
                                background-size: cover; background-position: center;  height: 500px;">

                                    <!-- Card Content -->
                                    <div class="py-5 card-body"
                                        style="background-image: url('{{ asset('assets/images/wotermarkimg.png') }}');
                                    background-repeat: no-repeat; background-position: center; background-size: contain; width:92px;">
                                    </div>

                                    <div class="py-5 card-footer"
                                        style="background-image: url('{{ asset('assets/images/wotermarkimg.png') }}');
                                    background-repeat: no-repeat; background-position: center; background-size: contain;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


        <!-- Share Modal -->
        <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="px-3 modal-content">
                    <div class="p-3 modal-header">
                        <h5 class="modal-title" id="shareModalLabel">Share this property</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{ $property->name }}</p>
                        <div class="p-3 bg-white share-options d-flex flex-column">
                            <a href="#" class="mb-2 share-link text-success"
                                onclick="copyLink('{{ request()->fullUrl() }}')">
                                <i class="fas fa-link"></i> Copy link
                            </a>
                            <a href="https://api.whatsapp.com/send?text={{ urlencode($property->name . ' - ' . request()->fullUrl()) }}"
                                target="_blank" class="mb-2 share-link text-success ">
                                <i class="fab fa-whatsapp"></i> WhatsApp
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                                target="_blank" class="mb-2 share-link text-success">
                                <i class="fab fa-facebook"></i> Facebook
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}&title={{ urlencode($property->name) }}"
                                target="_blank" class="mb-2 share-link text-success">
                                <i class="fab fa-linkedin"></i> LinkedIn
                            </a>
                            <a href="https://x.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($property->name) }}"
                                target="_blank" class="mb-2 share-link text-success">
                                <i class="fab fa-twitter"></i> X
                            </a>
                            <a href="https://www.instagram.com/tuza_assets_ltd/" target="_blank"
                                class="share-link text-success">
                                <i class="fab fa-instagram"></i> Instagram
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.img.img-model')

        <div class="flex-wrap py-1 mb-4 d-flex text-success align-items-center border-bottom border-top">
            <div class="px-1 status px-sm-1 px-md-2 px-lg-3">
                <span class="font-weight-bold ">
                    {{ $property->status }}
                </span>
            </div>
            <div class="px-1 px-sm-1 px-md-2 px-lg-3">{{ count($images) }} Photos </div>
            <img src="{{ asset('assets/images/gif2.gif') }}" class="mb-3 img-fluid mb-md-0"
                style="width: 30px; height: 30px; object-fit: cover;" />
            <div class="px-1 px-sm-1 px-md-2 px-lg-3">
                <a class="fw-bold text-success" href="{{ route('new-propertyonselldetailmedia', $property->id) }}">
                    View Media
                </a>
            </div>
        </div>



        <div class="px-0 row px-sm-1 px-md-2 px-lg-3">
            <div class="col-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
                <div class="mb-6 w-100">
                    <div class="property-additional-details">
                        @if (isset($property->upi) && $property->upi)
                            @php
                                $upiParts = explode('/', $property->upi);
                                $lastPart = array_pop($upiParts); // Get the last segment
                                $formattedUpi =
                                    implode('/', array_map(fn($part) => str_repeat('X', strlen($part)), $upiParts)) .
                                    '/' .
                                    $lastPart;
                            @endphp
                            <div class="py-1 mb-2 mr-4 border-bottom">
                                <i class="fas fa-fingerprint text-success"></i> UPI: {{ $formattedUpi }}
                            </div>
                        @endif

                        @if (isset($property->name) && $property->name)
                            <div class="mb-2 mr-4">
                                <i class="fas fa-building text-success"></i> Name: {{ $property->name }}
                            </div>
                        @endif

                        @if (isset($property->property_code) && $property->property_code)
                            <div>
                                <i class="fas fa-tag"></i>
                                Property Id: {{ $property->property_code }}
                            </div>
                        @endif

                        @if (isset($property->type) && $property->type)
                            <div class="mb-2 mr-4">
                                <i class="fas fa-building text-success"></i> Type: {{ $property->type }}
                            </div>
                        @endif

                        @if (isset($property->property_type) && $property->property_type)
                            <div class="mb-2 mr-4">
                                <i class="fas fa-home text-success"></i> Property Type: {{ $property->property_type }}
                            </div>
                        @endif
                        @if (isset($property->garage_type) && $property->garage_type)
                            <div class="mb-2 mr-4">
                                <i class="fas fa-warehouse text-success"></i> Property Facilities:
                                {{ $property->garage_type }}
                            </div>
                        @endif


                        @if (isset($property->house_type) && $property->house_type)
                            <div class="mb-2 mr-4">
                                <i class="fas fa-house-user text-success"></i> House Type: {{ $property->house_type }}
                            </div>
                        @endif

                        @if (isset($property->price) && $property->price)
                            <div class="flex-wrap py-1 d-flex align-items-center border-bottom">
                                <div class="mr-3 d-flex align-items-center">
                                    <i class="fas fa-money-bill" aria-hidden="true"></i>
                                    <p class="mb-0 ml-2 font-weight-bold">Price:
                                        {{ Number::currency($property->price, in: $property->currency ?? 'RWF') }}
                                    </p>
                                </div>
                                <div class="d-flex align-items-center px-sm-0">
                                    <a href="https://loancalculator.tuza-assets.com" target="_blank"
                                        class="d-flex align-items-center">
                                        <i class="fas fa-calculator text-success"></i>
                                        <span class="ml-2 text-success">Calculate monthly payment</span>
                                    </a>
                                </div>
                            </div>
                        @endif

                        @if (isset($property->description) && $property->description)
                            <p class="text-muted">
                                <i class="fas fa-info-circle text-success" aria-hidden="true"></i>
                                Description: <br>
                                <span id="description-text">
                                    @php
                                        // Remove HTML tags and limit to 100 words
                                        $plainText = strip_tags($property->description);
                                        $truncated = Str::words($plainText, 100, '...');
                                    @endphp

                                    @if (str_word_count($plainText) > 100)
                                        <span id="short-text">{{ $truncated }}</span>
                                        <span id="full-text" style="display: none;">{{ $plainText }}</span>
                                        <a href="#" onclick="toggleText(); return false;" id="view-more"
                                            style="color: #22c55e; transition: color 0.3s ease;"
                                            onmouseover="this.style.color='#f97316'"
                                            onmouseout="this.style.color='#22c55e'">View more</a>
                                    @else
                                        {{ $plainText }}
                                    @endif
                                </span>
                            </p>

                            <script>
                                function toggleText() {
                                    const shortText = document.getElementById('short-text');
                                    const fullText = document.getElementById('full-text');
                                    const viewMoreBtn = document.getElementById('view-more');

                                    if (shortText.style.display === 'none') {
                                        shortText.style.display = 'inline';
                                        fullText.style.display = 'none';
                                        viewMoreBtn.textContent = 'View more';
                                    } else {
                                        shortText.style.display = 'none';
                                        fullText.style.display = 'inline';
                                        viewMoreBtn.textContent = 'View less';
                                    }
                                }
                            </script>
                        @endif


                        <div class="mt-3 location-details">
                            <h6 class="font-weight-bold">Location Details</h6>
                            <div class="d-flex flex-column">
                                @if (isset($property->province) && $property->province)
                                    <div class="py-1 mb-2 mr-4 border-bottom">
                                        <div class="row">
                                            <div class="col-6">
                                                <i class="fas fa-map text-success"></i> Province:
                                            </div>
                                            <div class="col-6">
                                                {{ $property->province }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (isset($property->district) && $property->district)
                                    <div class="py-1 mb-2 mr-4 border-bottom">
                                        <div class="row">
                                            <div class="col-6">
                                                <i class="fas fa-map text-success"></i> District:
                                            </div>
                                            <div class="col-6">
                                                {{ $property->district }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (isset($property->sector) && $property->sector)
                                    <div class="py-1 mb-2 mr-4 border-bottom">
                                        <div class="row">
                                            <div class="col-6">
                                                <i class="fas fa-map text-success"></i> Sector:
                                            </div>
                                            <div class="col-6">
                                                {{ $property->sector }}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if (isset($property->cell) && $property->cell)
                                    <div class="py-1 mb-2 mr-4 border-bottom">
                                        <div class="row">
                                            <div class="col-6">
                                                <i class="fas fa-map-pin text-success"></i> Cell:
                                            </div>
                                            <div class="col-6">
                                                {{ $property->cell }}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if (isset($property->village) && $property->village)
                                    <div class="py-1 mb-2 mr-4 border-bottom">
                                        <div class="row">
                                            <div class="col-6">
                                                <i class="fas fa-map-signs text-success"></i> Village:
                                            </div>
                                            <div class="col-6">
                                                {{ $property->village }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="mt-3 amenities-details">
                            <h6 class="font-weight-bold">Additional Features</h6>
                            <div class="d-flex flex-column">
                                @if (isset($property->kitchen) && $property->kitchen)
                                    <div class="py-1 mb-2 mr-4 border-bottom">
                                        <div class="row">
                                            <div class="col-6">
                                                <i class="fas fa-utensils text-success"></i> Kitchen:
                                            </div>
                                            <div class="col-6">
                                                {{ $property->kitchen }}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if (isset($property->dining_room) && $property->dining_room)
                                    <div class="py-1 mb-2 mr-4 border-bottom">
                                        <div class="row">
                                            <div class="col-6">
                                                <i class="fas fa-coffee text-success"></i> Dining Room:
                                            </div>
                                            <div class="col-6">
                                                {{ $property->dining_room }}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if (isset($property->storage) && $property->storage)
                                    <div class="py-1 mb-2 mr-4 border-bottom">
                                        <div class="row">
                                            <div class="col-6">
                                                <i class="fas fa-box text-success"></i> Storage:
                                            </div>
                                            <div class="col-6">
                                                {{ $property->storage }}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if (isset($property->garage_type) && $property->garage_type)
                                    <div class="py-1 mb-2 mr-4 border-bottom d-none">
                                        <div class="row">
                                            <div class="col-6">
                                                <i class="fas fa-warehouse text-success"></i> Garage Type:
                                            </div>
                                            <div class="col-6">
                                                {{ $property->garage_type }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="mt-3 property-status">
                            <div class="d-flex flex-column">
                                @if (isset($property->status) && $property->status)
                                    <div class="py-1 mb-2 mr-4 border-bottom">
                                        <div class="row">
                                            <div class="col-6">
                                                <i class="fas fa-info-circle text-success"></i> Status:
                                            </div>
                                            <div class="col-6">
                                                {{ $property->status }}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if (isset($property->availability) && $property->availability)
                                    <div class="py-1 mb-2 mr-4 border-bottom">
                                        <div class="row">
                                            <div class="col-6">
                                                <i class="fas fa-clock text-success"></i> Availability:
                                            </div>
                                            <div class="col-6">
                                                {{ $property->availability }}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if (isset($property->price) && $property->price)
                                    <div class="py-1 mb-2 mr-4 border-bottom">
                                        <div class="row">
                                            <div class="col-6">
                                                <i class="fas fa-tag text-success"></i> Price:
                                            </div>
                                            <div class="col-6">
                                                {{ number_format($property->price) }} {{ $property->currency ?? 'RWF' }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        @if (isset($property->amenities) && is_array($property->amenities) && !empty($property->amenities))
                            <div class="py-1 mt-3 amenities-list border-bottom">
                                <h6 class="font-weight-bold">Amenities</h6>
                                <div class="flex-wrap d-flex">
                                    @foreach ($property->amenities as $amenity)
                                        <div class="mb-2 mr-4">
                                            <i class="fas fa-check-circle text-success"></i>
                                            {{ \Illuminate\Support\Str::of($amenity)->replace('_', ' ')->title() }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif


                    </div>

                    <div>
                        <h5 class="mb-2 h4 font-weight-semibold">Features</h5>
                    </div>
                    <div class="mb-4 d-flex flex-column justify-content-between">
                        @if (isset($property->price) && $property->price)
                            <p class="mb-2 text-muted"><i class="px-3 fas fa-dollar-sign text-success"></i> Asking price:
                                {{ number_format($property->price, 0, ',', '.') }} {{ $property->currency ?? 'RWF' }}</p>
                            <p class="mb-2 text-muted">
                                <i class="px-3 fas fa-tag text-success"></i>
                                Asking price per m²:
                                {{ number_format($property->price / (isset($property->size) ? $property->size : 1), 0, ',', '.') }}
                                {{ $property->currency ?? 'RWF' }}
                            </p>
                        @endif

                        @if (isset($property->service_charges) && $property->service_charges)
                            <p class="mb-2 text-muted"><i class="px-3 fas fa-receipt text-success"></i> Service charges:
                                {{ number_format($property->service_charges, 0, ',', '.') }}
                                {{ $property->currency ?? 'RWF' }} per
                                month</p>
                        @endif

                        @if (isset($property->created_at))
                            <p class="mb-2 text-muted"><i class="px-3 fas fa-calendar text-success"></i> Listed since:
                                {{ $property->created_at->format('d M Y') }}</p>
                        @endif
                    </div>


                    <div class="flex-wrap mb-4 d-flex">
                        @if (isset($property->zoning) && isset($property->zoning->name))
                            <div>
                                <h5 class="mb-2 h4 font-weight-semibold">Zoning: {{ $property->zoning->name }}</h5>
                            </div>
                            <div class="px-3"> <a class="text-success fw-bold" href="{{ route('Zoning2') }}">Read
                                    More<i class="fa fa-arrow-right ms-2"></i></a></div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
                @if (isset($property->user_id) && $property->user)
                <div>
                    <img src="{{ asset('assets/images/avatar-659652_1280.webp') }}" alt="User Avatar"
                         class="mb-2 bg-white img-fluid">

                    <h1 class="h5"><strong>By:</strong>{{ $property->user->name }}</h1>

                    @if (!empty($property->user->phone))
                        <a class="mb-2 btn btn-outline-success btn-block"
                           href="https://wa.me/{{ $property->user->phone }}?text=What%20about%20your%20service"
                           target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-whatsapp"></i> {{ $property->user->phone }}
                        </a>
                    @endif
                </div>
                @else
                    <div class="container">
                        <div class="px-3">
                            <img src="{{ asset('assets/images/Logo-nobg.png') }}" alt="Kolpa Roest Staalduinen Logo"
                                class="bg-white img-fluid">
                            <div class="flex-wrap py-3 d-flex">
                                <a class="mb-2 btn btn-outline-success btn-block"
                                    href="https://wa.me/+31 6 86495035?text=What%20about%20your%20service" target="_blank"
                                    rel="noopener noreferrer">
                                    <i class="fab fa-whatsapp"></i> WhatsApp
                                </a>
                                <a href="#" class="mb-2 btn btn-outline-success btn-block" data-toggle="modal"
                                    data-target="#contactModal">
                                    <i class="fas fa-envelope"></i> Contact us
                                </a>
                                <a href="#" class="btn btn-outline-success btn-block" data-toggle="modal"
                                    data-target="#visitModal">
                                    <i class="fas fa-calendar-alt"></i> Visit Property
                                </a>
                            </div>
                        </div>
                        <div class="p-3 text-success">
                            <a href="#" target="_blank" class="text-success">
                                <i class="fas fa-map text-success"></i>
                                <span class="pl-1"> Map </span>
                            </a>
                        </div>
                        <div class="pr-3 text-success">
                            {!! $property->map_link !!}
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>

    <hr>
    @include('layouts.propertyonsell.related_property_on_sel')
    <!-- Contact Modal -->
    <div class="px-5 modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactModalLabel">Contact Us</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="px-5 modal-body">
                    <!-- Contact Form -->
                    <form method="POST" action="{{ route('contact-us') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name" class="form-label">{{ __('message.contact_name_label') }}</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email" class="form-label">{{ __('message.contact_email_label') }}</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="tel" class="form-label">{{ __('message.contact_tel_label') }}</label>
                            <input type="tel" class="form-control" name="tel" id="tel" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">{{ __('message.contact_message_label') }}</label>
                            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                        </div>
                        <div>
                            <button type="submit" class="text-white btn btn-block"
                                style="background-color: #045501;">{{ __('message.contact_button') }}</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Visit Property Modal -->
    <div class="px-5 modal fade" id="visitModal" tabindex="-1" role="dialog" aria-labelledby="visitModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="visitModalLabel">Visit Property</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="px-5 modal-body">
                    <!-- Visit Form -->
                    <form action="{{ route('schedule.visit') }}" method="POST">
                        @csrf

                        <input type="hidden" name="property_code" value="{{ $property->property_code }}">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="visitorName">Name</label>
                                <input type="text" class="form-control" id="visitorName" name="visitorName"
                                    placeholder="Your Name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="visitorEmail">Email</label>
                                <input type="email" class="form-control" id="visitorEmail" name="visitorEmail"
                                    placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="visitorPhone">Phone Number</label>
                                <input type="tel" class="form-control" id="visitorPhone" name="visitorPhone"
                                    placeholder="Your Phone Number" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="visitDate">Preferred Visit Date</label>
                                <input type="datetime-local" class="form-control" id="visitDate" name="visitDate"
                                    required>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <button type="submit" class="mt-4 btn btn-success">Schedule Visit</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>





    <style>
        .fixed-height-image {
            height: 200px;
            /* Set the desired fixed height */
            object-fit: cover;
            /* Ensure the image covers the entire area */
            width: 100%;
            /* Ensure the image takes the full width of its container */
        }

        .image-wrapper {
            width: 100%;
            height: 235px;
            /* Set this to your desired fixed height */
            overflow: hidden;
        }

        .image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .modal-xl {
            max-width: 90%;
        }

        .modal-body {
            padding: 0;
        }

        .modal-image {
            height: 70vh;
            /* Adjust height as needed */
            object-fit: cover;
            /* Ensures the image covers the area while maintaining aspect ratio */
        }

        .carousel-inner {
            height: 70vh;
            /* Ensures all images have the same height */
        }

        .img-responsive {
            width: 100%;
            max-width: 100%;
            height: auto;
            /* Default to auto height for flexibility */
        }

        @media (min-width: 1200px) {

            /* Large screens */
            .img-responsive {
                height: 500px;
            }
        }

        @media (min-width: 768px) and (max-width: 1199px) {

            /* Medium screens */
            .img-responsive {
                height: 400px;
            }
        }

        @media (max-width: 767px) {

            /* Small screens */
            .img-responsive {
                height: 250px;
            }
        }
    </style>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include your script here -->
    <script>
        $(document).ready(function() {
            // Open modal when main image is clicked
            $('.main-image').on('click', function() {
                $('#imageModal').modal('show');
                $('#carouselIndicators').carousel(0);
            });

            // Open modal when thumbnail image is clicked
            $('.thumbnail-image').on('click', function() {
                var index = $(this).closest('.col-6').index();
                $('#imageModal').modal('show');
                $('#carouselIndicators').carousel(index + 1); // Adjusting for the main image
            });
        });
    </script>

    <script>
        function copyLink(link) {
            console.log('Copy link function called with link:', link);

            if (navigator.clipboard && window.isSecureContext) {
                // Navigator clipboard api method'
                navigator.clipboard.writeText(link).then(function() {
                    alert('Link copied to clipboard!');
                }, function(err) {
                    alert('Failed to copy the link: ', err);
                });
            } else {
                // Fallback method
                const tempInput = document.createElement('input');
                tempInput.value = link;
                document.body.appendChild(tempInput);
                tempInput.select();
                try {
                    document.execCommand('copy');
                    alert('Link copied to clipboard!');
                } catch (err) {
                    alert('Failed to copy the link: ', err);
                }
                document.body.removeChild(tempInput);
            }
        }
    </script>

    <script>
        document.querySelector('.favorite-button').addEventListener('click', function() {
            let productId = this.dataset.productId;

            fetch(`/favority/${productId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        productId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data.message);
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
@endsection
