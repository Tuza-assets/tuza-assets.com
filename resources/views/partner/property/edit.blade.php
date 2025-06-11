@extends('layouts.dashboard.app')
@section('content')
    <div class="py-5 mt-5 bg-white container-fluid">
        <div class="row">
            <div class="container p-3 mx-auto col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Edit Property</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('partner.properties.update', $property) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <!-- Basic Information -->
                                <div class="col-md-12">
                                    <h6 class="mb-3">Basic Information</h6>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Property Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name', $property->name) }}"
                                            required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                            rows="3" required>{{ old('description', $property->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Location Information -->
                                <div class="col-md-12">
                                    <h6 class="mb-3">Location Information</h6>
                                    <div class="row">
                                        <div class="mb-3 col-md-4">
                                            <label for="type" class="form-label">Type</label>
                                            <select class="form-select @error('type') is-invalid @enderror" id="type"
                                                name="type" required>
                                                <option value="">Select Type</option>
                                                <option value="residential"
                                                    {{ old('type', $property->type) == 'residential' ? 'selected' : '' }}>
                                                    Residential
                                                </option>
                                                <option value="commercial"
                                                    {{ old('type', $property->type) == 'commercial' ? 'selected' : '' }}>
                                                    Commercial</option>
                                                <option value="land"
                                                    {{ old('type', $property->type) == 'land' ? 'selected' : '' }}>Land
                                                </option>
                                            </select>
                                            @error('type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label for="property_type" class="form-label">Property Type</label>
                                            <select class="form-select @error('property_type') is-invalid @enderror"
                                                id="property_type" name="property_type" required>
                                                <option value="">Select Property Type</option>
                                                <option value="house"
                                                    {{ old('property_type', $property->property_type) == 'house' ? 'selected' : '' }}>
                                                    House</option>
                                                <option value="apartment"
                                                    {{ old('property_type', $property->property_type) == 'apartment' ? 'selected' : '' }}>
                                                    Apartment
                                                </option>
                                                <option value="villa"
                                                    {{ old('property_type', $property->property_type) == 'villa' ? 'selected' : '' }}>
                                                    Villa</option>
                                                <option value="office"
                                                    {{ old('property_type', $property->property_type) == 'office' ? 'selected' : '' }}>
                                                    Office
                                                </option>
                                                <option value="shop"
                                                    {{ old('property_type', $property->property_type) == 'shop' ? 'selected' : '' }}>
                                                    Shop</option>
                                            </select>
                                            @error('property_type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label for="country" class="form-label">Country</label>
                                            <input type="text"
                                                class="form-control @error('country') is-invalid @enderror" id="country"
                                                name="country" value="{{ old('country', $property->country) }}" required
                                                readonly>
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
                                                value="{{ old('province', $property->province) }}">
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
                                                value="{{ old('district', $property->district) }}">
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
                                                value="{{ old('sector', $property->sector) }}">
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
                                                value="{{ old('cell', $property->cell) }}">
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
                                                value="{{ old('village', $property->village) }}">
                                            @error('village')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-4">
                                            <label for="map_link" class="form-label">Map Link</label>
                                            <input type="url"
                                                class="form-control @error('map_link') is-invalid @enderror"
                                                id="map_link" name="map_link"
                                                value="{{ old('map_link', $property->map_link) }}">
                                            @error('map_link')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Property Details -->
                                <div class="mt-4 col-md-12">
                                    <h6 class="mb-3">Property Details</h6>
                                    <div class="row">
                                        <div class="mb-3 col-md-3">
                                            <label for="size" class="form-label">Size (m²)</label>
                                            <input type="number" step="0.01"
                                                class="form-control @error('size') is-invalid @enderror" id="size"
                                                name="size" value="{{ old('size', $property->size) }}" required>
                                            @error('size')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label for="floor" class="form-label">Floor</label>
                                            <input type="number"
                                                class="form-control @error('floor') is-invalid @enderror" id="floor"
                                                name="floor" value="{{ old('floor', $property->floor) }}" required>
                                            @error('floor')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-md-3">
                                            <label for="room" class="form-label">Total Rooms</label>
                                            <input type="number"
                                                class="form-control @error('room') is-invalid @enderror" id="room"
                                                name="room" value="{{ old('room', $property->room) }}" required>
                                            @error('room')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label for="bedrooms" class="form-label">Bedrooms</label>
                                            <input type="number"
                                                class="form-control @error('bedrooms') is-invalid @enderror"
                                                id="bedrooms" name="bedrooms"
                                                value="{{ old('bedrooms', $property->bedrooms) }}" required>
                                            @error('bedrooms')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label for="bathroom" class="form-label">Bathrooms</label>
                                            <input type="number"
                                                class="form-control @error('bathroom') is-invalid @enderror"
                                                id="bathroom" name="bathroom"
                                                value="{{ old('bathroom', $property->bathroom) }}" required>
                                            @error('bathroom')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label for="kitchen" class="form-label">Kitchens</label>
                                            <input type="number"
                                                class="form-control @error('kitchen') is-invalid @enderror"
                                                id="kitchen" name="kitchen"
                                                value="{{ old('kitchen', $property->kitchen) }}" required>
                                            @error('kitchen')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label for="dining_room" class="form-label">Dining Rooms</label>
                                            <input type="number"
                                                class="form-control @error('dining_room') is-invalid @enderror"
                                                id="dining_room" name="dining_room"
                                                value="{{ old('dining_room', $property->dining_room) }}" required>
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
                                                value="{{ old('year_of_construction', $property->year_of_construction) }}"
                                                required>
                                            @error('year_of_construction')
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
                                                name="price" value="{{ old('price', $property->price) }}" required>
                                            @error('price')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label for="currency" class="form-label">Currency</label>
                                            <select class="form-select @error('currency') is-invalid @enderror"
                                                id="currency" name="currency" required>
                                                <option value="">Select Currency</option>
                                                <option value="RWF"
                                                    {{ old('currency', $property->currency) == 'RWF' ? 'selected' : '' }}>
                                                    RWF
                                                </option>
                                                <option value="USD"
                                                    {{ old('currency', $property->currency) == 'USD' ? 'selected' : '' }}>
                                                    USD
                                                </option>
                                                <option value="EUR"
                                                    {{ old('currency', $property->currency) == 'EUR' ? 'selected' : '' }}>
                                                    EUR
                                                </option>
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
                                                    {{ old('availability', $property->availability) == 'available' ? 'selected' : '' }}>
                                                    Available
                                                </option>
                                                <option value="rented"
                                                    {{ old('availability', $property->availability) == 'rented' ? 'selected' : '' }}>
                                                    Rented</option>
                                                <option value="sold"
                                                    {{ old('availability', $property->availability) == 'sold' ? 'selected' : '' }}>
                                                    Sold</option>
                                            </select>
                                            @error('availability')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-md-3">
                                            <label for="construction_type" class="form-label">Construction Type</label>
                                            <select class="form-select @error('construction_type') is-invalid @enderror"
                                                id="construction_type" name="construction_type" required>
                                                <option value="">Select Construction Type</option>
                                                <option value="concrete"
                                                    {{ old('construction_type', $property->construction_type) == 'concrete' ? 'selected' : '' }}>
                                                    Concrete
                                                </option>
                                                <option value="wood"
                                                    {{ old('construction_type', $property->construction_type) == 'wood' ? 'selected' : '' }}>
                                                    Wood
                                                </option>
                                                <option value="steel"
                                                    {{ old('construction_type', $property->construction_type) == 'steel' ? 'selected' : '' }}>
                                                    Steel
                                                </option>
                                                <option value="mixed"
                                                    {{ old('construction_type', $property->construction_type) == 'mixed' ? 'selected' : '' }}>
                                                    Mixed
                                                </option>
                                            </select>
                                            @error('construction_type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="block mb-2 text-sm font-bold text-gray-700">Amenities:</label>
                                    <div
                                        class="grid w-full grid-cols-4 gap-4 py-2 leading-tight text-gray-700 appearance-none focus:outline-none focus:shadow-outline">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" name="amenities[]" value="central_heating_boiler"
                                                class="form-checkbox"
                                                {{ is_array($property->amenities) && in_array('central_heating_boiler', $property->amenities) ? 'checked' : (in_array('central_heating_boiler', old('amenities', [])) ? 'checked' : '') }}>
                                            <span class="ml-2">Central Heating Boiler</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" name="amenities[]" value="bathtub"
                                                class="form-checkbox"
                                                {{ is_array($property->amenities) && in_array('bathtub', $property->amenities) ? 'checked' : (in_array('bathtub', old('amenities', [])) ? 'checked' : '') }}>
                                            <span class="ml-2">Bathtub</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" name="amenities[]" value="renewable_energy"
                                                class="form-checkbox"
                                                {{ is_array($property->amenities) && in_array('renewable_energy', $property->amenities) ? 'checked' : (in_array('renewable_energy', old('amenities', [])) ? 'checked' : '') }}>
                                            <span class="ml-2">Renewable Energy</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" name="amenities[]" value="fireplace"
                                                class="form-checkbox"
                                                {{ is_array($property->amenities) && in_array('fireplace', $property->amenities) ? 'checked' : (in_array('fireplace', old('amenities', [])) ? 'checked' : '') }}>
                                            <span class="ml-2">Fireplace</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" name="amenities[]" value="swimming_pool"
                                                class="form-checkbox"
                                                {{ is_array($property->amenities) && in_array('swimming_pool', $property->amenities) ? 'checked' : (in_array('swimming_pool', old('amenities', [])) ? 'checked' : '') }}>
                                            <span class="ml-2">Swimming Pool</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" name="amenities[]" value="roof_top"
                                                class="form-checkbox"
                                                {{ is_array($property->amenities) && in_array('roof_top', $property->amenities) ? 'checked' : (in_array('roof_top', old('amenities', [])) ? 'checked' : '') }}>
                                            <span class="ml-2">Roof Top</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" name="amenities[]" value="cinema"
                                                class="form-checkbox"
                                                {{ is_array($property->amenities) && in_array('cinema', $property->amenities) ? 'checked' : (in_array('cinema', old('amenities', [])) ? 'checked' : '') }}>
                                            <span class="ml-2">Cinema</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" name="amenities[]" value="gym"
                                                class="form-checkbox"
                                                {{ is_array($property->amenities) && in_array('gym', $property->amenities) ? 'checked' : (in_array('gym', old('amenities', [])) ? 'checked' : '') }}>
                                            <span class="ml-2">Gym</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Images -->
                                <div class="mt-4 col-12">
                                    <h6 class="mb-3">Images</h6>
                                    <div class="row">
                                        <div class="mb-3 col-md-3">
                                            <label for="images" class="form-label">Images</label>
                                            @if ($property->images)
                                                <div class="mb-2">
                                                    @foreach (json_decode($property->images) as $image)
                                                        <img src="{{ asset($image) }}" alt="Property Image"
                                                            class="img-thumbnail" style="max-height: 200px; margin: 5px;">
                                                    @endforeach
                                                </div>
                                            @endif
                                            <!-- Additional Images Field -->
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <input type="file" name="images[]" multiple
                                                        onchange="previewImages(event)"
                                                        class="form-control form-control-line">
                                                    <div class="file-preview" id="additional_images_preview_container">
                                                        <div id="additional_images_preview" class="flex-wrap d-flex">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('images')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Update Property</button>
                                <a href="{{ route('partner.properties.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage(event, previewContainerId) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById(previewContainerId).querySelector('img');
                output.src = reader.result;
                output.classList.remove('hidden');
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        function previewImages(event) {
            var files = event.target.files;
            var previewContainer = document.getElementById('additional_images_preview');
            previewContainer.innerHTML = '';

            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var reader = new FileReader();
                reader.onload = function(event) {
                    var div = document.createElement('div');
                    div.classList.add('position-relative', 'mr-2', 'mb-2');
                    var imgElement = document.createElement('img');
                    imgElement.src = event.target.result;
                    imgElement.classList.add('w-16', 'h-16', 'object-cover', 'rounded');
                    var closeButton = document.createElement('button');
                    closeButton.type = 'button';
                    closeButton.classList.add('close-btn');
                    closeButton.innerHTML = '&times;';
                    closeButton.onclick = function() {
                        previewContainer.removeChild(div);
                    };
                    div.appendChild(imgElement);
                    div.appendChild(closeButton);
                    previewContainer.appendChild(div);
                };
                reader.readAsDataURL(file);
            }
        }

        function removeImage(previewId) {
            var previewElement = document.getElementById(previewId);
            previewElement.src = '';
            previewElement.classList.add('hidden');
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
                        if (province.name === provinceInput.value) {
                            option.selected = true;
                            // Trigger province change to load districts
                            provinceSelect.dispatchEvent(new Event('change'));
                        }
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

                            // Check if this location matches the current value
                            const inputElement = document.getElementById(`${type}_name`);
                            if (inputElement && location.name === inputElement.value) {
                                option.selected = true;
                                // If this is not the last level, trigger change to load next level
                                if (type !== 'village') {
                                    selectElement.dispatchEvent(new Event('change'));
                                }
                            }

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
