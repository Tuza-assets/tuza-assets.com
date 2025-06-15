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
        display: block; /* Default display for larger screens */
    }

    .aside-open.show {
        transform: translateX(0);
    }

    @media (max-width: 992px) {
        .aside-open {
            display: none; /* Hide on small screens */
        }
    
        #filterSection{
        margin-top:7vh;
    }
        .aside-open.show {
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            width: 80%;
            max-width: 300px;
            height: 100%;
            background: white;
            z-index: 2;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
             overflow-y: auto;
        }

        .aside-open.show {
            transform: translateX(0);
        }
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

    
</style>



@section('content')

<section class="bg-success text-white text-center py-5">
    <div class="container mb-2">
    </div>
</section> 
@if(isset($properties))

  <div class="container mx-auto py-2 sm:px-2 md:px-4 lg:px-6 xl:px-8">
    <div class="row">
        <!-- Filters Toggle Button for small screens -->
        <div class="col-12 d-lg-none mb-3 mt-3">
            <button class="btn btn-success" id="filterToggleBtn">
                <i class="fas fa-filter"></i> <span>Filters</span>
            </button>
        </div>

<!-- Filters Section -->
<div class="col-lg-4 mb-4 aside-open py-5" id="filterSection">
    <div class="bg-white p-4 rounded shadow-sm">
        <div class="mb-4">
            <h2 class="h5 font-weight-bold">Filters</h2>
        </div>
        <div class="btn-group mb-4" role="group">
            <a href="{{ route('new-propertyonsell') }}" class="btn-custom-green">Sale</a>
            <a href="{{ route('api-property-v2.all') }}" class="btn-custom-orange">Rental</a>
        </div>
        <form id="filterForm" class="d-flex flex-column gap-3">
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="price_min">From Price ()</label>
                    <select name="price_min" id="price_min" class="form-control">
                        <option value="0" selected>Any</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="200">200</option>
                        <option value="500">500</option>
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="price_max">To Price ()</label>
                    <select name="price_max" id="price_max" class="form-control">
                        <option value="no" selected>No Limit</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="200">200</option>
                        <option value="500">500</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="size_min">Min Size (m²)</label>
                    <select name="size_min" id="size_min" class="form-control">
                        <option value="0" selected>Any</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="150">150</option>
                        <option value="200">200</option>
                    </select>
                </div>
                <div class="form-group col-6">
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
                <div class="form-group col-6">
                    <label for="rooms_min">Min Rooms</label>
                    <select name="rooms_min" id="rooms_min" class="form-control">
                        <option value="0" selected>Any</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="form-group col-6">
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
                <div class="form-group col-6">
                    <label for="date_min">From Date</label>
                    <input type="date" id="date_min" name="date_min" class="form-control">
                </div>
                <div class="form-group col-6">
                    <label for="date_max">To Date</label>
                    <input type="date" id="date_max" name="date_max" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label class="d-flex justify-content-between align-items-center">
                        <span>Availability</span>
                        <i class="fas fa-info-circle"></i>
                    </label>
                    <div class="d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <input type="checkbox" id="available" name="availability" value="available">
                                <label for="available">Available</label>
                            </div>
                            <span>{{ $availableCount }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <input type="checkbox" id="under_negotiation" name="availability" value="under_negotiation">
                                <label for="under_negotiation">Under negotiation</label>
                            </div>
                            <span>{{ $underNegotiationCount }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <input type="checkbox" id="sold" name="availability" value="sold">
                                <label for="sold">Sold</label>
                            </div>
                            <span>{{ $soldCount }}</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-12">
                    <label class="d-flex justify-content-between align-items-center">
                        <span>Property Type</span>
                        <i class="fas fa-info-circle"></i>
                    </label>
                    <div class="d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <input type="checkbox" id="family_house" name="property_type" value="family_house">
                                <label for="family_house">Family House</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <input type="checkbox" id="apartment" name="property_type" value="apartment">
                                <label for="apartment">Apartment</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <input type="checkbox" id="parking" name="property_type" value="parking">
                                <label for="parking">Parking</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <input type="checkbox" id="land" name="property_type" value="land">
                                <label for="land">Land</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <input type="checkbox" id="storage_space" name="property_type" value="storage_space">
                                <label for="storage_space">Storage Space</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <input type="checkbox" id="storage" name="property_type" value="storage">
                                <label for="storage">Storage</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <input type="checkbox" id="berth" name="property_type" value="berth">
                                <label for="berth">Berth</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <input type="checkbox" id="substructure" name="property_type" value="substructure">
                                <label for="substructure">Substructure</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <input type="checkbox" id="pitch" name="property_type" value="pitch">
                                <label for="pitch">Pitch</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
               <!-- Amenities Section -->
            <div class="form-row">
                <div class="form-group col-12">
                    <label class="d-flex justify-content-between align-items-center">
                        <span>Amenities</span>
                        <i class="fas fa-info-circle"></i>
                    </label>
                    <div class="d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <input type="checkbox" id="central_heating_boiler" name="amenities[]" value="central_heating_boiler">
                                <label for="central_heating_boiler">Central Heating Boiler</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <input type="checkbox" id="bathtub" name="amenities[]" value="bathtub">
                                <label for="bathtub">Bathtub</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <input type="checkbox" id="renewable_energy" name="amenities[]" value="renewable_energy">
                                <label for="renewable_energy">Renewable Energy</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <input type="checkbox" id="fireplace" name="amenities[]" value="fireplace">
                                <label for="fireplace">Fireplace</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <input type="checkbox" id="swimming_pool" name="amenities[]" value="swimming_pool">
                                <label for="swimming_pool">Swimming Pool</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <input type="checkbox" id="rooftop" name="amenities[]" value="rooftop">
                                <label for="rooftop">Rooftop</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <input type="checkbox" id="cinema" name="amenities[]" value="cinema">
                                <label for="cinema">Cinema</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <input type="checkbox" id="gym" name="amenities[]" value="gym">
                                <label for="gym">Gym</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                        
            <!-- Garage Type Section -->
            <div class="form-row">
                <div class="form-group col-12">
                    <label class="d-flex justify-content-between align-items-center">
                        <span>Garage Type</span>
                        <i class="fas fa-info-circle"></i>
                    </label>
                    <div class="d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <input type="checkbox" id="in_the_compound" name="garage_type" value="in_the_compound">
                                <label for="in_the_compound">In the Compound</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <input type="checkbox" id="on_street" name="garage_type" value="on_street">
                                <label for="on_street">On Street</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <input type="checkbox" id="build_in_garage" name="garage_type" value="build_in_garage">
                                <label for="build_in_garage">Built-in Garage</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Bedrooms Filter Section -->
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="bedrooms_min">Bedrooms</label>
                    <select id="bedrooms_min" name="bedrooms_min" class="form-control">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="bedrooms_max">to</label>
                    <select id="bedrooms_max" name="bedrooms_max" class="form-control">
                        <option value="no">No Limit</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
        @php
          $zonnings = \App\Models\Zonning::all();
        @endphp
        <div class="form-row">
            <div class="form-group col-12">
                <label for="zoning">Zoning</label>
                <select name="zoning_id" id="zoning" class="form-control">
                    <option value="" selected>Any</option>
                    @foreach($zonnings as $zoning)
                        <option value="{{ $zoning->id }}">{{ $zoning->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        </form>
    </div>
</div>

     <!-- Properties Section -->
    <div class="col-md-8 mb-4 py-5" id="propertiesList">
      <h5 class="h4 font-weight-bold text-success">PROPERTY ON SALE</h5>
      <p class="text-muted">{{$properties->count()}} properties</p>

      <div class="d-flex flex-column gap-3">
        @foreach($properties as $property)
    <div class="property-item bg-white p-4 border rounded shadow-sm mb-3 card"
         data-price="{{ $property->price }}"
         data-size="{{ $property->size }}"
         data-rooms="{{ $property->room }}"
         data-bedrooms="{{ $property->bedrooms }}"
         data-created-at="{{ $property->created_at }}"
         data-availability="{{ $property->availability }}"
         data-property-type="{{ $property->property_type }}"
         data-amenities="{{ is_array($property->amenities) ? implode(',', $property->amenities) : '' }}"
         data-garage-type="{{ $property->garage_type }}"
          data-zoning="{{ $property->zoning_id }}">

                
                @php
                    // Determine the first image
                    $images = is_string($property->images) ? json_decode($property->images, true) : $property->images;
                    $firstImage = 'default.jpg'; // Default value
                    if (is_array($images) && !empty($images)) {
                        $firstImage = isset($images[0]['path']) ? $images[0]['path'] : (is_string($images[0]) ? $images[0] : 'default.jpg');
                    }
                @endphp
                <a
                    href="{{ route('new-propertyonselldetail', ['id' => $property->id]) }}"
                    class="d-flex flex-column flex-md-row align-items-center bg-white shadow-sm hover:bg-light w-100 text-decoration-none"
                >
                    <img
                        src="{{ asset('public/' . $firstImage) }}"
                        alt="{{ $property->name }}"
                        class="img-fluid  mb-3 mb-md-0"
                        style="width: 230px; height: 150px; object-fit: cover;"
                    />
                    <div class="d-flex flex-column justify-content-between p-3 w-100">
                        <h2 class="h5 font-weight-bold text-dark">{{ $property->name}}</h2>
                        <p class="text-muted mb-1">{{ $property->province }} {{ $property->district }}</p>
                        <p class="text-dark font-weight-bold property-price"> <span>Price:</span>
                        
                        {{ Number::currency($property?->price ?? 0, in: $property->currency ?? 'RWF') }}
                        </p>
                        
                         <span><i class="fa fa-book" aria-hidden="true"></i><span class="text-dark">availability: {{ $property->availability }}</span></span>
                        
                        <div class="property-card-details">
                            @if($property->size)
                                <span><i class="fas fa-ruler-combined"></i><span>Size:</span> {{ $property->size }} m²</span>
                            @endif
                        
                            @if($property->bedrooms)
                                <span><i class="fas fa-bed"></i> <span>Bed Rooms:</span> {{ $property->bedrooms }}</span>
                            @endif
                        
                            @if($property->dimension)
                                <span><i class="fa fa-map-signs" aria-hidden="true"></i><span>Dimension:</span> {{ $property->dimension }}</span>
                            @endif
                        </div>

                    </div>
                </a>
            </div>
        @endforeach
      </div>
    </div>
  </div>
</div>


@else
    <p class="text-muted">Comming Soon</p>
@endif


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    function filterProperties() {
        console.log('Filtering properties...');

        var priceMin = parseInt($('#price_min').val(), 10) || 0;
        var priceMax = $('#price_max').val() === 'no' ? Infinity : parseInt($('#price_max').val(), 10);
        var sizeMin = parseInt($('#size_min').val(), 10) || 0;
        var sizeMax = $('#size_max').val() === 'no' ? Infinity : parseInt($('#size_max').val(), 10);
        var roomsMin = parseInt($('#rooms_min').val(), 10) || 0;
        var roomsMax = $('#rooms_max').val() === 'no' ? Infinity : parseInt($('#rooms_max').val(), 10);
        var bedroomsMin = parseInt($('#bedrooms_min').val(), 10) || 0;
        var bedroomsMax = $('#bedrooms_max').val() === 'no' ? Infinity : parseInt($('#bedrooms_max').val(), 10);

        var dateMin = $('#date_min').val() ? new Date($('#date_min').val()) : new Date('1970-01-01');
        var dateMax = $('#date_max').val() ? new Date($('#date_max').val()) : null;

        if (dateMin) {
            dateMin.setHours(0, 1, 0, 0);
        }

        if (dateMax) {
            dateMax.setHours(23, 59, 59, 999);
        }

        var selectedAvailabilities = [];
        $('input[name="availability"]:checked').each(function() {
            selectedAvailabilities.push($(this).val());
        });

        var selectedPropertyTypes = [];
        $('input[name="property_type"]:checked').each(function() {
            selectedPropertyTypes.push($(this).val());
        });

        var selectedGarageTypes = [];
        $('input[name="garage_type"]:checked').each(function() {
            selectedGarageTypes.push($(this).val());
        });

        var selectedAmenities = [];
        $('input[name="amenities[]"]:checked').each(function() {
            selectedAmenities.push($(this).val());
        });

        var selectedZoning = $('#zoning').val();
        console.log('Selected Zoning:', selectedZoning);

        $('.property-item').each(function() {
            var propertyPrice = parseInt($(this).data('price'), 10);
            var propertySize = parseInt($(this).data('size'), 10);
            var propertyRooms = parseInt($(this).data('rooms'), 10);
            var propertyBedrooms = parseInt($(this).data('bedrooms'), 10);
            var propertyCreatedAt = new Date($(this).data('created-at'));
            var propertyAvailability = $(this).data('availability');
            var propertyType = $(this).data('property-type');
            var propertyGarageType = $(this).data('garage-type');
            var propertyAmenities = $(this).data('amenities').split(',');
            var propertyZoning = $(this).data('zoning');

            console.log('Property Zoning:', propertyZoning);

            var priceCondition = (priceMin === 0 || propertyPrice >= priceMin) &&
                                 (priceMax === Infinity || propertyPrice <= priceMax);
            
            var sizeCondition = (sizeMin === 0 || propertySize >= sizeMin) &&
                                (sizeMax === Infinity || propertySize <= sizeMax);

            var roomsCondition = (roomsMin === 0 || propertyRooms >= roomsMin) &&
                                 (roomsMax === Infinity || propertyRooms <= roomsMax);

            var bedroomsCondition = (bedroomsMin === 0 || propertyBedrooms >= bedroomsMin) &&
                                    (bedroomsMax === Infinity || propertyBedrooms <= bedroomsMax);

            var dateCondition = !dateMax || (propertyCreatedAt >= dateMin && propertyCreatedAt <= dateMax);

            var availabilityCondition = selectedAvailabilities.length === 0 || selectedAvailabilities.includes(propertyAvailability);
            var propertyTypeCondition = selectedPropertyTypes.length === 0 || selectedPropertyTypes.includes(propertyType);
            var garageTypeCondition = selectedGarageTypes.length === 0 || selectedGarageTypes.includes(propertyGarageType);
            var amenitiesCondition = selectedAmenities.length === 0 || selectedAmenities.every(amenity => propertyAmenities.includes(amenity));
            var zoningCondition = selectedZoning === "" || propertyZoning == selectedZoning;

            console.log('Zoning Condition:', zoningCondition);

            if (priceCondition && sizeCondition && roomsCondition && bedroomsCondition && dateCondition && availabilityCondition && propertyTypeCondition && garageTypeCondition && amenitiesCondition && zoningCondition) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }

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

    $('#price_min, #price_max, #size_min, #size_max, #rooms_min, #rooms_max, #bedrooms_min, #bedrooms_max, #date_min, #date_max, #zoning, input[name="availability"], input[name="property_type"], input[name="amenities[]"], input[name="garage_type"]').on('change', function() {
        console.log('Filter changed');
        if (validateDates()) {
            filterProperties();
        }
    });

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

    filterProperties();
});


</script>





@endsection
