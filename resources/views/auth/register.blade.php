<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="flex w-full max-w-5xl overflow-hidden bg-white rounded-lg shadow-lg">
            <!-- Left Side: Image and Overlay -->
            <div class="relative flex flex-col items-center justify-center w-1/2 p-8 bg-green-800 hidd-left"
                style="background: linear-gradient(rgba(34, 197, 94, 0.85), rgba(34, 197, 94, 0.85)), url('https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=600&q=80') center/cover no-repeat;">
                <div class="z-10 text-center text-white">
                    <h2 class="mb-2 text-3xl font-bold">REGISTER NOW</h2>
                    <p class="text-lg font-semibold">while seats are available !</p>
                </div>
            </div>
            <!-- Right Side: Form -->
            <div class="w-full max-h-screen p-8 overflow-y-auto bg-white dark:bg-gray-800">
                <div class="w-full">
                    <div class="w-full mb-8 text-center">
                        <x-authentication-card-logo class="mx-auto mb-4" />
                        <h1 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Create Account</h1>
                        <p class="text-gray-600 dark:text-gray-400">Fill in your details to get started</p>
                    </div>

                    <!-- Validation Errors Alert -->
                    <x-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('register') }}" class="w-full space-y-6">
                        @csrf

                        <!-- Name and Email Row -->
                        <div class="grid w-full grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    {{ __('Name') }}
                                </label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                    placeholder="John Doe" required autofocus autocomplete="name">
                                <div class="py-4">
                                    <input type="number" id="phone" name="phone" value="{{ old('phone') }}"
                                        class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                        placeholder="+25078xxxxxx" required autofocus autocomplete="name">
                                </div>
                            </div>
                            <div>
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    {{ __('Email') }}
                                </label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                    placeholder="john@example.com" required autocomplete="username">
                            </div>
                        </div>



                        <!-- Hidden inputs for location names -->
                        <input type="hidden" name="province" id="province_name"
                            value="{{ $property->province ?? '' }}">
                        <input type="hidden" name="district" id="district_name"
                            value="{{ $property->district ?? '' }}">
                        <input type="hidden" name="sector" id="sector_name" value="{{ $property->sector ?? '' }}">
                        <input type="hidden" name="cell" id="cell_name" value="{{ $property->cell ?? '' }}">
                        <input type="hidden" name="village" id="village_name" value="{{ $property->village ?? '' }}">

                        <!-- Location Section -->
                        <div class="pt-6 border-t">
                            <h3 class="mb-4 text-lg font-medium text-gray-900 dark:text-white">Location Information</h3>

                            <!-- Country Field -->
                            <!-- Province and District Row -->
                            <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-2">
                                <div class="mb-4">
                                    <label for="country"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Country
                                    </label>
                                    <input type="text" id="country" name="country"
                                        value="{{ $property->country ?? 'Rwanda' }}"
                                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        readonly>
                                </div>
                                <div>
                                    <label for="province_select"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Province
                                    </label>
                                    <select id="province_select" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
                                        <option value="">Select Province</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="district_select"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        District
                                    </label>
                                    <select id="district_select" required disabled
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 disabled:opacity-50">
                                        <option value="">Select District</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="sector_select"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Sector
                                    </label>
                                    <select id="sector_select" required disabled
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 disabled:opacity-50">
                                        <option value="">Select Sector</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="cell_select"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Cell
                                    </label>
                                    <select id="cell_select" required disabled
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 disabled:opacity-50">
                                        <option value="">Select Cell</option>
                                    </select>
                                </div>


                                <!-- Village Row -->
                                <div class="mb-4">
                                    <label for="village_select"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Village
                                    </label>
                                    <select id="village_select" required disabled
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 disabled:opacity-50">
                                        <option value="">Select Village</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Password Row -->
                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    {{ __('Password') }}
                                </label>
                                <div class="relative">
                                    <input type="password" id="password" name="password"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                        placeholder="••••••••" required autocomplete="new-password">
                                </div>
                            </div>
                            <div>
                                <label for="password_confirmation"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    {{ __('Confirm Password') }}
                                </label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                    placeholder="••••••••" required autocomplete="new-password">
                            </div>
                        </div>
                        <!-- Terms and Privacy Policy -->
                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="flex items-start mb-6">
                                <div class="flex items-center h-5">
                                    <input id="terms" name="terms" type="checkbox" value="" required
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-green-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-green-600 dark:ring-offset-gray-800 dark:focus:ring-offset-2">
                                </div>
                                <label for="terms"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' =>
                                            '<a target="_blank" href="' .
                                            route('terms.show') .
                                            '" class="text-green-600 hover:underline dark:text-green-500">' .
                                            __('Terms of Service') .
                                            '</a>',
                                        'privacy_policy' =>
                                            '<a target="_blank" href="' .
                                            route('policy.show') .
                                            '" class="text-green-600 hover:underline dark:text-green-500">' .
                                            __('Privacy Policy') .
                                            '</a>',
                                    ]) !!}
                                </label>
                            </div>
                        @endif

                        <div class="flex items-center justify-between mt-8">
                            <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>
                            <div class="flex gap-4">
                                <button type="reset"
                                    class="px-6 py-2 font-semibold text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">RESET</button>
                                <x-button class="px-6 py-2 font-semibold bg-green-600 rounded-md hover:bg-green-700">
                                    {{ __('Register') }}
                                </x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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

                // Fetch Provinces
                fetch(`${baseUrl}/provinces`)
                    .then(response => response.json())
                    .then(data => {
                        const provinces = data.data;
                        provinces.forEach(province => {
                            const option = document.createElement('option');
                            option.value = province.id;
                            option.textContent = province.name;
                            option.dataset.name = province.name;
                            provinceSelect.add(option);
                        });
                    })
                    .catch(error => console.error('Error:', error));

                // Province Change Event
                provinceSelect.addEventListener('change', function() {
                    resetSelects('district');
                    if (this.value) {
                        const selectedOption = this.options[this.selectedIndex];
                        provinceInput.value = selectedOption.dataset.name;
                        fetchLocations(`${baseUrl}/provinces/${this.value}/districts`, districtSelect);
                        districtSelect.disabled = false;
                    }
                });

                // District Change Event
                districtSelect.addEventListener('change', function() {
                    resetSelects('sector');
                    if (this.value) {
                        const selectedOption = this.options[this.selectedIndex];
                        districtInput.value = selectedOption.dataset.name;
                        fetchLocations(`${baseUrl}/districts/${this.value}/sectors`, sectorSelect);
                        sectorSelect.disabled = false;
                    }
                });

                // Sector Change Event
                sectorSelect.addEventListener('change', function() {
                    resetSelects('cell');
                    if (this.value) {
                        const selectedOption = this.options[this.selectedIndex];
                        sectorInput.value = selectedOption.dataset.name;
                        fetchLocations(`${baseUrl}/sectors/${this.value}/cells`, cellSelect);
                        cellSelect.disabled = false;
                    }
                });

                // Cell Change Event
                cellSelect.addEventListener('change', function() {
                    resetSelects('village');
                    if (this.value) {
                        const selectedOption = this.options[this.selectedIndex];
                        cellInput.value = selectedOption.dataset.name;
                        fetchLocations(`${baseUrl}/cells/${this.value}/villages`, villageSelect);
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
                function fetchLocations(url, selectElement) {
                    fetch(url)
                        .then(response => response.json())
                        .then(data => {
                            const locations = data.data;
                            locations.forEach(location => {
                                const option = document.createElement('option');
                                option.value = location.id;
                                option.textContent = location.name;
                                option.dataset.name = location.name;
                                selectElement.add(option);
                            });
                        })
                        .catch(error => console.error('Error:', error));
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

                    selects[startFrom].forEach(select => {
                        select.innerHTML = '<option value="">Select ' + select.id.replace('_select', '').charAt(
                            0).toUpperCase() + select.id.replace('_select', '').slice(1) + '</option>';
                        select.disabled = true;
                    });

                    // Reset corresponding hidden inputs
                    inputs[startFrom].forEach(input => {
                        input.value = '';
                    });
                }
            });
        </script>
    </div>
</x-guest-layout>
