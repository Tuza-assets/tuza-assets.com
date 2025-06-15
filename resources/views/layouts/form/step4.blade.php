<div class="mb-4">
    <label class="block mb-2 text-sm font-bold text-gray-700">Amenities:</label>
    <div
        class="grid w-full grid-cols-4 gap-4 py-2 leading-tight text-gray-700 appearance-none focus:outline-none focus:shadow-outline">
        <label class="inline-flex items-center">
            <input type="checkbox" name="amenities[]" value="central_heating_boiler" class="form-checkbox"
                {{ isset($property) && is_array($property->amenities) && in_array('central_heating_boiler', $property->amenities) ? 'checked' : (in_array('central_heating_boiler', old('amenities', [])) ? 'checked' : '') }}>
            <span class="ml-2">Central Heating Boiler</span>
        </label>
        <label class="inline-flex items-center">
            <input type="checkbox" name="amenities[]" value="bathtub" class="form-checkbox"
                {{ isset($property) && is_array($property->amenities) && in_array('bathtub', $property->amenities) ? 'checked' : (in_array('bathtub', old('amenities', [])) ? 'checked' : '') }}>
            <span class="ml-2">Bathtub</span>
        </label>
        <label class="inline-flex items-center">
            <input type="checkbox" name="amenities[]" value="renewable_energy" class="form-checkbox"
                {{ isset($property) && is_array($property->amenities) && in_array('renewable_energy', $property->amenities) ? 'checked' : (in_array('renewable_energy', old('amenities', [])) ? 'checked' : '') }}>
            <span class="ml-2">Renewable Energy</span>
        </label>
        <label class="inline-flex items-center">
            <input type="checkbox" name="amenities[]" value="fireplace" class="form-checkbox"
                {{ isset($property) && is_array($property->amenities) && in_array('fireplace', $property->amenities) ? 'checked' : (in_array('fireplace', old('amenities', [])) ? 'checked' : '') }}>
            <span class="ml-2">Fireplace</span>
        </label>
        <label class="inline-flex items-center">
            <input type="checkbox" name="amenities[]" value="swimming_pool" class="form-checkbox"
                {{ isset($property) && is_array($property->amenities) && in_array('swimming_pool', $property->amenities) ? 'checked' : (in_array('swimming_pool', old('amenities', [])) ? 'checked' : '') }}>
            <span class="ml-2">Swimming Pool</span>
        </label>
        <label class="inline-flex items-center">
            <input type="checkbox" name="amenities[]" value="roof_top" class="form-checkbox"
                {{ isset($property) && is_array($property->amenities) && in_array('roof_top', $property->amenities) ? 'checked' : (in_array('roof_top', old('amenities', [])) ? 'checked' : '') }}>
            <span class="ml-2">Roof Top</span>
        </label>
        <label class="inline-flex items-center">
            <input type="checkbox" name="amenities[]" value="cinema" class="form-checkbox"
                {{ isset($property) && is_array($property->amenities) && in_array('cinema', $property->amenities) ? 'checked' : (in_array('cinema', old('amenities', [])) ? 'checked' : '') }}>
            <span class="ml-2">Cinema</span>
        </label>
        <label class="inline-flex items-center">
            <input type="checkbox" name="amenities[]" value="gym" class="form-checkbox"
                {{ isset($property) && is_array($property->amenities) && in_array('gym', $property->amenities) ? 'checked' : (in_array('gym', old('amenities', [])) ? 'checked' : '') }}>
            <span class="ml-2">Gym</span>
        </label>
    </div>
</div>

