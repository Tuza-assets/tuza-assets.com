@extends('layouts.web')

<style>
    .property-card {
        border: 1px solid #ddd;
        border-radius: 10px;
        overflow: hidden;
        transition: box-shadow 0.3s;
    }

    .property-card:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .property-card img {
        width: 100%;
        height: 150px;
        object-fit: cover;
    }
     .property-card-details {
         color:green;
     }
    .property-card-body {
        padding: 15px;
    }

    .property-card-title {
        font-size: 1.25rem;
        font-weight: bold;
        color: #007bff;
    }

    .property-card-text {
        color: #6c757d;
    }

    .property-card-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .property-card-footer div {
        display: flex;
        align-items: center;
    }

    .property-card-footer div i {
        margin-right: 5px;
    }

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        z-index: 1;
    }

    .aside-open {
        padding:5px;
        display: block; /* Default display for larger screens */
    }

    .aside-open.show {
        transform: translateX(0);
    }
    
    
       .btn-custom-orange {
            color: black; /* Text color */
            background-color: darkorange; /* Button background color */
            border-color: darkorange; /* Border color */
            padding: 10px 20px; /* Adjust padding as needed (top-bottom, left-right) */
            text-decoration: none; /* Remove text decoration */
        }
        .btn-custom-orange:hover {
            color: white; /* Text color on hover */
            background-color: darkorange; /* Button background color on hover */
            border-color: darkorange; /* Border color on hover */
            box-shadow: none; /* No shadow on hover */
            text-decoration: none; /* Ensure no text decoration on hover */
        }
        .btn-custom-orange:focus, .btn-custom-orange:active {
            box-shadow: none; /* No shadow on focus and active */
            text-decoration: none; /* Ensure no text decoration on focus and active */
        }
    
           .btn-custom-green {
            color: black; 
            background-color: green;
            border-color: green;
            padding: 10px 20px;
            text-decoration: none; 
        }
        .btn-custom-green:hover {
            color: white; 
            background-color: green; 
            border-color:green; 
            box-shadow: none; 
            text-decoration: none; 
        }
        .btn-custom-green:focus, .btn-custom-green:active {
            box-shadow: none; 
            text-decoration: none; 
        }
            i {
            color: darkorange;
            
        }
        span{
            margin-left: 7px !important;
        }
    

    @media (max-width: 992px) {
        .aside-open {
            display: none; /* Hide on small screens */
        }
    #filterSection{
        margin-top:17vh;
    }
        .aside-open.show {
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            width: 80%;
            max-width: 300px;
            height: 100vh; /* Use 100vh to make the height of the element the full viewport height */
            background: white;
            z-index: 2;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
            overflow-y: auto; /* Allow vertical scrolling */
        }


        .aside-open.show {
            transform: translateX(0);
        }
    }
</style>

@section('content')

<section class="bg-success text-white text-center py-5">
    <div class="container mb-2">
    </div>
</section> 

