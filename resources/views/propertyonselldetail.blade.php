@extends('layouts.web')

@section('content')
<style>
    .feature-list i {
        color: green;
        margin-right: 10px;
    }

    .hero {
        min-height: 70vh;
    }

    .hero h1 {
        font-size: 3em;
    }

    @media (max-width: 424px) {
        .hero {
            min-height: 70vh;
        }

        .hero h1 {
            font-size: 1.7em;
        }
    }

    .property-details {
        margin-top: 50px;
    }
    .carousel-item img {
        width: 100%;
        height: 400px; /* Adjust the height as needed */
        object-fit: cover; /* Ensure the image covers the element */
        border-radius: 5px; /* To give it a slight rounded effect */
    }
    .property-info {
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    .property-info h2 {
        font-size: 24px;
        margin-bottom: 20px;
    }
    .property-info p {
        margin-bottom: 10px;
    }
    .property-info .label {
        font-weight: bold;
    }
    .action-buttons {
        margin-top: 20px;
    }
    .action-buttons .btn {
        margin-right: 10px;
    }
    .related-properties .card img {
        height: 200px;
        object-fit: cover;
    }


        .thumbnail-container {
        position: relative;
        width: 100%;
        padding-bottom: 100%; /* 1:1 Aspect Ratio */
    }
    .thumbnail-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        cursor: pointer;
    }
</style>

<section class="hero text-white text-center py-5">
    <div class="container">
        <h1 class="display-4 header">TUZA ASSETS Ltd</h1>
        <p1>{{ __('message.Propertysell') }}</p1>
    </div>
</section>

<section class="property-details container">
    <div class="row">
<div class="col-md-8">
    @if ($property->images)
        @php
            $images = is_string($property->images) ? json_decode($property->images, true) : $property->images;
        @endphp
        <div class="card">
            <div id="propertyCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @foreach ($images as $index => $image)
                        <li data-target="#propertyCarousel" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach ($images as $index => $image)
                        @php
                            $imagePath = is_array($image) && isset($image['path']) ? $image['path'] : $image;
                        @endphp
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <img src="{{ asset('public/storage/' . $imagePath) }}" class="d-block w-100" alt="Property Image">
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#propertyCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#propertyCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="card-footer">
                <div class="row">
                    @foreach ($images as $index => $image)
                        @php
                            $imagePath = is_array($image) && isset($image['path']) ? $image['path'] : $image;
                        @endphp
                        <div class="col-3 p-1">
                            <div class="thumbnail-container">
                                <img src="{{ asset('public/storage/' . $imagePath) }}" class="img-thumbnail thumbnail-image" alt="Property Thumbnail" data-target="#propertyCarousel" data-slide-to="{{ $index }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @else
        <img src="{{ asset('public/storage/default.jpg') }}" alt="Default Image">
    @endif
</div>
        <div class="col-md-4 property-info">
            <h2>{{ $property->name }}</h2>
            <!-- Price -->
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Price:</h3>
                <p class="text-gray-600">{{ Number::currency($property?->price ?? 0, in:'RWF') }}</p>
            </div>

            <p><span class="label">Description:</span> {{ $property->description }}</p>
            <p><span class="label">Type:</span> {{ $property->type }}</p>
            <p><span class="label">Location:</span> {{ $property->country }}, {{ $property->province }}, {{ $property->district }}, {{ $property->sector }}, {{ $property->cell }}, {{ $property->village }}</p>
            <p><span class="label">House:</span> {{ $property->house }}</p>
            <p><span class="label">Size:</span> {{ $property->size }}</p>
            <p><span class="label">Floor:</span> {{ $property->floor }}</p>
            <p><span class="label">Rooms:</span> {{ $property->room }}</p>
            <p><span class="label">Dimension:</span> {{ $property->dimension }}</p>
            <p><span class="label">Status:</span> {{ $property->status }}</p>
            <p><span class="label">Map Link:</span> <a href="{{ $property->map_link }}" style="color: #1D940F;" target="_blank">{{ $property->map_link }}</a></p>

            <div class="action-buttons">
                <button class="btn text-white" style="background-color: #1D940F;" data-toggle="modal" data-target="#buyNowModal">
                    <i class="fas fa-shopping-cart"></i> Buy Now
                </button>
                <a href="https://api.whatsapp.com/send?phone=+31 6 86495035&text=I'm%20interested%20in%20the%20property%20{{ urlencode(route('property.show', $property->id)) }}" class="btn btn-success" target="_blank">
                    <i class="fab fa-whatsapp"></i>
                </a>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('property.show', $property->id)) }}" class="btn btn-success" target="_blank">
                    <i class="fab fa-linkedin"></i>
                </a>
                <button class="btn btn-secondary" id="copyLinkButton">
                    <i class="fas fa-link"></i>
                </button>
            </div>

        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="buyNowModal" tabindex="-1" role="dialog" aria-labelledby="buyNowModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="buyNowModalLabel">Select Payment Method</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="paymentMethod">Payment Method</label>
                        <select class="form-control" id="paymentMethod" required>
                            <option value="">Select a payment method</option>
                            <option value="credit_card">Credit Card</option>
                            <option value="paypal">PayPal</option>
                            <option value="bank_transfer">Bank Transfer</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Proceed</button>
                </form>
            </div>
        </div>
    </div>
</div>

<section class="related-properties container mt-5">
    <h2>Related Properties</h2>
    <div class="row">
        @foreach ($relatedProperties as $related)
            <div class="col-md-3">
                <div class="card mb-4">
                    @if ($related->images)
                        @php
                            $relatedImages = is_string($related->images) ? json_decode($related->images, true) : $related->images;
                            $relatedImagePath = is_array($relatedImages) && isset($relatedImages[0]['path']) ? $relatedImages[0]['path'] : $relatedImages[0];
                        @endphp
                        <img src="{{ asset('public/storage/' . $relatedImagePath) }}" class="card-img-top" alt="Related Property Image">
                    @else
                        <img src="{{ asset('public/storage/default.jpg') }}" class="card-img-top" alt="Default Image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $related->name }}</h5>
                        <p class="card-text"> {{ Number::currency($related?->price ?? 0, in:'RWF') }}</p>
                        <a href="{{ route('propertyonsell.show', $related->id) }}" class="btn text-success">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var thumbnails = document.querySelectorAll('.thumbnail-image');

        thumbnails.forEach(function(thumbnail) {
            thumbnail.addEventListener('click', function() {
                var newIndex = this.getAttribute('data-slide-to');
                $('#propertyCarousel').carousel(parseInt(newIndex));
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var copyLinkButton = document.getElementById('copyLinkButton');
        copyLinkButton.addEventListener('click', function() {
            var link = "{{ route('property.show', $property->id) }}";
            navigator.clipboard.writeText(link).then(function() {
                alert('Link copied to clipboard');
            }, function(err) {
                console.error('Could not copy text: ', err);
            });
        });
    });
</script>
@endsection
