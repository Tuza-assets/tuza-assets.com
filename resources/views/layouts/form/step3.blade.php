 <div class="grid grid-cols-3 gap-4">
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700">Property Facility:</label>
            <select name="garage_type" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                <option value="Parking" {{ isset($property) && $property->garage_type == 'Parking' ? 'selected' : '' }}>Parking</option>
                <option value="Storage" {{ isset($property) && $property->garage_type == 'Storage' ? 'selected' : '' }}>Storage</option>
            </select>
        </div>
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700">Property Type:</label>
            <select name="property_type" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                <option value="Commercial" {{ isset($property) && $property->property_type == 'Commercial' ? 'selected' : '' }}>Commercial</option>
                <option value="Residential" {{ isset($property) && $property->property_type == 'Residential' ? 'selected' : '' }}>Residential</option>
                <option value="Industrial" {{ isset($property) && $property->property_type == 'Industrial' ? 'selected' : '' }}>Industrial</option>
                <option value="Recreation" {{ isset($property) && $property->property_type == 'Recreation' ? 'selected' : '' }}>Recreation</option>
            </select>
        </div>
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700">House Type:</label>
            <select name="house_type" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                <option value="Family House" {{ isset($property) && $property->house_type == 'Family House' ? 'selected' : '' }}>Family House</option>
                <option value="Apartment" {{ isset($property) && $property->house_type == 'Apartment' ? 'selected' : '' }}>Apartment</option>
                <option value="One Story" {{ isset($property) && $property->house_type == 'One Story' ? 'selected' : '' }}>One Story</option>
                <option value="Two Story" {{ isset($property) && $property->house_type == 'Two Story' ? 'selected' : '' }}>Two Story</option>
                <option value="Three or More Stories" {{ isset($property) && $property->house_type == 'Three or More Stories' ? 'selected' : '' }}>Three or More Stories</option>
            </select>
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700">Availability:</label>
            <select name="availability" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
                <option value="Available" {{ isset($property) && $property->availability == 'available' ? 'selected' : '' }}>Available</option>
                <option value="Not Available" {{ isset($property) && $property->availability == 'Not Available' ? 'selected' : '' }}>Not Available</option>
                <option value="Under Negotiation" {{ isset($property) && $property->availability == 'Under Negotiation' ? 'selected' : '' }}>Under Negotiation</option>
                <option value="Sold" {{ isset($property) && $property->availability == 'Sold' ? 'selected' : '' }}>Sold</option>
            </select>
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700">Living Rooms:</label>
            <input type="number" name="rooms" placeholder="Enter number of living rooms" value="{{ isset($property) ? $property->rooms : '' }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700">Bedrooms:</label>
            <input type="number" name="bedrooms" placeholder="Enter number of bedrooms" value="{{ isset($property) ? $property->bedrooms : '' }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700">Kitchen:</label>
            <input type="number" name="kitchen" placeholder="Enter number of kitchens" value="{{ isset($property) ? $property->kitchen : '' }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700">Dining Room:</label>
            <input type="number" name="dining_room" placeholder="Enter number of dining rooms" value="{{ isset($property) ? $property->dining_room : '' }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700">Bathroom:</label>
            <input type="number" name="bathroom" placeholder="Enter number of bathrooms" value="{{ isset($property) ? $property->bathroom : '' }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-700">Storage:</label>
            <input type="number" name="storage" placeholder="Enter number of storage rooms" value="{{ isset($property) ? $property->storage : '' }}" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500">
        </div>

    </div>