<div class="container py-5">
    <div class="row px-3">
        <!-- Toggle button for small screens -->
        <button class="btn btn-success d-md-none mb-3" id="filterToggleBtn">
            <i class="fas fa-filter"></i> Filters
        </button>

        <!-- Filters Section -->
        <div class="col-12 col-md-3 aside-open mb-3" id="filterSection">
                <div class="mb-4">
                    <h2 class="h5 font-weight-bold">Filters</h2>
                </div>
            <div class="btn-group mb-3" role="group">
                <a href="{{ route('new-propertyonsell') }}" class="btn-custom-green">Sale</a>
                <a href="{{ route('api-property-v2.all') }}" class="btn-custom-orange">Rental</a>
            </div>
            <form id="filterForm" class="pr-2">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="price_min">From Price</label>
                        <select name="price_min" id="price_min" class="form-control">
                            <option value="0" selected>Any</option>
                            <option value="50000"> 50,000</option>
                            <option value="100000"> 100,000</option>
                            <option value="200000"> 200,000</option>
                            <option value="500000"> 500,000</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="price_max">To Price</label>
                        <select name="price_max" id="price_max" class="form-control">
                            <option value="no" selected>No Limit</option>
                            <option value="500000"> 500,000</option>
                            <option value="1000000"> 1,000,000</option>
                            <option value="2000000"> 2,000,000</option>
                            <option value="5000000"> 5,000,000</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="size_min">Min Size (m²)</label>
                        <select name="size_min" id="size_min" class="form-control">
                            <option value="-50" selected>Any</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="150">150</option>
                            <option value="200">200</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="size_max">Max Size (m²)</label>
                        <select name="size_max" id="size_max" class="form-control">
                            <option value="no" selected>No Limit</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="150">150</option>
                            <option value="200">200</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="rooms_min">Min Rooms</label>
                        <select name="rooms_min" id="rooms_min" class="form-control">
                            <option value="0" selected>Any</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="rooms_max">Max Rooms</label>
                        <select name="rooms_max" id="rooms_max" class="form-control">
                            <option value="no" selected>No Limit</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="date_min">From Date</label>
                        <input type="date" id="date_min" name="date_min" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="date_max">To Date</label>
                        <input type="date" id="date_max" name="date_max" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="property_type">Property Type</label>
                    <select name="property_type" id="property_type" class="form-control">
                        <option value="any" selected>Any</option>
                        <option value="Commercial">Commercial</option>
                        <option value="Residential">Residential</option>
                        <option value="Apartment">Apartment</option>
                        <option value="Family housing">Family housing</option>
                        <option value="Shared family housing">Shared family housing</option>
                        <option value="Shared apartment">Shared apartment</option>
                    </select>
                </div>
            </form>
        </div>

        <!-- Properties Section -->
        <div class="col-12 col-md-9 mb-3 px-2" id="propertiesList">
              <h5 class="h4 font-weight-bold text-success">PROPERTY ON RENT</h5>
            <p class="text-muted">{{ count($properties) }} properties</p>
            <div  id="propertyCards">
                @foreach ($properties as $property)
                    <a href="{{ route('api-property-v2.show', $property['id']) }}"
                       class="d-flex flex-column flex-md-row align-items-center bg-white card shadow-sm hover:bg-light w-100 text-decoration-none">
                        <img src="{{ $property['thumbnail']['image'] ?? asset('public/storage/default.jpg') }}"
                             alt="{{ $property['name'] }}"
                             class="img-fluid mb-3 mb-md-0"
                             style="width: 300px; height: 150px; object-fit: cover;" />
                        <div class="d-flex flex-column justify-content-between px-4 w-100">
                            <h2 class="h5 font-weight-bold text-dark">{{ $property['name'] }}</h2>
                            <p class="text-muted mb-1">{{ $property['province'] }} {{ $property['district'] }}</p>
                            <p class="text-dark font-weight-bold property-price">
                                <span>Price:</span>  {{ number_format($property['available_units'][0]['rent'], 0, ',', '.') }}
                            </p>
                            <div class="property-card-details">
                                <span><i class="fas fa-ruler-combined"></i> <span>Size:</span> {{ $property['available_units'][0]['dimensions'] }} m²</span>
                                <span><i class="fas fa-bed"></i> <span>Rooms:</span> {{ $property['available_units'][0]['bedroom'] }}</span>
                                <span><i class="fa fa-map-signs" aria-hidden="true"></i> <span>Property Type:</span> {{ $property['type'] }}</span>
                            </div>
                        </div>
                    </a>

                @endforeach
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

