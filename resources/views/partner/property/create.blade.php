@extends('layouts.dashboard.app')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="border-gray-200 rounded-lg mt-14 dark:border-gray-700 ">
            <div class="container p-3 mx-auto col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Add New Property</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('partner.properties.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <!-- Basic Information -->
                                <div class="col-md-12">
                                    <h6 class="mb-3">Basic Information</h6>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Property Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name') }}" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                            rows="3" required>{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Property Type Selection -->
                                <div class="col-md-12">
                                    <h6 class="mb-3">Property Type</h6>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="property_action" class="form-label">Property</label>
                                            <select class="form-select @error('property_action') is-invalid @enderror"
                                                id="property_action" name="type" required
                                                onchange="togglePropertyFields()">
                                                <option value="">Select Property Type</option>
                                                <option value="House For Rent"
                                                    {{ old('property_action') == 'House For Rent' ? 'selected' : '' }}>House for
                                                    Rent</option>
                                                <option value="House For Sale"
                                                    {{ old('property_action') == 'House For Sale' ? 'selected' : '' }}>House for
                                                    Sale</option>
                                                <option value="Plot For Rent"
                                                    {{ old('property_action') == 'Plot For Rent' ? 'selected' : '' }}>Plot for
                                                    Rent</option>
                                                <option value="Plot For Sale"
                                                    {{ old('property_action') == 'Plot For Sale' ? 'selected' : '' }}>Plot for
                                                    Sale</option>
                                            </select>
                                            @error('property_action')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-md-6" id="house_type_container" style="display: none;">
                                            <label for="house_type" class="form-label">House Type</label>
                                            <select class="form-select @error('house_type') is-invalid @enderror"
                                                id="house_type" name="house_type" onchange="toggleHouseSubType()">
                                                <option value="">Select House Type</option>
                                                <option value="residential"
                                                    {{ old('house_type') == 'residential' ? 'selected' : '' }}>Residential
                                                </option>
                                                <option value="commercial"
                                                    {{ old('house_type') == 'commercial' ? 'selected' : '' }}>Commercial
                                                </option>
                                            </select>
                                            @error('house_type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-md-6" id="house_subtype_container" style="display: none;">
                                            <label for="house_subtype" class="form-label">House Subtype</label>
                                            <select class="form-select @error('house_subtype') is-invalid @enderror"
                                                id="house_subtype" name="house_subtype">
                                                <option value="">Select Subtype</option>
                                                <!-- Options will be populated by JavaScript -->
                                            </select>
                                            @error('house_subtype')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Location Information -->
                                <div class="col-md-12">
                                    <h6 class="mb-3">Location Information</h6>
                                    <div class="row">
                                        <div class="mb-3 col-md-4">
                                            <label for="country" class="form-label">Country</label>
                                            <input type="text"
                                                class="form-control @error('country') is-invalid @enderror" id="country"
                                                name="country" value="{{ old('country', 'Rwanda') }}" required readonly>
                                            @error('country')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-md-4">
                                            <label for="province_select" class="form-label">Province</label>
                                            <select class="form-select @error('province') is-invalid @enderror"
                                                id="province_select" name="province_id" required>
                                                <option value="">Select Province</option>
                                            </select>
                                            <input type="hidden" id="province_name" name="province"
                                                value="{{ old('province') }}">
                                            @error('province')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-md-4">
                                            <label for="district_select" class="form-label">District</label>
                                            <select class="form-select @error('district') is-invalid @enderror"
                                                id="district_select" name="district_id" required disabled>
                                                <option value="">Select District</option>
                                            </select>
                                            <input type="hidden" id="district_name" name="district"
                                                value="{{ old('district') }}">
                                            @error('district')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-md-4">
                                            <label for="sector_select" class="form-label">Sector</label>
                                            <select class="form-select @error('sector') is-invalid @enderror"
                                                id="sector_select" name="sector_id" required disabled>
                                                <option value="">Select Sector</option>
                                            </select>
                                            <input type="hidden" id="sector_name" name="sector"
                                                value="{{ old('sector') }}">
                                            @error('sector')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mb-3 col-md-4">
                                            <label for="cell_select" class="form-label">Cell</label>
                                            <select class="form-select @error('cell') is-invalid @enderror"
                                                id="cell_select" name="cell_id" required disabled>
                                                <option value="">Select Cell</option>
                                            </select>
                                            <input type="hidden" id="cell_name" name="cell"
                                                value="{{ old('cell') }}">
                                            @error('cell')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-md-4">
                                            <label for="village_select" class="form-label">Village</label>
                                            <select class="form-select @error('village') is-invalid @enderror"
                                                id="village_select" name="village_id" required disabled>
                                                <option value="">Select Village</option>
                                            </select>
                                            <input type="hidden" id="village_name" name="village"
                                                value="{{ old('village') }}">
                                            @error('village')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-md-4">
                                            <label for="map_link" class="form-label">Map Link</label>
                                            <input type="text"
                                                class="form-control @error('map_link') is-invalid @enderror"
                                                id="map_link" name="map_link" value="{{ old('map_link') }}">
                                            @error('map_link')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Property Details (For Houses) -->
                                <div class="mt-4 col-md-12" id="house_details" style="display: none;">
                                    <h6 class="mb-3">Property Details</h6>
                                    <div class="row">
                                        <div class="mb-3 col-md-3">
                                            <label for="size" class="form-label">Size (m²)</label>
                                            <input type="number" step="0.01"
                                                class="form-control @error('size') is-invalid @enderror" id="size"
                                                name="size" value="{{ old('size') }}">
                                            @error('size')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label for="floor" class="form-label">Floor</label>
                                            <input type="number"
                                                class="form-control @error('floor') is-invalid @enderror" id="floor"
                                                name="floor" value="{{ old('floor') }}">
                                            @error('floor')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-md-3">
                                            <label for="room" class="form-label">Total Rooms</label>
                                            <input type="number"
                                                class="form-control @error('room') is-invalid @enderror" id="room"
                                                name="room" value="{{ old('room') }}">
                                            @error('room')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label for="bedrooms" class="form-label">Bedrooms</label>
                                            <input type="number"
                                                class="form-control @error('bedrooms') is-invalid @enderror"
                                                id="bedrooms" name="bedrooms" value="{{ old('bedrooms') }}">
                                            @error('bedrooms')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label for="bathroom" class="form-label">Bathrooms</label>
                                            <input type="number"
                                                class="form-control @error('bathroom') is-invalid @enderror"
                                                id="bathroom" name="bathroom" value="{{ old('bathroom') }}">
                                            @error('bathroom')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label for="kitchen" class="form-label">Kitchens</label>
                                            <input type="number"
                                                class="form-control @error('kitchen') is-invalid @enderror"
                                                id="kitchen" name="kitchen" value="{{ old('kitchen') }}">
                                            @error('kitchen')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label for="dining_room" class="form-label">Dining Rooms</label>
                                            <input type="number"
                                                class="form-control @error('dining_room') is-invalid @enderror"
                                                id="dining_room" name="dining_room" value="{{ old('dining_room') }}">
                                            @error('dining_room')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label for="year_of_construction" class="form-label">Year of
                                                Construction</label>
                                            <input type="number"
                                                class="form-control @error('year_of_construction') is-invalid @enderror"
                                                id="year_of_construction" name="year_of_construction"
                                                value="{{ old('year_of_construction') }}">
                                            @error('year_of_construction')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Plot Details (For Plots) -->
                                <div class="mt-4 col-md-12" id="plot_details" style="display: none;">
                                    <h6 class="mb-3">Plot Details</h6>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="plot_size" class="form-label">Dimensions (m²)</label>
                                            <input type="number" step="0.01"
                                                class="form-control @error('plot_size') is-invalid @enderror"
                                                id="plot_size" name="plot_size" value="{{ old('plot_size') }}">
                                            @error('plot_size')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label for="plot_description" class="form-label">Additional
                                                Information</label>
                                            <textarea class="form-control @error('plot_description') is-invalid @enderror" id="plot_description"
                                                name="plot_description" rows="3" placeholder="Additional details about the plot...">{{ old('plot_description') }}</textarea>
                                            @error('plot_description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Additional Details -->
                                <div class="mt-4 col-md-12">
                                    <h6 class="mb-3">Additional Details</h6>
                                    <div class="row">
                                        <div class="mb-3 col-md-3">
                                            <label for="price" class="form-label">Price</label>
                                            <input type="number" step="0.01"
                                                class="form-control @error('price') is-invalid @enderror" id="price"
                                                name="price" value="{{ old('price') }}" required>
                                            @error('price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label for="currency" class="form-label">Currency</label>
                                            <select class="form-select @error('currency') is-invalid @enderror"
                                                id="currency" name="currency" required>
                                                <option value="">Select Currency</option>
                                                <option value="RWF" {{ old('currency') == 'RWF' ? 'selected' : '' }}>
                                                    RWF</option>
                                                <option value="USD" {{ old('currency') == 'USD' ? 'selected' : '' }}>
                                                    USD</option>
                                                <option value="EUR" {{ old('currency') == 'EUR' ? 'selected' : '' }}>
                                                    EUR</option>
                                            </select>
                                            @error('currency')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label for="availability" class="form-label">Availability</label>
                                            <select class="form-select @error('availability') is-invalid @enderror"
                                                id="availability" name="availability" required>
                                                <option value="">Select Availability</option>
                                                <option value="available"
                                                    {{ old('availability') == 'available' ? 'selected' : '' }}>Available
                                                </option>
                                                <option value="rented"
                                                    {{ old('availability') == 'rented' ? 'selected' : '' }}>Rented</option>
                                                <option value="sold"
                                                    {{ old('availability') == 'sold' ? 'selected' : '' }}>Sold</option>
                                            </select>
                                            @error('availability')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-3" id="construction_type_container">
                                            <label for="construction_type" class="form-label">Construction Type</label>
                                            <select class="form-select @error('construction_type') is-invalid @enderror"
                                                id="construction_type" name="construction_type">
                                                <option value="">Select Construction Type</option>
                                                <option value="concrete"
                                                    {{ old('construction_type') == 'concrete' ? 'selected' : '' }}>Concrete
                                                </option>
                                                <option value="wood"
                                                    {{ old('construction_type') == 'wood' ? 'selected' : '' }}>Wood
                                                </option>
                                                <option value="steel"
                                                    {{ old('construction_type') == 'steel' ? 'selected' : '' }}>Steel
                                                </option>
                                                <option value="mixed"
                                                    {{ old('construction_type') == 'mixed' ? 'selected' : '' }}>Mixed
                                                </option>
                                            </select>
                                            @error('construction_type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Amenities (Only for Houses) -->
                                <div class="mb-4" id="amenities_section" style="display: none;">
                                    <label class="block mb-2 text-sm font-bold text-gray-700">Amenities:</label>
                                    <div
                                        class="grid w-full grid-cols-4 gap-4 py-2 leading-tight text-gray-700 appearance-none focus:outline-none focus:shadow-outline">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" name="amenities[]" value="central_heating_boiler"
                                                class="form-checkbox"
                                                {{ in_array('central_heating_boiler', old('amenities', [])) ? 'checked' : '' }}>
                                            <span class="ml-2">Central Heating Boiler</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" name="amenities[]" value="bathtub"
                                                class="form-checkbox"
                                                {{ in_array('bathtub', old('amenities', [])) ? 'checked' : '' }}>
                                            <span class="ml-2">Bathtub</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" name="amenities[]" value="renewable_energy"
                                                class="form-checkbox"
                                                {{ in_array('renewable_energy', old('amenities', [])) ? 'checked' : '' }}>
                                            <span class="ml-2">Renewable Energy</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" name="amenities[]" value="fireplace"
                                                class="form-checkbox"
                                                {{ in_array('fireplace', old('amenities', [])) ? 'checked' : '' }}>
                                            <span class="ml-2">Fireplace</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" name="amenities[]" value="swimming_pool"
                                                class="form-checkbox"
                                                {{ in_array('swimming_pool', old('amenities', [])) ? 'checked' : '' }}>
                                            <span class="ml-2">Swimming Pool</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" name="amenities[]" value="roof_top"
                                                class="form-checkbox"
                                                {{ in_array('roof_top', old('amenities', [])) ? 'checked' : '' }}>
                                            <span class="ml-2">Roof Top</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" name="amenities[]" value="cinema"
                                                class="form-checkbox"
                                                {{ in_array('cinema', old('amenities', [])) ? 'checked' : '' }}>
                                            <span class="ml-2">Cinema</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" name="amenities[]" value="gym"
                                                class="form-checkbox"
                                                {{ in_array('gym', old('amenities', [])) ? 'checked' : '' }}>
                                            <span class="ml-2">Gym</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Images -->
                                <div class="mt-4 col-12">
                                    <h6 class="mb-3">Images</h6>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <input type="file"
                                                class="form-control @error('images') is-invalid @enderror" id="images"
                                                name="images[]" multiple onchange="previewImages(event)">
                                            @error('images')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div id="image_preview_container" class="mt-3 row">
                                        <!-- Preview images will be displayed here -->
                                    </div>
                                </div>

                                <!-- Terms and Conditions for Image Upload -->
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input @error('image_terms') is-invalid @enderror"
                                            type="checkbox" value="1" id="image_terms" name="image_terms"
                                            onchange="toggleImageUpload()" {{ old('image_terms') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="image_terms">
                                            <strong>Terms and Conditions for Image Upload</strong>
                                        </label>
                                        @error('image_terms')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="p-3 mt-2 border rounded bg-light">
                                        <small class="text-muted">
                                            <strong>English:</strong><br>
                                            • You are responsible for the correctness of the data/information you are
                                            posting<br>
                                            • Tuza Assets is not responsible for the accurate information provided by the
                                            Commissionaires<br>
                                            • All information you provide about this property you confirm to be true<br>
                                            • Tuza Assets Ltd is not responsible for followers caused by inaccurate
                                            information you provide<br><br>

                                            <strong>Kinyarwanda:</strong><br>
                                            • Amakuru yose utanga kuri uyu mutungo uremeza ko ari ukuri<br>
                                            • Tuza Assets Ltd ntabwo yirengera inkurikizi zitewe n'uko amakuru utanze atari
                                            ukuri<br>
                                        </small>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" id="submit-btn" class="btn btn-primary" disabled>Create
                                    Property</button>
                                <a href="{{ route('partner.properties.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Conditional Fields -->
    <script>
        // House subtypes mapping
        const houseSubtypes = {
            residential: [{
                    value: 'family_house',
                    text: 'Family House'
                },
                {
                    value: 'apartment',
                    text: 'Apartment'
                },
                {
                    value: 'villa',
                    text: 'Villa'
                }
            ],
            commercial: [{
                    value: 'office',
                    text: 'Office(s)'
                },
                {
                    value: 'shop',
                    text: 'Shop(s)'
                }
            ]
        };

        // Toggle property fields based on property action selection
        function togglePropertyFields() {
            const propertyAction = document.getElementById('property_action').value;
            const houseTypeContainer = document.getElementById('house_type_container');
            const houseSubtypeContainer = document.getElementById('house_subtype_container');
            const houseDetails = document.getElementById('house_details');
            const plotDetails = document.getElementById('plot_details');
            const amenitiesSection = document.getElementById('amenities_section');
            const constructionTypeContainer = document.getElementById('construction_type_container');

            // Reset all fields
            houseTypeContainer.style.display = 'none';
            houseSubtypeContainer.style.display = 'none';
            houseDetails.style.display = 'none';
            plotDetails.style.display = 'none';
            amenitiesSection.style.display = 'none';
            constructionTypeContainer.style.display = 'block';

            // Clear selections
            document.getElementById('house_type').value = '';
            document.getElementById('house_subtype').value = '';

            if (propertyAction === 'House For Rent' || propertyAction === 'House For Sale') {
                // Show house-related fields
                houseTypeContainer.style.display = 'block';
                houseDetails.style.display = 'block';
                amenitiesSection.style.display = 'block';

                // Make house fields required
                setRequiredFields(['house_type'], true);
                setRequiredFields(['plot_size'], false);
            } else if (propertyAction === 'Plot For Rent' || propertyAction === 'Plot For Sale') {
                // Show plot-related fields
                plotDetails.style.display = 'block';
                constructionTypeContainer.style.display = 'none';

                // Make plot fields required
                setRequiredFields(['plot_size'], true);
                setRequiredFields(['house_type'], false);
            } else {
                // Clear all requirements when nothing is selected
                setRequiredFields(['house_type', 'plot_size'], false);
            }
        }

        // Toggle house subtypes based on house type selection
        function toggleHouseSubType() {
            const houseType = document.getElementById('house_type').value;
            const houseSubtypeContainer = document.getElementById('house_subtype_container');
            const houseSubtypeSelect = document.getElementById('house_subtype');

            if (houseType && houseSubtypes[houseType]) {
                houseSubtypeContainer.style.display = 'block';

                // Clear previous options
                houseSubtypeSelect.innerHTML = '<option value="">Select Subtype</option>';

                // Add new options
                houseSubtypes[houseType].forEach(subtype => {
                    const option = document.createElement('option');
                    option.value = subtype.value;
                    option.textContent = subtype.text;
                    houseSubtypeSelect.appendChild(option);
                });

                setRequiredFields(['house_subtype'], true);
            } else {
                houseSubtypeContainer.style.display = 'none';
                setRequiredFields(['house_subtype'], false);
            }
        }

        // Helper function to set required attribute on fields
        function setRequiredFields(fieldIds, required) {
            fieldIds.forEach(fieldId => {
                const field = document.getElementById(fieldId);
                if (field) {
                    if (required) {
                        field.setAttribute('required', 'required');
                    } else {
                        field.removeAttribute('required');
                    }
                }
            });
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            togglePropertyFields();
            toggleHouseSubType();
        });
    </script>

    <!-- Original JavaScript functions -->
    <script>
        function toggleImageUpload() {
            const checkbox = document.getElementById('image_terms');
            const submitBtn = document.getElementById('submit-btn');
            submitBtn.disabled = !checkbox.checked;
        }

        document.addEventListener('DOMContentLoaded', toggleImageUpload);
    </script>
    <script>
        function previewImages(event) {
            const files = event.target.files;
            const previewContainer = document.getElementById('image_preview_container');
            previewContainer.innerHTML = ''; // Clear previous previews

            if (files.length > 9) {
                alert('You can upload a maximum of 9 images.');
                event.target.value = ''; // Clear the file input
                return;
            }

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                if (!file.type.startsWith('image/')) continue; // Skip non-image files

                const reader = new FileReader();
                reader.onload = function(e) {
                    const div = document.createElement('div');
                    div.className = 'col-md-3 mb-3';
                    div.innerHTML = `
                    <div class="position-relative">
                        <img src="${e.target.result}" class="rounded img-fluid" style="height: 200px; width: 100%; object-fit: cover;">
                        <button type="button" class="top-0 m-2 btn btn-danger btn-sm position-absolute end-0" onclick="this.parentElement.parentElement.remove()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                `;
                    previewContainer.appendChild(div);
                };
                reader.readAsDataURL(file);
            }
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const baseUrl = 'https://property.tuza-assets.com/api/v1/locations';

            // Elements - Selects
            const provinceSelect = document.getElementById('province_select');
            const districtSelect = document.getElementById('district_select');
            const sectorSelect = document.getElementById('sector_select');
            const cellSelect = document.getElementById('cell_select');
            const villageSelect = document.getElementById('village_select');

            // Elements - Hidden Inputs
            const provinceInput = document.getElementById('province_name');
            const districtInput = document.getElementById('district_name');
            const sectorInput = document.getElementById('sector_name');
            const cellInput = document.getElementById('cell_name');
            const villageInput = document.getElementById('village_name');

            // Show loading indicator
            function showLoading(selectElement) {
                selectElement.innerHTML = '<option value="">Loading...</option>';
            }

            // Show error state
            function showError(selectElement, message) {
                selectElement.innerHTML = `<option value="">Error: ${message}</option>`;
            }

            // Fetch Provinces
            showLoading(provinceSelect);
            fetch(`${baseUrl}/provinces`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    provinceSelect.innerHTML = '<option value="">Select Province</option>';
                    const provinces = data.data;
                    provinces.forEach(province => {
                        const option = document.createElement('option');
                        option.value = province.id;
                        option.textContent = province.name;
                        option.dataset.name = province.name;
                        provinceSelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching provinces:', error);
                    showError(provinceSelect, 'Failed to load provinces');
                });

            // Province Change Event
            provinceSelect.addEventListener('change', function() {
                resetSelects('district');
                if (this.value) {
                    const selectedOption = this.options[this.selectedIndex];
                    provinceInput.value = selectedOption.dataset.name;
                    showLoading(districtSelect);
                    fetchLocations(`${baseUrl}/provinces/${this.value}/districts`, districtSelect,
                        'district');
                    districtSelect.disabled = false;
                }
            });

            // District Change Event
            districtSelect.addEventListener('change', function() {
                resetSelects('sector');
                if (this.value) {
                    const selectedOption = this.options[this.selectedIndex];
                    districtInput.value = selectedOption.dataset.name;
                    showLoading(sectorSelect);
                    fetchLocations(`${baseUrl}/districts/${this.value}/sectors`, sectorSelect, 'sector');
                    sectorSelect.disabled = false;
                }
            });

            // Sector Change Event
            sectorSelect.addEventListener('change', function() {
                resetSelects('cell');
                if (this.value) {
                    const selectedOption = this.options[this.selectedIndex];
                    sectorInput.value = selectedOption.dataset.name;
                    showLoading(cellSelect);
                    fetchLocations(`${baseUrl}/sectors/${this.value}/cells`, cellSelect, 'cell');
                    cellSelect.disabled = false;
                }
            });

            // Cell Change Event
            cellSelect.addEventListener('change', function() {
                resetSelects('village');
                if (this.value) {
                    const selectedOption = this.options[this.selectedIndex];
                    cellInput.value = selectedOption.dataset.name;
                    showLoading(villageSelect);
                    fetchLocations(`${baseUrl}/cells/${this.value}/villages`, villageSelect, 'village');
                    villageSelect.disabled = false;
                }
            });

            // Village Change Event
            villageSelect.addEventListener('change', function() {
                if (this.value) {
                    const selectedOption = this.options[this.selectedIndex];
                    villageInput.value = selectedOption.dataset.name;
                }
            });

            // Helper Functions
            function fetchLocations(url, selectElement, type) {
                fetch(url)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        const capitalizedType = type.charAt(0).toUpperCase() + type.slice(1);
                        selectElement.innerHTML = `<option value="">Select ${capitalizedType}</option>`;
                        const locations = data.data;
                        locations.forEach(location => {
                            const option = document.createElement('option');
                            option.value = location.id;
                            option.textContent = location.name;
                            option.dataset.name = location.name;
                            selectElement.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error(`Error fetching ${type}:`, error);
                        showError(selectElement, `Failed to load ${type}s`);
                    });
            }

            function resetSelects(startFrom) {
                const selects = {
                    district: [districtSelect, sectorSelect, cellSelect, villageSelect],
                    sector: [sectorSelect, cellSelect, villageSelect],
                    cell: [cellSelect, villageSelect],
                    village: [villageSelect]
                };

                const inputs = {
                    district: [districtInput, sectorInput, cellInput, villageInput],
                    sector: [sectorInput, cellInput, villageInput],
                    cell: [cellInput, villageInput],
                    village: [villageInput]
                };

                const selectsToReset = selects[startFrom];
                const inputsToReset = inputs[startFrom];

                selectsToReset.forEach((select, index) => {
                    const type = ['district', 'sector', 'cell', 'village'][Object.keys(selects).indexOf(
                        startFrom) + index];
                    const capitalizedType = type.charAt(0).toUpperCase() + type.slice(1);
                    select.innerHTML = `<option value="">Select ${capitalizedType}</option>`;
                    select.disabled = true;
                });

                // Reset corresponding hidden inputs
                inputsToReset.forEach(input => {
                    input.value = '';
                });
            }
        });
    </script>
@endsection