<!-- Property Details Grid -->
<div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-2">
    <!-- Construction Type -->
    <div>
        <label class="block mb-2 text-sm font-medium text-gray-700">Construction Type</label>
        <select name="construction_type"
            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
            <option value="Resale"
                {{ isset($property) && $property->construction_type == 'Resale' ? 'selected' : '' }}>Resale</option>
            <option value="Newly built"
                {{ isset($property) && $property->construction_type == 'Newly built' ? 'selected' : '' }}>Newly Built
            </option>
        </select>
    </div>

    <!-- Year of Construction -->
    <div>
        <label class="block mb-2 text-sm font-medium text-gray-700">Year of Construction</label>
        <select name="year_of_construction" id="yearOfConstruction"
            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
            <!-- Year options will be populated by the script below -->
        </select>
    </div>

    <script>
        const startYear = 1980; // Earliest year
        const endYear = new Date().getFullYear(); // Current year
        const yearSelect = document.getElementById('yearOfConstruction');
        for (let year = endYear; year >= startYear; year--) { // Start from current year and decrement
            const option = document.createElement('option');
            option.value = year;
            option.textContent = year;
            yearSelect.appendChild(option);
        }
    </script>

    <!-- Status -->
    <div>
        <label class="block mb-2 text-sm font-medium text-gray-700">Status</label>
        <select name="status" required
            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
            <option value="Under Offer"
                {{ isset($property) && $property->status == 'Under Offer' ? 'selected' : '' }}>Under Offer</option>
            <option value="Sold" {{ isset($property) && $property->status == 'Sold' ? 'selected' : '' }}>Sold
            </option>
        </select>
    </div>
 
<!-- Price -->
    <div>
        <label class="block mb-2 text-sm font-medium text-gray-700">Price</label>
        <div class="flex space-x-4">
            <input type="number" id="price" name="display_price" value="{{ old('price', $property->price ?? '') }}"
                step="0.01"
                class="flex-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
            <!-- Hidden input for total price -->
            <input type="hidden" id="total_price" name="price" value="">
            <select id="currency" name="currency"
                class="w-24 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                <option value="RWF" {{ isset($property) && $property->currency == 'RWF' ? 'selected' : '' }}>RWF</option>
                <option value="USD" {{ isset($property) && $property->currency == 'USD' ? 'selected' : '' }}>USD</option>
                <option value="EUR" {{ isset($property) && $property->currency == 'EUR' ? 'selected' : '' }}>EUR</option>
            </select>
        </div>
        <!-- Enhanced Commission Display -->
        <div id="commission-container" class="hidden p-3 mt-4 border border-green-100 rounded-lg shadow-sm bg-gradient-to-r from-green-50 to-gray-50">
            <div class="flex items-center space-x-2">
                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
                <div class="flex-grow">
                    <div class="text-sm font-medium text-gray-700">Commission Details</div>
                    <div id="commission-value" class="mt-1 text-lg font-semibold text-green-600">
                        <div class="w-24 h-6 bg-gray-200 rounded animate-pulse"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let commissionPercentage = 0;
            let currency = document.getElementById("currency").value;
            const commissionContainer = document.getElementById("commission-container");
            let totalPrice = 0;

            // Update currency when changed
            document.getElementById("currency").addEventListener("change", function() {
                currency = this.value;
                updateCommission();
            });

            // Fetch the commission from the API
            fetch("https://property.tuza-assets.com/api/v1/company-price")
                .then(response => response.json())
                .then(data => {
                    if (data.commission) {
                        commissionPercentage = parseFloat(data.commission);
                        updateCommission();
                    } else {
                        showError("Commission rate not available");
                    }
                })
                .catch(error => {
                    console.error("Error fetching commission:", error);
                    showError("Unable to fetch commission rate");
                });

            // Enhanced function to calculate and update commission display
            function updateCommission() {
                let price = parseFloat(document.getElementById("price").value) || 0;
                
                if (price > 0) {
                    commissionContainer.classList.remove("hidden");
                } else {
                    commissionContainer.classList.add("hidden");
                    return;
                }

                let commissionAmount = (price * commissionPercentage) / 100;
                totalPrice = price + commissionAmount;

                // Update hidden total price input
                document.getElementById("total_price").value = totalPrice;

                // Format numbers based on currency
                let formattedPrice = formatCurrency(price, currency);
                let formattedCommission = formatCurrency(commissionAmount, currency);
                let formattedTotalPrice = formatCurrency(totalPrice, currency);

                document.getElementById("commission-value").innerHTML = `
                    <div class="flex flex-col space-y-2">
                        <div class="text-sm text-gray-500">
                            A commission rate of <span class="font-bold text-green-600">${commissionPercentage}%</span> on the difference between the property price and the final selling price will be applied.
                        </div>
                        <div class="text-sm text-gray-500">
                            Property Price: <span class="font-bold text-green-600">${formattedPrice}</span>
                        </div>
                        <div class="text-sm text-gray-500">
                            Tuza Assets Commission: <span class="font-bold text-green-600">${formattedCommission}</span>
                        </div>
                        <div class="text-sm text-gray-500">
                            Final Selling Price: <span class="font-bold text-green-600">${formattedTotalPrice}</span>
                        </div>
                    </div>
                `;
            }

            // Function to show error state
            function showError(message) {
                document.getElementById("commission-value").innerHTML = `
                    <div class="flex items-center text-sm text-red-500">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        ${message}
                    </div>
                `;
            }

            // Currency formatting helper
            function formatCurrency(amount, currency) {
                const formatter = new Intl.NumberFormat('en-US', {
                    style: 'currency',
                    currency: currency,
                    minimumFractionDigits: 2
                });
                return formatter.format(amount);
            }

            // Listen for price input changes with debounce
            let timeout = null;
            document.getElementById("price").addEventListener("input", function() {
                clearTimeout(timeout);
                timeout = setTimeout(updateCommission, 300);
            });
        });
    </script>

