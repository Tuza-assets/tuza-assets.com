    <style>
        .card-body-content {
            display: none;
            /* Hide all content sections by default */
        }

        .card-body-content.active {
            display: block;
            /* Show the active content section */
        }

        .nav-button {
            cursor: pointer;
            text-decoration: none;
            color: #ED5303;
            /* Default color */
        }

        .nav-button:hover {
            color: green;
            /* Hover color */
        }

        h5 {
            color: green;
        }

        .nav-button.active {
            color: green;
            /* Active color */
            text-decoration: none;
            /* No underline */
        }

        .carousel-inner img {
            width: 100%;
            height: 300px;
            /* Set a fixed height for images */
            object-fit: cover;
            /* Make images fit the container while preserving aspect ratio */
        }

        .carousel-control-prev,
        .carousel-control-next {
            filter: invert(100%);
            /* Change controls to be visible */
        }

        .zoomable {
            cursor: zoom-in;
        }

        .zoomed {
            cursor: zoom-out;
            transform: scale(1.5);
            /* Zoom effect */
            transition: transform 0.2s ease;
        }

        .card:hover {
            cursor: pointer;
            /* Change cursor to pointer on hover */
        }
    </style>

 <div class="container p-0 mt-5">
        <div class="card">
            <div class="card-header">
                <h5>{{ __('message.what_we_offer') }}</h5>
            </div>
            <div class="card-body">
                <div class="mt-2 mb-3">
                    <span class="nav-button active" onclick="showContent('design', this)">Design Constructions</span> |
                    <span class="nav-button" onclick="showContent('inspection', this)">Property Inspection</span> |
                    <span class="nav-button" onclick="showContent('marketing', this)">Marketing Advertising</span> |
                    <span class="nav-button" onclick="showContent('rent', this)">{{ __('message.rent_collection') }}</span>
                    |
                    <span class="nav-button"
                        onclick="showContent('tenant', this)">{{ __('message.tenant_relationship') }}</span> |
                    <span class="nav-button"
                        onclick="showContent('electronic', this)">{{ __('message.electronic_property_monitoring') }}</span>
                </div>

                <!-- Design Constructions Section -->
                <div id="design" class="card-body-content active">
                    <div class="row py-5">
                        <div class="col-md-6">
                            <div id="designCarousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('/assets/images/WhatsApp-Image-2023-07-16-at-6.28.10-AM-1024x558.jpeg') }}"
                                            class="d-block w-100 zoomable" alt="Design Image">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('/assets/images/23a.png') }}" class="d-block w-100 zoomable"
                                            alt="Design Image 2">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('/assets/images/27a.png') }}" class="d-block w-100 zoomable"
                                            alt="Design Image 3">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('/assets/images/56.png') }}" class="d-block w-100 zoomable"
                                            alt="Design Image 4">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('/assets/images/74.png') }}" class="d-block w-100 zoomable"
                                            alt="Design Image 5">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('/assets/images/78.png') }}" class="d-block w-100 zoomable"
                                            alt="Design Image 6">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('/assets/images/79.png') }}" class="d-block w-100 zoomable"
                                            alt="Design Image 7">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('/assets/images/80.png') }}" class="d-block w-100 zoomable"
                                            alt="Design Image 8">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('/assets/images/95.png') }}" class="d-block w-100 zoomable"
                                            alt="Design Image 9">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('/assets/images/96.png') }}" class="d-block w-100 zoomable"
                                            alt="Design Image 10">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('/assets/images/97.png') }}" class="d-block w-100 zoomable"
                                            alt="Design Image 11">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('/assets/images/106.png') }}" class="d-block w-100 zoomable"
                                            alt="Design Image 12">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('/assets/images/115.png') }}" class="d-block w-100 zoomable"
                                            alt="Design Image 13">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('/assets/images/118.png') }}" class="d-block w-100 zoomable"
                                            alt="Design Image 14">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#designCarousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#designCarousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>{{ __('message.design_constructions') }}</h5>
                            <p>{{ __('message.design_constructions_description') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Property Inspection Section -->
                <div id="inspection" class="card-body-content">
                    <div class="row py-5">
                        <div class="col-md-6">
                            <video width="100%" height="100%" controls>
                                <source src="{{ asset('/assets/video/INSPECTION.mp4') }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <div class="col-md-6">
                            <h5>{{ __('message.property_inspection_maintenance') }}</h5>
                            <p>{{ __('message.property_inspection_maintenance_description') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Marketing Advertising Section -->
                <div id="marketing" class="card-body-content">
                    <div class="row py-5">
                        <div class="col-md-6">
                            <video width="100%" height="100%" controls>
                                <source src="{{ asset('/assets/video/ADVERTISEMENT.mp4') }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <div class="col-md-6">
                            <h5>{{ __('message.marketing_advertising') }}</h5>
                            <p>{{ __('message.marketing_advertising_description') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Rent Collection Section -->
                <div id="rent" class="card-body-content">
                    <div class="row py-5">
                        <div class="col-md-6">
                            <video width="100%" height="100%" controls>
                                <source src="{{ asset('/assets/video/COLLECTION.mp4') }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <div class="col-md-6">
                            <h5>{{ __('message.rent_collection') }}</h5>
                            <p>{{ __('message.rent_collection_content') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Tenant Relationship Section -->
                <div id="tenant" class="card-body-content">
                    <div class="row py-5">
                        <div class="col-md-6">
                            <div id="electronicCarousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('/assets/images/Relationship.jpg') }}"
                                            class="d-block w-100 zoomable" alt="Electronic Property Monitoring Image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>{{ __('message.tenant_relationship') }}</h5>
                            <p>{{ __('message.tenant_relationship_content') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Electronic Property Monitoring Section -->
                <div id="electronic" class="card-body-content">
                    <div class="row py-5">
                        <div class="col-md-6">
                            <video width="100%" height="100%" controls>
                                <source src="{{ asset('/assets/video/MONITORING.mp4') }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <div class="col-md-6">
                            <h5>{{ __('message.electronic_property_monitoring') }}</h5>
                            <p>{{ __('message.electronic_property_monitoring_content') }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<script>
    function showContent(contentId, navButton) {
        // Hide all content sections
        document.querySelectorAll('.card-body-content').forEach(function(content) {
            content.classList.remove('active');
        });
        // Show the selected content section
        document.getElementById(contentId).classList.add('active');

        // Remove the active class from all nav buttons
        document.querySelectorAll('.nav-button').forEach(function(button) {
            button.classList.remove('active');
        });

        // Add the active class to the clicked nav button
        navButton.classList.add('active');
    }

    // Image Zoom Functionality
    document.querySelectorAll('.zoomable').forEach(function(img) {
        img.addEventListener('click', function() {
            if (img.classList.contains('zoomed')) {
                img.classList.remove('zoomed');
            } else {
                document.querySelectorAll('.zoomed').forEach(function(zoomedImg) {
                    zoomedImg.classList.remove('zoomed');
                });
                img.classList.add('zoomed');
            }
        });
    });
</script>
