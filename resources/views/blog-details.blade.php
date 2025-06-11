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

<!-- Blog Container -->
<section>
    <div class="container blogs details py-5">
        <div class="row">
            <!-- Left Column -->
            <div class="col-12 col-md-6">
                <div class="card mb-4">
                    <div class="card-header text-center">
                        <h5 class="text-uppercase">House Design for Zone(s): {{ $design->zone }}</h5>
                    </div>
                    <img src="{{ asset('public/' . $design->main_image) }}" alt="Design Image" class="main-image img-fluid" id="main-image">
                    @if (!empty($design->images))
                    <div class="row mt-2 p-4">
                        @foreach ($design->images as $index => $image)
                        <div class="col-3 p-1">
                            <img src="{{ asset('public/' . $image) }}" alt="Additional Image" class="additional-image img-fluid" data-index="{{ $index }}">
                        </div>
                        @endforeach
                    </div>
                    @endif
                    <div class="social-share text-center my-3">
                        <a href="#" target="_blank" class="fab fa-facebook-f" id="facebook-share"></a>
                        <a href="#" target="_blank" class="fab fa-twitter" id="twitter-share"></a>
                        <a href="#" target="_blank" class="fab fa-instagram" id="instagram-share"></a>
                        <a href="#" target="_blank" class="fab fa-linkedin-in" id="linkedin-share"></a>
                    </div>
                </div>
            </div>
            <!-- Right Column -->
            <div class="col-12 col-md-6">
                <!-- Design Overview Card -->
                <div class="card mb-4">
                    <div class="card-header text-center">
                        <h5 class="text-uppercase">Design Overview</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li><strong>Construction zone(s):</strong> {{ $design->zone }}</li>
                            <li><strong>Suitable Plot size:</strong> {{ $design->size }}</li>
                            <li><strong>Number of Rooms:</strong> {{ $design->number_of_rooms }}</li>
                            <li><strong>House dimensions:</strong> {{ $design->dimensions }}</li>
                        </ul>
                    </div>
                </div>
                <!-- Package Includes Card -->
                <div class="card mb-4">
                    <div class="card-header text-center">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#packageIncludes" aria-expanded="false" aria-controls="packageIncludes">
                            Package Includes <i class="fa fa-angle-down"></i>
                        </button>
                    </div>
                    <div class="collapse" id="packageIncludes">
                        <div class="card-body">
                            {!! $design->package_includes !!}
                        </div>
                    </div>
                </div>
                <!-- Additional Information Card -->
                <div class="card mb-4">
                    <div class="card-body">
                        <p>{{ $design->additional_information }}</p>
                    </div>
                </div>
                <!-- Price Card -->
                <div class="card mb-4">
                    <div class="card-header text-center">
                        <span>Price: </span><span class="price">{{ $design->price }} {{ $design->currency }}</span>
                    </div>
                    <div class="card-footer text-center">
                        <button class="btn btn-success w-100" data-toggle="modal" data-target="#checkoutModal">Download The Design</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="checkoutModalLabel">Checkout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <section class="checkout">
                        <h2>Checkout</h2>
                        <form>
                            <!-- Express Checkout -->
                            <div class="form-group">
                                <button class="btn btn-warning btn-block" type="button">PayPal Checkout</button>
                                <p class="text-center">Or continue below</p>
                            </div>
                            <!-- Contact Information -->
                            <div class="form-group">
                                <label for="email">Contact Information</label>
                                <input type="email" class="form-control" id="email" placeholder="Email address">
                            </div>
                            <!-- Billing Address -->
                            <div class="form-group">
                                <label>Billing Address</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="First name">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Last name">
                                    </div>
                                </div>
                                <input type="text" class="form-control mt-2" placeholder="Address">
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Apartment, suite, etc. (optional)">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Country/region">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="City">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Postal code">
                                    </div>
                                </div>
                                <input type="text" class="form-control mt-2" placeholder="Phone (optional)">
                            </div>
                            <!-- Payment Options -->
                            <div class="form-group">
                                <label>Payment Options</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentOption" id="paypal" checked>
                                    <label class="form-check-label" for="paypal">
                                        Pay via PayPal
                                    </label>
                                </div>
                                <small class="form-text text-muted">Clicking "Proceed to PayPal" will redirect you to PayPal to complete your purchase.</small>
                            </div>
                            <!-- Add a Note to Your Order -->
                            <div class="form-group">
                                <label>Add a note to your order</label>
                                <textarea class="form-control" rows="3" placeholder="Notes about your order"></textarea>
                            </div>
                            <!-- Agreement -->
                            <div class="form-group">
                                <small class="form-text text-muted">
                                    By proceeding with your purchase you agree to our Terms and Conditions and Privacy Policy.
                                </small>
                            </div>
                        </form>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Proceed to PayPal</button>
                </div>
            </div>
        </div>
    </div>