$(document).ready(function() {
    // Toggle filters section on small screens
$('#filterToggleBtn').on('click', function() {
        $('#filterSection').toggleClass('show');
        $('#overlay').toggle($('#filterSection').hasClass('show'));
    });

    $('#overlay').on('click', function() {
        $('#filterSection').removeClass('show');
        $(this).hide();
    });

    $(document).on('click', function(event) {
        if (!$(event.target).closest('#filterSection, #filterToggleBtn').length) {
            if ($('#filterSection').hasClass('show')) {
                $('#filterSection').removeClass('show');
                $('#overlay').hide();
            }
        }
    });
    
     function validateDates() {
        var dateMin = $('#date_min').val();
        var dateMax = $('#date_max').val();

        if (dateMin && dateMax && new Date(dateMin) > new Date(dateMax)) {
            alert('From Date cannot be later than To Date.');
            $('#date_min').val('');
            return false;
        }
        return true;
    }

    // Add change event listeners to filter select elements
    $('#price_min, #price_max, #size_min, #size_max, #rooms_min, #rooms_max, #date_min, #date_max, #property_type').change(function() {
        filterAndDisplayProperties();
    });

    // Function to filter and display properties based on selected filters
    function filterAndDisplayProperties() {
        let allProperties = @json($properties);
        var filteredProperties = allProperties.filter(function(property) {
            // Get filter values
            var priceMin = parseInt($('#price_min').val()) || 0;
            var priceMax = $('#price_max').val() === 'no' ? Infinity : parseInt($('#price_max').val());
            var sizeMin = parseInt($('#size_min').val()) || -50;
            var sizeMax = $('#size_max').val() === 'no' ? Infinity : parseInt($('#size_max').val());
            var roomsMin = parseInt($('#rooms_min').val()) || 0;
            var roomsMax = $('#rooms_max').val() === 'no' ? Infinity : parseInt($('#rooms_max').val());
            var dateMin = $('#date_min').val() ? new Date($('#date_min').val()) : new Date('1900-01-01');
            var dateMax = $('#date_max').val() ? new Date($('#date_max').val()) : new Date();
            var propertyType = $('#property_type').val();

            // Filter conditions
            var rent = property.available_units[0].rent;
            var size = property.available_units[0].dimensions;
            var rooms = property.available_units[0].bedroom;
            var dateCreated = new Date(property.created_at);

            return rent >= priceMin &&
                   rent <= priceMax &&
                   size >= sizeMin &&
                   size <= sizeMax &&
                   rooms >= roomsMin &&
                   rooms <= roomsMax &&
                   dateCreated >= dateMin &&
                   dateCreated <= dateMax &&
                   (propertyType === 'any' || property.type === propertyType);
        });

        displayProperties(filteredProperties);
    }

    // Function to display properties
    function displayProperties(properties) {
        var $propertyCards = $('#propertyCards');
        $propertyCards.empty();

        if (properties.length === 0) {
            $propertyCards.append('<p>No properties found.</p>');
            return;
        }

        properties.forEach(function(property) {
            var propertyCard = `
                <a href="/api/property/${property.id}"
                   class="d-flex flex-column flex-md-row align-items-start mb-3 p-3 bg-white shadow-sm hover:bg-light w-100 text-decoration-none card">
                    <img src="${property.thumbnail.image || 'default.jpg'}"
                         alt="${property.name}"
                         class="img-fluid mb-3 mb-md-0"
                         style="width: 300px; height: 150px; object-fit: cover;" />
                    <div class="d-flex flex-column justify-content-between px-4 w-100">
                        <h2 class="h5 font-weight-bold text-dark">${property.name}</h2>
                        <p class="text-muted mb-1">${property.province} ${property.district}</p>
                        <p class="text-dark font-weight-bold property-price">
                            <span>Price:</span> ${property.available_units[0].rent.toLocaleString()}
                        </p>
                        <div class="property-card-details">
                            <span><i class="fas fa-ruler-combined"></i> <span>Size:</span> ${property.available_units[0].dimensions} m²</span>
                            <span><i class="fas fa-bed"></i> <span>Rooms:</span> ${property.available_units[0].bedroom}</span>
                            <span><i class="fa fa-map-signs" aria-hidden="true"></i> <span>Property Type:</span> ${property.type}</span>
                        </div>
                    </div>
                </a>
            `;
            $propertyCards.append(propertyCard);
        });
    }

    // Initial display of properties
    displayProperties(@json($properties));
});
</script>

@endsection
