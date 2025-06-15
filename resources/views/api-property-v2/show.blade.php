@extends('layouts.web')

<style>
    i {
        color: darkorange;

    }

    .container .fas {
        color: darkorange !important;
        margin-right: 7px !important;

    }

    span {
        margin-left: 7px !important;
    }
</style>
@section('content')

    @if ($property)
        <section class="py-5 text-center text-white bg-success">
            <div class="container mb-2">
            </div>
        </section>

        <div class="container py-5">

            <div class="mb-3 row">
                <div class="py-2 col-md-6">
                    <img id="mainImage" src="{{ $property['thumbnail']['image'] }}" alt="Property Image"
                        style="height: 380px;  width: 100%;" data-toggle="modal" data-target="#imageModal2">
                    <!-- Share button -->
                    <button class="bg-white btn share-button position-absolute" style="top: 10px; right: 18px;"
                        data-toggle="modal" data-target="#shareModal">
                        <i class="fas fa-share-alt"></i>
                    </button>
                </div>
                <div class="col-md-6 d-flex flex-column justify-content-between h-75 sm-d-none">
                    <div class="row">

                        @if (isset($property['property_images']))
                            @php
                                $images = array_slice($property['property_images'], 0, 4);
                            @endphp
                            @foreach ($images as $image)
                                <div class="mb-1 col-6">
                                    <img src="{{ $image['image'] }}" alt="Additional Property Image" class="img-fluid"
                                        style="height: 190px;  width: 100%;" data-toggle="modal" data-target="#imageModal2">
                                </div>
                            @endforeach
                        @endif
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
                            <p>{{ $property['name'] }}</p>
                            <p class="p-0 m-0"><strong>Property:</strong>
                                {{$property['property_identity'] ?? '' }}
                            </p>
                            <div class="p-3 bg-white share-options d-flex flex-column">
                                <a href="#" class="mb-2 share-link text-success"
                                    onclick="copyLink('{{ request()->fullUrl() }}')">
                                    <i class="fas fa-link"></i> Copy link
                                </a>
                                <a href="https://api.whatsapp.com/send?text={{ urlencode($property['name'] . ' - ' . request()->fullUrl()) }}"
                                    target="_blank" class="mb-2 share-link text-success ">
                                    <i class="fab fa-whatsapp"></i> WhatsApp
                                </a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                                    target="_blank" class="mb-2 share-link text-success">
                                    <i class="fab fa-facebook"></i> Facebook
                                </a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}&title={{ urlencode($property['name']) }}"
                                    target="_blank" class="mb-2 share-link text-success">
                                    <i class="fab fa-linkedin"></i> LinkedIn
                                </a>
                                <a href="https://x.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($property['name']) }}"
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


            @include('layouts.img.property-img')


            <div class="px-0 row px-sm-1 px-md-2 px-lg-3">
                <div class="col-12 col-sm-12 col-md-7 col-lg-8 col-xl-7">
                    <div class="mb-6 w-100">

                        <div class="py-2 mb-3 d-flex justify-content-between align-items-center border-bottom border-top">
                            <div class="flex-wrap d-flex text-success align-items-center">

                                <div>{{ count($property['property_images']) }} Photos </div>
                                <img src="{{ asset('assets/images/gif2.gif') }}" class="mb-3 img-fluid mb-md-0"
                                    style="width: 30px; height: 30px; object-fit: cover;" />
                                <div class="px-3 ">
                                    <a class="fw-bold text-success"
                                        href="{{ route('propertyonsrentmedia', ['id' => $property['id']]) }}">
                                        View Media
                                    </a>
                                </div>
                            </div>
                            @if ($property['map_link'])
                                <a href="{{ $property['map_link'] }}" class="text-success" target="_blank">View on Map</a>
                            @endif
                        </div>

                        <div class="mb-4">
                            <h5 class="text-uppercase">{{ $property['name'] }}</h5>
                            <div class="d-flex flex-column">
                                <p class="pr-3 text-muted border-bottom">
                                    <i class="fas fa-map-marker-alt text-success"></i> {{ $property['province'] }},
                                    {{ $property['district'] }}, {{ $property['sector'] }}, {{ $property['cell'] }}, {{ $property['village'] }}
                                </p>
                                <p class="pr-3 text-muted border-bottom">
                                    <i class="fas fa-home text-success"></i><span>Type:</span> {{ $property['type'] }}
                                </p>
                                <p class="pr-3 text-muted border-bottom">
                                    <i class="fas fa-cogs text-success"></i>
                                    <spna>Utilities: </spna> {{ $property['utilities'] }}
                                </p>
                            </div>

                            <p class="text-muted">
                                <i class="fas fa-info-circle text-success" aria-hidden="true"></i>
                                Description: <br>
                                <span id="description-text">
                                    @php
                                        $words = str_word_count($property['description'], 1);
                                        $truncated = implode(' ', array_slice($words, 0, 60));
                                    @endphp

                                    @if (count($words) > 100)
                                        <span id="short-text">{{ $truncated }}...</span>
                                        <span id="full-text" style="display: none;">{{ $property['description'] }}</span>
                                        <a href="#" onclick="toggleText(); return false;" id="view-more"
                                            style="color: #22c55e; transition: color 0.3s ease;"
                                            onmouseover="this.style.color='#f97316'"
                                            onmouseout="this.style.color='#22c55e'">View more</a>
                                    @else
                                        {{ $property['description'] }}
                                    @endif
                                </span>

                            </p>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#AmenitiesModalCenter">
                                Amenities
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="AmenitiesModalCenter" tabindex="-1" role="dialog"
                                aria-labelledby="AmenitiesModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-scrollable raunded">
                                    <div class="modal-content">
                                        <div class="px-4 modal-header">
                                            <h5 class="modal-title" id="AmenitiesModalLongTitle"><i
                                                    class="fas fa-list text-success"></i> <span>Amenities</span></h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="px-4 modal-body">

                                            @php
                                                // Fetch amenities from API
                                                $amenitiesResponse = Illuminate\Support\Facades\Http::get(
                                                    'https://property.tuza-assets.com/api/v1/amenities',
                                                );
                                                $amenities = $amenitiesResponse->successful()
                                                    ? $amenitiesResponse->json()
                                                    : [];

                                                $unitAmenities = !empty($property['available_units'][0]['amenities'])
                                                    ? $property['available_units'][0]['amenities']
                                                    : [];

                                            @endphp

                                            @if (!empty($amenities))
                                                <p class="text-muted">

                                                    @php
                                                        $availableAmenities = [];
                                                        $unavailableAmenities = [];

                                                        foreach ($amenities as $amenity) {
                                                            if (in_array($amenity['id'], $unitAmenities)) {
                                                                $availableAmenities[] = $amenity;
                                                            } else {
                                                                $unavailableAmenities[] = $amenity;
                                                            }
                                                        }
                                                    @endphp

                                                    @if (!empty($availableAmenities))
                                                        <h5><i class="fas fa-check-circle text-success"></i> What this
                                                            place offers</h5>
                                                        <hr>
                                                        <ul class="list-unstyled">
                                                            @foreach ($availableAmenities as $amenity)
                                                                <li>
                                                                    <i class="fas fa-check-circle text-success"></i>
                                                                    {{ $amenity['name'] }}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif

                                                    @if (!empty($unavailableAmenities))
                                                        <h5 class="text-muted"><i
                                                                class="fas fa-times-circle text-danger"></i> Not included
                                                        </h5>
                                                        <hr>
                                                        <ul class="list-unstyled">
                                                            @foreach ($unavailableAmenities as $amenity)
                                                                <li style="text-decoration: line-through; color: gray;">
                                                                    <i class="fas fa-times-circle text-danger"></i>
                                                                    {{ $amenity['name'] }}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif

                                                </p>
                                            @else
                                                <p>No amenities found.</p>
                                            @endif

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>



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
                        </div>


                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
                    <div class="">
                        <div class="px-3">
                            <img src="{{ asset('assets/images/Logo-nobg.png') }}" alt="Kolpa Roest Staalduinen Logo"
                                class="bg-white img-fluid">
                            <div class="flex-wrap py-3 d-flex">
                                <a class="mb-2 btn btn-outline-success btn-block"
                                    href="https://wa.me/+31686495035?text=What%20about%20your%20service" target="_blank"
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
                        <hr>
                        <div class="shadow-sm ">
                            <div class="card-body">
                                @php
                                    $maxUnit = collect($property['available_units'])->sortByDesc('rent')->first();
                                    $checkInDate = date('Y-m-d');
                                    $checkOutDate = date('Y-m-d', strtotime('+1 month'));
                                    $rentPerMonth = intval($maxUnit['rent']) ?? 0;
                                    $currency = $maxUnit['currency'] ?? 'Frw';
                                    $maxUnit['max_guests'] = 5;
                                @endphp

                                @if ($maxUnit)
                                    <div class="d-flex justify-content-between">
                                        <p><span id="rate">{{ $rentPerMonth }}</span> {{ $currency }} <span
                                                class="text-muted">/Month</span></p>
                                    </div>
                                @endif

                                <div class="p-2 mb-3 rounded" style="border: 1px solid green">
                                    <div class="flex-wrap d-flex justify-content-between">
                                        <div>
                                            <small class="text-muted">CHECK-IN</small>
                                            <input type="date" id="checkInDate" class="form-control"
                                                value="{{ $checkInDate }}" min="{{ date('Y-m-d') }}">
                                        </div>
                                        <div>
                                            <small class="text-muted">CHECKOUT</small>
                                            <input type="date" id="checkOutDate" class="form-control"
                                                value="{{ $checkOutDate }}"
                                                min="{{ date('Y-m-d', strtotime('+1 day')) }}">
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <small class="text-muted">GUESTS</small>
                                        <select class="form-control" id="guestSelect" onchange="handleGuestSelection()">
                                            @for ($i = 1; $i <= ($maxUnit['max_guests'] ?? 1); $i++)
                                                <option value="{{ $i }}">{{ $i }}
                                                    {{ $i == 1 ? 'guest' : 'guests' }}</option>
                                            @endfor
                                            <option value="custom">Custom</option>
                                        </select>
                                        <div id="customGuestInput" style="display:none; margin-top:10px;">
                                            <input type="number" id="customGuestCount" class="form-control"
                                                min="1" value="1" placeholder="Enter number of guests"
                                                onchange="updateCustomGuestCount()">
                                        </div>
                                    </div>
                                </div>


                                <script>
                                   document.addEventListener('DOMContentLoaded', function() {
                                    fetchFees();
                                    
                                    // Get elements
                                    const checkInDateInput = document.getElementById('checkInDate');
                                    const checkOutDateInput = document.getElementById('checkOutDate');
                                    const nightsCountElement = document.getElementById('month-count');
                                    const nightsTextElement = document.getElementById('month-text');
                                    const rateElement = document.getElementById('rate');
                                    const subtotalElement = document.getElementById('subtotal');
                                    const cleaningFeeElement = document.getElementById('cleaning-fee');
                                    const serviceFeeElement = document.getElementById('service-fee');
                                    const grandTotalElement = document.getElementById('grand-total');
                                    const guestSelectInput = document.getElementById('guestSelect');
                                    const customGuestInput = document.getElementById('customGuestCount');
                                    const reserveButton = document.getElementById('reserveButton');
                                
                                    let baseCleaningFee = 0;
                                    let baseServiceFee = 0;
                                    
                                    // Precise month calculation function
                                    function calculateMonthsDifference(startDate, endDate) {
                                        // Create copies to avoid modifying original dates
                                        const start = new Date(startDate);
                                        const end = new Date(endDate);
                                
                                        // Calculate months difference
                                        let months = (end.getFullYear() - start.getFullYear()) * 12;
                                        months += end.getMonth() - start.getMonth();
                                
                                        // Adjust for day of month if needed
                                        if (end.getDate() >= start.getDate()) {
                                            // Same day or later in month
                                            months = Math.max(1, months);
                                        } else {
                                            // Earlier day in month
                                            months = Math.max(1, months);
                                        }
                                
                                        return months;
                                    }
                                
                                    // Function to update all calculations
                                    function updateCalculations() {
                                        const checkInDate = checkInDateInput.value;
                                        const checkOutDate = checkOutDateInput.value;
                                
                                        // Calculate duration in months
                                        const monthCount = calculateMonthsDifference(checkInDate, checkOutDate);
                                
                                        // Update month count and text if elements exist
                                        if (nightsCountElement) {
                                            nightsCountElement.textContent = monthCount;
                                            nightsTextElement.textContent = monthCount === 1 ? 'Month' : 'Months';
                                        }
                                
                                        // Get the current rate
                                        const rate = parseFloat(rateElement.textContent.replace(/,/g, '')) || 0;
                                
                                        // Calculate subtotal based on months and rate
                                        const subtotal = rate * monthCount;
                                        subtotalElement.textContent = subtotal.toLocaleString();
                                
                                        // Get the current cleaning and service fees
                                        const cleaningFee = parseFloat(cleaningFeeElement.textContent.replace(/,/g, '')) || 0;
                                        const serviceFee = parseFloat(serviceFeeElement.textContent.replace(/,/g, '')) || 0;
                                
                                        // Calculate grand total (rent + fees)
                                        const grandTotal = cleaningFee + serviceFee;
                                        grandTotalElement.textContent = grandTotal.toLocaleString();
                                        
                                        // Update reserve URL
                                        updateReserveUrl();
                                    }
                                
                                    // Function to handle showing/hiding custom guest input
                                    function handleGuestSelection() {
                                        const customGuestContainer = document.getElementById('customGuestInput');
                                
                                        if (guestSelectInput.value === 'custom') {
                                            customGuestContainer.style.display = 'block';
                                        } else {
                                            customGuestContainer.style.display = 'none';
                                        }
                                
                                        updateFees();
                                    }
                                
                                    // Fetch fees from API
                                    async function fetchFees() {
                                        try {
                                            const response = await fetch("https://property.tuza-assets.com/api/v1/fee");
                                            const data = await response.json();
                                
                                            if (data) {
                                                baseCleaningFee = parseFloat(data.cleaning_fee);
                                                baseServiceFee = parseFloat(data.service_fee);
                                                updateFees();
                                            }
                                        } catch (error) {
                                            console.error("Error fetching fees:", error);
                                        }
                                    }
                                
                                    // Update fees based on guest count
                                    function updateFees() {
                                        let guests = guestSelectInput.value;
                                        if (guests === 'custom') {
                                            guests = customGuestInput.value;
                                        }
                                        guests = parseInt(guests) || 1;
                                
                                        const cleaningFee = baseCleaningFee * guests;
                                        const serviceFee = baseServiceFee * guests;
                                
                                        cleaningFeeElement.innerText = cleaningFee.toLocaleString();
                                        serviceFeeElement.innerText = serviceFee.toLocaleString();
                                
                                        // Recalculate totals with new fees
                                        updateCalculations();
                                    }
                                
                                    // Function to update custom guest count
                                    function updateCustomGuestCount() {
                                        updateFees();
                                    }
                                
                                    // Function to update the reserve button's href
                                    function updateReserveUrl() {
                                        const baseUrl = reserveButton.href.split('?')[0];
                                        const checkIn = checkInDateInput.value;
                                        const checkOut = checkOutDateInput.value;
                                
                                        // Determine the guest count based on selection
                                        let guests;
                                        if (guestSelectInput.value === 'custom') {
                                            guests = customGuestInput.value; 
                                        } else {
                                            guests = guestSelectInput.value; 
                                        }
                                
                                        // Get the current cleaning fee, service fee, and subtotal values
                                        const cleaningFee = cleaningFeeElement.innerText.replace(/,/g, '');
                                        const serviceFee = serviceFeeElement.innerText.replace(/,/g, '');
                                        const subtotal = subtotalElement.innerText.replace(/,/g, '');
                                        const grandTotal = grandTotalElement.innerText.replace(/,/g, '');
                                
                                        // Add updated parameters including fees
                                        let url = `${baseUrl}?check_in=${checkIn}&check_out=${checkOut}&guests=${guests}&cleaning_fee=${cleaningFee}&service_fee=${serviceFee}&subtotal=${subtotal}&total=${grandTotal}`;
                                
                                        // Update the button's href
                                        reserveButton.href = url;
                                    }
                                
                                    // Update checkout min date when check-in date changes
                                    checkInDateInput.addEventListener('change', function() {
                                        // Set minimum checkout date to day after check-in
                                        const nextDay = new Date(this.value);
                                        nextDay.setDate(nextDay.getDate() + 1);
                                        const nextDayFormatted = nextDay.toISOString().split('T')[0];
                                        checkOutDateInput.min = nextDayFormatted;
                                
                                        // If checkout date is now invalid, update it
                                        if (checkOutDateInput.value < nextDayFormatted) {
                                            checkOutDateInput.value = nextDayFormatted;
                                        }
                                
                                        updateCalculations();
                                    });
                                
                                    // Update calculations when checkout date changes
                                    checkOutDateInput.addEventListener('change', updateCalculations);
                                    
                                    // Update fees when guest selection changes
                                    guestSelectInput.addEventListener('change', handleGuestSelection);
                                    
                                    // Update fees when custom guest count changes
                                    if (customGuestInput) {
                                        customGuestInput.addEventListener('input', updateCustomGuestCount);
                                    }
                                
                                    // Modal functionality for reserve button
                                    if (typeof $ !== 'undefined' && $('#ReseveModal').length) {
                                        $('#ReseveModal').on('show.bs.modal', function(event) {
                                            const checkInDate = checkInDateInput.value;
                                            const checkOutDate = checkOutDateInput.value;
                                            const guestCount = guestSelectInput.value === 'custom' ? 
                                                customGuestInput.value : guestSelectInput.value;
                                
                                            const formattedCheckIn = new Date(checkInDate).toLocaleDateString();
                                            const formattedCheckOut = new Date(checkOutDate).toLocaleDateString();
                                
                                            document.getElementById('modal-date-range').textContent = formattedCheckIn + " To " + formattedCheckOut;
                                            document.getElementById('modal-guest-count').textContent = guestCount + (guestCount == 1 ? ' guest' : ' guests');
                                
                                            const rate = rateElement.textContent;
                                            const subtotal = subtotalElement.textContent;
                                            const cleaningFee = cleaningFeeElement.textContent;
                                            const serviceFee = serviceFeeElement.textContent;
                                            const grandTotal = grandTotalElement.textContent;
                                
                                            const monthCount = calculateMonthsDifference(checkInDate, checkOutDate);
                                            document.getElementById('modal-month-count').textContent = monthCount;
                                            document.getElementById('modal-month-text').textContent = monthCount === 1 ? 'Month' : 'Months';
                                
                                            document.getElementById('modal-rate-display').textContent = rate;
                                            document.getElementById('modal-subtotal').textContent = subtotal;
                                            document.getElementById('modal-cleaning-fee').textContent = cleaningFee;
                                            document.getElementById('modal-service-fee').textContent = serviceFee;
                                            document.getElementById('modal-grand-total').textContent = grandTotal;
                                
                                            // Populate hidden inputs
                                            document.getElementById('modal-dates').value = formattedCheckIn + " To " + formattedCheckOut;
                                            document.getElementById('modal-guest-count-input').value = guestCount;
                                            document.getElementById('modal-total').value = grandTotal;
                                            document.getElementById('modal-number-of-days').value = monthCount;
                                        });
                                    }
                                
                                    // Initial calculations
                                    handleGuestSelection();
                                    updateCalculations();
                                });
                                </script>


                                <div class="py-3">
                                    <a id="reserveButton"
                                        href="{{ route('property.reserve', ['id' => $property['id'], 'check_in' => $checkInDate, 'check_out' => $checkOutDate, 'guests' => 1]) }}"
                                        class="btn btn-outline-success btn-block">
                                        Reserve
                                    </a>
                                </div>
                                
                                
                                
                                <div class="d-flex justify-content-between" style="border-bottom: 1px solid orange">
                                    <p>Cleaning fee</p>
                                    <p><span id="cleaning-fee">0</span> {{ __("Rwf") }}</p>
                                </div>

                                <div class="d-flex justify-content-between" style="border-bottom: 1px solid orange">
                                    <p>Service Fee</p>
                                    <p><span id="service-fee">0</span> {{ __("Rwf") }}</p>
                                </div>

                                <div class="d-flex justify-content-between font-weight-bold flex-column"
                                    style="border-bottom: 1px solid orange">
                                    <div class="d-flex justify-content-between">    
                                        <p>Total Rent Amount</p>
                                        <p><span id="subtotal">0</span> {{ $currency }}</p> </div>
                                    <div class="d-flex justify-content-between">
                                        <p>Total Fee</p>
                                        <p><span id="grand-total">0</span> {{ __("Rwf") }}</p>
                                    </div>
                                </div>


                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const checkInDateInput = document.getElementById('checkInDate');
                                        const checkOutDateInput = document.getElementById('checkOutDate');
                                        const guestSelectInput = document.getElementById('guestSelect');
                                        const reserveButton = document.getElementById('reserveButton');
                                        const customGuestInput = document.getElementById('customGuestCount');

                                        function updateReserveUrl() {
                                            const baseUrl = "{{ route('property.reserve', ['id' => $property['id']]) }}";
                                            const checkIn = checkInDateInput.value;
                                            const checkOut = checkOutDateInput.value;
                                        
                                            // Determine the guest count based on selection
                                            let guests;
                                            if (guestSelectInput.value === 'custom') {
                                                guests = customGuestInput.value; 
                                            } else {
                                                guests = guestSelectInput.value; 
                                            }
                                        
                                            // Get the current values
                                            const cleaningFee = document.getElementById('cleaning-fee').innerText.replace(/,/g, '');
                                            const serviceFee = document.getElementById('service-fee').innerText.replace(/,/g, '');
                                            const subtotal = document.getElementById('subtotal').innerText.replace(/,/g, '');
                                            const grandTotal = document.getElementById('grand-total').innerText.replace(/,/g, '');
                                        
                                            // Add updated parameters including subtotal and grand-total
                                            let url = `${baseUrl}?check_in=${checkIn}&check_out=${checkOut}&guests=${guests}&cleaning_fee=${cleaningFee}&service_fee=${serviceFee}&subtotal=${subtotal}&total=${grandTotal}`;
                                        
                                            // Update the button's href
                                            reserveButton.href = url;
                                        }

                                        // Update URL when any value changes
                                        checkInDateInput.addEventListener('change', updateReserveUrl);
                                        checkOutDateInput.addEventListener('change', updateReserveUrl);
                                        guestSelectInput.addEventListener('change', updateReserveUrl);

                                        // Add specific listener for custom guest input
                                        if (customGuestInput) {
                                            customGuestInput.addEventListener('input', updateReserveUrl);
                                        }

                                        // Add listeners for when fees are updated
                                        document.addEventListener('feesUpdated', updateReserveUrl);

                                        // Function to handle showing/hiding custom guest input
                                        function handleGuestSelection() {
                                            const customGuestContainer = document.getElementById('customGuestInput');

                                            if (guestSelectInput.value === 'custom') {
                                                customGuestContainer.style.display = 'block';
                                            } else {
                                                customGuestContainer.style.display = 'none';
                                            }

                                            updateReserveUrl();
                                        }

                                        // Add event listener for guest select changes
                                        guestSelectInput.addEventListener('change', handleGuestSelection);

                                        // Set initial URL and state
                                        handleGuestSelection();
                                        updateReserveUrl();
                                    });
                                </script>

                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    // Get elements
                                    const checkInDateInput = document.getElementById('checkInDate');
                                    const checkOutDateInput = document.getElementById('checkOutDate');
                                    const nightsCountElement = document.getElementById('month-count');
                                    const nightsTextElement = document.getElementById('month-text');
                                    const rateElement = document.getElementById('rate');
                                    const rateDisplayElement = document.getElementById('rate-display');
                                    const subtotalElement = document.getElementById('subtotal');
                                    const cleaningFeeElement = document.getElementById('cleaning-fee');
                                    const serviceFeeElement = document.getElementById('service-fee');
                                    const grandTotalElement = document.getElementById('grand-total');

                                    // Set initial values
                                    const rate = parseFloat(rateElement.textContent);
                                    const cleaningFee = parseFloat(cleaningFeeElement.textContent);
                                    const serviceFee = parseFloat(serviceFeeElement.textContent);

                                    // Precise month calculation function
                                    function calculateMonthsDifference(startDate, endDate) {
                                        // Create copies to avoid modifying original dates
                                        const start = new Date(startDate);
                                        const end = new Date(endDate);

                                        // Calculate months difference
                                        let months = (end.getFullYear() - start.getFullYear()) * 12;
                                        months += end.getMonth() - start.getMonth();

                                        if (start.getMonth() !== end.getMonth() ||
                                            start.getFullYear() !== end.getFullYear()) {
                                            months += 0;
                                        }

                                        return Math.max(1, months);
                                    }

                                    // Function to update all calculations
                                    function updateCalculations() {
                                        const checkInDate = checkInDateInput.value;
                                        const checkOutDate = checkOutDateInput.value;

                                        // Calculate duration in months
                                        const monthCount = calculateMonthsDifference(checkInDate, checkOutDate);

                                        // Update month count and text
                                        nightsCountElement.textContent = monthCount;
                                        nightsTextElement.textContent = monthCount === 1 ? 'Month' : 'Months';

                                        // Calculate subtotal based on months and rate
                                        const subtotal = rate * monthCount;
                                        subtotalElement.textContent = subtotal.toFixed(2);
                                        grandTotalElement.textContent = (cleaningFee + serviceFee).toFixed(2);
                                    }

                                    // Update checkout min date when check-in date changes
                                    checkInDateInput.addEventListener('change', function() {
                                        // Set minimum checkout date to day after check-in
                                        const nextDay = new Date(this.value);
                                        nextDay.setDate(nextDay.getDate() + 1);
                                        const nextDayFormatted = nextDay.toISOString().split('T')[0];
                                        checkOutDateInput.min = nextDayFormatted;

                                        // If checkout date is now invalid, update it
                                        if (checkOutDateInput.value < nextDayFormatted) {
                                            checkOutDateInput.value = nextDayFormatted;
                                        }

                                        updateCalculations();
                                    });

                                    // Update calculations when checkout date changes
                                    checkOutDateInput.addEventListener('change', updateCalculations);

                                    // Initial calculation
                                    updateCalculations();
                                });
                            </script>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    // Precise month calculation function (duplicate of main script for modal)
                                    function calculateMonthsDifference(startDate, endDate) {
                                        
                                        const start = new Date(startDate);
                                        const end = new Date(endDate);

                                        let months = (end.getFullYear() - start.getFullYear()) * 12;
                                        months += end.getMonth() - start.getMonth();

                                        if (start.getDate() <= end.getDate()) {
                                            months = Math.max(1, months);
                                        } else {
                                            months = Math.max(1, months + 1);
                                        }

                                        return months;
                                    }

                                    $('#ReseveModal').on('show.bs.modal', function(event) {
                                        const checkInDate = document.getElementById('checkInDate').value;
                                        const checkOutDate = document.getElementById('checkOutDate').value;
                                        const guestCount = document.getElementById('guestSelect').value;

                                        const formattedCheckIn = new Date(checkInDate).toLocaleDateString();
                                        const formattedCheckOut = new Date(checkOutDate).toLocaleDateString();

                                        document.getElementById('modal-date-range').textContent = formattedCheckIn + " To " +
                                            formattedCheckOut;
                                        document.getElementById('modal-guest-count').textContent = guestCount + (guestCount == 1 ?
                                            ' guest' : ' guests');

                                        const rate = document.getElementById('rate-display').textContent;
                                        const subtotal = document.getElementById('subtotal').textContent;
                                        const cleaningFee = document.getElementById('cleaning-fee').textContent;
                                        const serviceFee = document.getElementById('service-fee').textContent;
                                        const grandTotal = document.getElementById('grand-total').textContent;

                                        const monthCount = calculateMonthsDifference(checkInDate, checkOutDate);
                                        document.getElementById('modal-month-count').textContent = monthCount;
                                        document.getElementById('modal-month-text').textContent = monthCount === 1 ? 'Month' :
                                            'Months';

                                        document.getElementById('modal-rate-display').textContent = rate;
                                        document.getElementById('modal-subtotal').textContent = subtotal;
                                        document.getElementById('modal-cleaning-fee').textContent = cleaningFee;
                                        document.getElementById('modal-service-fee').textContent = serviceFee;
                                        document.getElementById('modal-grand-total').textContent = grandTotal;

                                        // Populate hidden inputs
                                        document.getElementById('modal-dates').value = formattedCheckIn + " To " +
                                            formattedCheckOut;
                                        document.getElementById('modal-guest-count-input').value = guestCount;
                                        document.getElementById('modal-total').value = grandTotal;
                                        document.getElementById('modal-number-of-days').value = monthCount;
                                    });
                                });
                            </script>
                        </div>

                    </div>
                </div>
            </div>

            <div class="container">
                <h1 class="h5 font-weight-bold text-success">
                    <i class="fa fa-bath"></i> Available Units
                </h1>
                <div class="row gx-4 gy-4">
                    @foreach ($property['available_units'] as $unit)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card h-100">
                                <img src="{{ $property['thumbnail']['image'] }}" class="card-img-top" alt="Unit Image">
                                <div class="card-body">
                                    <h5 class="card-title text-uppercase">{{ $unit['name'] }}</h5>
                                    <p class="card-text">
                                        <i class="fas fa-bed text-success"></i> {{ $unit['bedroom'] }} Bedroom(s) <br>
                                        <i class="fas fa-bath text-success"></i> {{ $unit['baths'] }} Bath(s) <br>
                                        <i class="fas fa-ruler-combined text-success"></i> {{ $unit['dimensions'] }}
                                        Dimension <br>
                                        Rent: {{ $unit['rent'] ?? 0 }} {{ $unit['currency'] ?? '' }}<br>
                                        <i class="fas fa-info-circle text-success"></i> Notes:
                                        {{ \Illuminate\Support\Str::limit($unit['notes'], 50) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <hr>

            <section class="container py-5 mx-auto">
                <h5 class="py-4 text-xl font-semibold text-success">Properties with the Same Rent</h5>
                <div class="row">
                    @foreach ($sameRentProperties as $sameRentProperty)
                        <div class="mb-4 col-md-3">
                            <div class="card">
                                @if (isset($sameRentProperty['property_images'][0]['image']))
                                    <img src="{{ $sameRentProperty['property_images'][0]['image'] }}"
                                        class="card-img-top" alt="Property Image"
                                        style="height: 200px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('public/storage/default.jpg') }}" class="card-img-top"
                                        alt="Default Image" style="height: 200px; object-fit: cover;">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $sameRentProperty['name'] }}</h5>
                                    <p class="card-text">
                                        Rent:

                                        {{ $sameRentProperty['available_units'][0]['rent'] ?? 0 }}
                                        {{ $sameRentProperty['available_units'][0]['currency'] ?? '' }}
                                    </p>
                                    <a href="{{ route('api-property-v2.show', ['id' => $sameRentProperty['id']]) }}"
                                        class="btn btn-success">View Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

        </div>


        <!-- Contact Modal -->
        <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="contactModalLabel">Contact Us</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Contact Form -->
                        <form method="POST" action="{{ route('contact-us') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name"
                                        class="form-label">{{ __('message.contact_name_label') }}</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email"
                                        class="form-label">{{ __('message.contact_email_label') }}</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="tel" class="form-label">{{ __('message.contact_tel_label') }}</label>
                                <input type="tel" class="form-control" name="tel" id="tel" required>
                            </div>
                            <div class="mb-3">
                                <label for="message"
                                    class="form-label">{{ __('message.contact_message_label') }}</label>
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
        <div class="modal fade" id="visitModal" tabindex="-1" role="dialog" aria-labelledby="visitModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="visitModalLabel">Visit Property</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Visit Form -->
                        <form action="{{ route('schedule.visit') }}" method="POST">
                            @csrf
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

        <script>
            $(document).ready(function() {
                $('#mainImage, .additional-image-container img').click(function() {
                    $('#imageModal').modal('show');
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
    @endif
@endsection