</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const mainImage = document.getElementById('main-image');
        const thumbnails = document.querySelectorAll('.additional-image');

        thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener('click', function (event) {
                event.preventDefault();
                mainImage.src = this.src;
            });
        });

        const designId = "{{ $design->id }}"; // Fetching design ID from Blade template
        const currentUrl = window.location.href;

        const facebookShare = document.getElementById('facebook-share');
        const twitterShare = document.getElementById('twitter-share');
        const linkedinShare = document.getElementById('linkedin-share');

        // Facebook Share
        facebookShare.href = `https://www.facebook.com/sharer/sharer.php?u=${currentUrl}&quote=Check out this design with ID: ${designId}`;
        
        // Twitter Share
        twitterShare.href = `https://twitter.com/intent/tweet?url=${currentUrl}&text=Check out this design with ID: ${designId}`;
        
        // LinkedIn Share
        linkedinShare.href = `https://www.linkedin.com/sharing/share-offsite/?url=${currentUrl}`;

        // Placeholder for Instagram (Instagram doesn't support direct URL sharing in the same way as other platforms)
        const instagramShare = document.getElementById('instagram-share');
        instagramShare.href = "#"; // Instagram sharing usually involves sharing an image through their app
    });
</script>
@endsection

<style>
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
    border: 2px solid green;
    border-radius: 10px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
}

.card:hover {
    transform: scale(1.05);
    box-shadow: 0 0 25px rgba(0, 0, 0, 0.2);
    text-decoration: none !important;
}

.card img {
    border-radius: 0px;
    object-fit: cover;
    width: 100%; /* Ensure the image takes the full width of the card */
    height: auto; /* Maintain aspect ratio */
}

.card .main-image {
    height: 300px; /* Set a fixed height for the main image */
}

.card .additional-image {
    height: 100px; /* Set a fixed height for additional images */
    object-fit: cover; /* Ensure the images fit the container without distortion */
}

.card-header {
    background-color: white;
    font-weight: bold;
    color: #333;
}

.card-header button {
    color: green;
    border: none;
    text-decoration: none;
}

.card-header button:hover {
    text-decoration: none;
    color: #FE6900;
}

.card-header button:focus {
    outline: none;
    box-shadow: none;
}

.card-body {
    padding: 1rem;
    background-color: #f8f9fa;
}

.card-title {
    font-size: 1.25rem;
    font-weight: bold;
}

.card-text {
    font-size: 1rem;
    color: #666;
}

.price {
    color: #FE6900;
    font-size: 1.5rem;
    font-weight: bold;
}

@media (max-width: 768px) {
    .card .additional-image {
        height: 50px; /* Make additional images smaller on small screens */
    }
}

.btn-success {
    background-color: green;
    border-color: green;
    padding: 10px 20px;
    font-size: 1rem;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.btn-success:hover {
    background-color: #218838;
}

.btn-link {
    color: green; /* Make the button color green */
    text-decoration: none;
    padding: 0;
}

.btn-link:hover {
    text-decoration: underline;
}

.btn-link:focus, .btn-link:active {
    border: none;
    box-shadow: none; /* Remove the focus border */
}

.fa {
    margin-left: 5px;
}

.social-share a {
    margin-right: 10px;
    color: green;
    font-size: 1.5rem;
    transition: color 0.3s ease;
}

.social-share a:hover {
    color: #0056b3;
}
</style>