</div>

<!-- Image Upload -->
<div class="mb-8">
    <label class="block mb-4 text-lg font-semibold text-gray-800">Additional Images</label>
    <div class="space-y-4">
        <!-- Upload Area -->
        <div class="relative flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg">
            <div class="space-y-1 text-center">
                <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none"
                    viewBox="0 0 48 48">
                    <path
                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div class="flex text-sm text-gray-600">
                    <label
                        class="relative font-medium text-green-600 bg-white rounded-md cursor-pointer hover:text-green-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-green-500">
                        <span>Upload files</span>
                        <input type="file" name="images[]" multiple class="sr-only" id="image-upload"
                            accept="image/*" onchange="handleImageUpload(this)">
                    </label>
                    <p class="pl-1">or drag and drop</p>
                </div>
                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
            </div>
        </div>

        <!-- New Images Preview -->
        <div id="image-preview" class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4">
            <!-- Preview images will be inserted here via JavaScript -->
        </div>
    </div>

</div>

<script>
    function handleImageUpload(input) {
        const previewContainer = document.getElementById('image-preview');
        previewContainer.innerHTML = ''; // Clear existing previews

        Array.from(input.files).forEach((file, index) => {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                const preview = document.createElement('div');
                preview.className = 'relative group';

                reader.onload = function(e) {
                    preview.innerHTML = `
                    <img src="${e.target.result}" alt="Image preview" class="object-cover w-full h-32 rounded-lg">
                    <div class="absolute inset-0 flex items-center justify-center transition-opacity bg-black rounded-lg opacity-0 bg-opacity-40 group-hover:opacity-100">
                    <button type="button" class="p-2 text-white bg-red-600 rounded-full hover:bg-red-700 focus:outline-none" onclick="this.closest('.relative').remove()">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    </button>
                    </div>
                    `;
                };

                reader.readAsDataURL(file);
                previewContainer.appendChild(preview);
            }
        });
    }

    function removeImage(imageId) {
        if (confirm('Are you sure you want to remove this image?')) {
            // Send AJAX request to remove the image
            fetch(`/admin/properties/images/${imageId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Remove the image element from the DOM
                        document.querySelector(`[data-image-id="${imageId}"]`).remove();
                    } else {
                        alert('Failed to remove image. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while removing the image.');
                });
        }
    }
</script>
