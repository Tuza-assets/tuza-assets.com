                       <!-- Step 1: Property Details -->
    <div class="step" id="step1">
        <div class="bg-white py-6">
            <h2 class="text-2xl font-bold mb-4 text-gray-800">Property Details</h2>

            <div class="row">
                <!-- UPI Field -->
                <div class="col-md-6 mb-4">
                    <label for="upi" class="block text-sm font-medium text-gray-700 mb-2">UPI Number</label>
                    <x-input 
                        type="text" 
                        name="upi" 
                        id="upi" 
                        value="{{ old('upi', $property->upi ?? '') }}" 
                        required
                        placeholder="Enter UPI number"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm transition duration-150 ease-in-out"
                    />
                </div>

                <!-- Name Field -->
                <div class="col-md-6 mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Property Name</label>
                    <x-input 
                        type="text" 
                        name="name" 
                        id="name" 
                        value="{{ old('name', $property->name ?? '') }}" 
                        required
                        placeholder="Enter property name"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm transition duration-150 ease-in-out"
                    />
                </div>

                <!-- Total Area Field -->
                <div class="col-md-6 mb-4">
                    <label for="size" class="block text-sm font-medium text-gray-700 mb-2">Total Area (sq M)</label>
                    <x-input 
                        type="number" 
                        name="size" 
                        id="size" 
                        value="{{ old('size', $property->size ?? '') }}" 
                        required
                        class="block w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 sm:text-sm"
                    />
                </div>

                <!-- Description Field -->
                <div class="col-md-12 mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <x-textarea 
                        name="description"
                        id="description"
                        rows="5"
                        required
                        placeholder="Enter property description"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm transition duration-150 ease-in-out"
                    >{{ old('description', $property->description ?? '') }}</x-textarea>
                </div>

                <!-- Image Field -->
                <div class="col-md-12 mb-4">
                    <label for="mainimage" class="block text-sm font-medium text-gray-700 mb-2">Property Image (2D image)</label>
                    <x-input 
                        type="file" 
                        name="mainimage" 
                        id="mainimage" 
                        accept="image/*"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm transition duration-150 ease-in-out"
                    />
                </div>
            </div>

            <div class="flex justify-end mt-4">
                <button type="button"
                    class="next-step btn btn-primary px-6 py-2 bg-orange-500 text-white rounded-lg hover:bg-blue-600"
                    data-step="1">Next</button>
            </div>
        </div>
    </div>