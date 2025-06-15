@extends('layouts.dashboard.app')

@section('content')

@php
    $zonnings = \App\Models\Zonning::all();
@endphp
<div class="container-fluid px-5 py-5 bg-white">
    <div class="row">
        <div class="col-lg-12 rounded border bg-white shadow-md p-3">
            <div class="bg-gray-100 font-sans leading-normal tracking-normal">
                <div class="container mx-auto p-4">
                    <h1 class="text-2xl font-bold mb-4">Edit Property</h1>
                    <form action="{{ route('admin.properties.update', $property->id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded p-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                        @csrf
                        @method('PUT')
                        <!-- Column 1 -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                            <input type="text" name="name" value="{{ $property->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required />
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                            <x-textarea  name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $property->description }}</x-textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Type:</label>
                            <input type="text" name="type" value="{{ $property->type }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Country:</label>
                            <input type="text" name="country" value="{{ $property->country }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Province:</label>
                            <input type="text" name="province" value="{{ $property->province }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">District:</label>
                            <input type="text" name="district" value="{{ $property->district }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Sector:</label>
                            <input type="text" name="sector" value="{{ $property->sector }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Cell:</label>
                            <input type="text" name="cell" value="{{ $property->cell }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Village:</label>
                            <input type="text" name="village" value="{{ $property->village }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">House:</label>
                            <input type="text" name="house" value="{{ $property->house }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Map Link:</label>
                            <input type="text" name="map_link" value="{{ $property->map_link }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <!-- Column 2 -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Size:</label>
                            <input type="number" name="size" value="{{ $property->size }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Floor:</label>
                            <input type="number" name="floor" value="{{ $property->floor }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Room:</label>
                            <input type="number" name="room" value="{{ $property->room }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Dimension:</label>
                            <input type="text" name="dimension" value="{{ $property->dimension }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                            <select name="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="under_offer" {{ $property->status == 'under_offer' ? 'selected' : '' }}>under_offer</option>
                                <option value="sold" {{ $property->status == 'sold' ? 'selected' : '' }}>sold</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Price:</label>
                            <input type="number" name="price" value="{{ $property->price }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Currency:</label>
                            <select name="currency" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="RWF" {{ $property->currency == 'RWF' ? 'selected' : '' }}>RWF</option>
                                <option value="USD" {{ $property->currency == 'USD' ? 'selected' : '' }}>USD</option>
                                <option value="EUR" {{ $property->currency == 'EUR' ? 'selected' : '' }}>EUR</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Property Type:</label>
                            <select name="property_type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="family_house" {{ $property->property_type == 'family_house' ? 'selected' : '' }}>Family House</option>
                                <option value="apartment" {{ $property->property_type == 'apartment' ? 'selected' : '' }}>Apartment</option>
                                <option value="parking" {{ $property->property_type == 'parking' ? 'selected' : '' }}>Parking</option>
                                <option value="land" {{ $property->property_type == 'land' ? 'selected' : '' }}>Land</option>
                                <option value="storage_space" {{ $property->property_type == 'storage_space' ? 'selected' : '' }}>Storage Space</option>
                                <option value="storage" {{ $property->property_type == 'storage' ? 'selected' : '' }}>Storage</option>
                                <option value="berth" {{ $property->property_type == 'berth' ? 'selected' : '' }}>Berth</option>
                                <option value="substructure" {{ $property->property_type == 'substructure' ? 'selected' : '' }}>Substructure</option>
                                <option value="pitch" {{ $property->property_type == 'pitch' ? 'selected' : '' }}>Pitch</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">House Type:</label>
                            <select name="house_type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="one_story" {{ $property->house_type == 'one_story' ? 'selected' : '' }}>One Story</option>
                                <option value="two_story" {{ $property->house_type == 'two_story' ? 'selected' : '' }}>Two Story</option>
                                <option value="three_plus_story" {{ $property->house_type == 'three_plus_story' ? 'selected' : '' }}>Three or More Stories</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Availability:</label>
                            <select name="availability" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="available" {{ $property->availability == 'available' ? 'selected' : '' }}>Available</option>
                                <option value="under_negotiation" {{ $property->availability == 'under_negotiation' ? 'selected' : '' }}>Under Negotiation</option>
                                <option value="sold" {{ $property->availability == 'sold' ? 'selected' : '' }}>Sold</option>
                            </select>
                        </div>
                        <!-- Zoning input -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Zoning:</label>
                            <select name="zoning_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @foreach ($zonnings as $zonning)
                                    <option value="{{ $zonning->id }}" {{ $property->zone_id == $zonning->id ? 'selected' : '' }}>{{ $zonning->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Amenities as checkboxes -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Amenities:</label>
                            <div class="grid grid-cols-2 gap-2">
                                @foreach ([
                                    'central_heating_boiler' => 'Central Heating Boiler',
                                    'bathtub' => 'Bathtub',
                                    'renewable_energy' => 'Renewable Energy',
                                    'fireplace' => 'Fireplace',
                                    'swimming_pool' => 'Swimming Pool',
                                    'roof_top' => 'Roof Top',
                                    'cinema' => 'Cinema',
                                    'gym' => 'Gym'
                                ] as $key => $label)
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="amenities[]" value="{{ $key }}" {{ is_array($property->amenities) && in_array($key, $property->amenities) ? 'checked' : '' }} class="form-checkbox">
                                        <span class="ml-2">{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <!-- Garage Type -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Garage Type:</label>
                            <select name="garage_type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="in_the_compound" {{ $property->garage_type == 'in_the_compound' ? 'selected' : '' }}>In the Compound</option>
                                <option value="on_street" {{ $property->garage_type == 'on_street' ? 'selected' : '' }}>On Street</option>
                                <option value="build_in_garage" {{ $property->garage_type == 'build_in_garage' ? 'selected' : '' }}>Built-in Garage</option>
                            </select>
                        </div>
                        <!-- Rooms, Bedrooms, Kitchen, Dining Room, Storage -->
                        <div class="mb-4 hidden">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Rooms:</label>
                            <input type="number" name="rooms" value="{{ $property->rooms }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Bedrooms:</label>
                            <input type="number" name="bedrooms" value="{{ $property->bedrooms }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Kitchen:</label>
                            <input type="number" name="kitchen" value="{{ $property->kitchen }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Dining Room:</label>
                            <input type="number" name="dining_room" value="{{ $property->dining_room }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Bathroom:</label>
                            <input type="number" name="bathroom" value="{{ $property->bathroom }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4"> 
                            <label class="block text-gray-700 text-sm font-bold mb-2">Storage:</label>
                            <input type="number" name="storage" value="{{ $property->storage }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        
                        
                        <!--<div class="mb-4"> -->
                        <!--    <label class="block text-gray-700 text-sm font-bold mb-2">Test</label>-->
                        <!--    <x-input type="number" name="storage" class="w-full"/>-->
                        <!--</div>-->
                        
                        
                        <!-- Construction Type -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Construction Type:</label>
                            <select name="construction_type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="Resale" {{ $property->construction_type == 'Resale' ? 'selected' : '' }}>Resale</option>
                                <option value="Newly built" {{ $property->construction_type == 'Newly built' ? 'selected' : '' }}>Newly Built</option>
                            </select>
                        </div>
                        
                        
                        <!-- Year Of Construction -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Year Of Construction:</label>
                             <input type="date" name="year_of_construction" value="{{ (new \DateTime($property->year_of_construction))->format('Y-m-d') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Images:</label>
                            <input type="file" name="images[]" multiple class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                             <!--@if ($property->images)-->
                             <!--       <div class="mt-4">-->
                             <!--           <h2 class="text-gray-700 text-sm font-bold mb-2">Current Images:</h2>-->
                             <!--           <div class="grid grid-cols-2 gap-4">-->
                             <!--               @foreach (is_string($property->images) ? json_decode($property->images, true) : $property->images as $image)-->
                             <!--                   @if (is_array($image) && isset($image['path']))-->
                             <!--                       <div class="border rounded p-2">-->
                             <!--                           <img src="{{ asset('public/storage/' . $image['path']) }}" alt="Image" class="w-full h-32 object-cover rounded">-->
                             <!--                       </div>-->
                             <!--                   @elseif (is_string($image))-->
                             <!--                       <div class="border rounded p-2">-->
                             <!--                           <img src="{{ asset('public/storage/' . $image) }}" alt="Image" class="w-full h-32 object-cover rounded">-->
                             <!--                       </div>-->
                             <!--                   @else-->
                             <!--                       <div class="border rounded p-2">-->
                             <!--                           <p class="text-red-500">Invalid image format</p>-->
                             <!--                       </div>-->
                             <!--                   @endif-->
                             <!--               @endforeach-->
                             <!--           </div>-->
                             <!--       </div>-->
                             <!--   @endif-->
                        </div>
                        <div class="flex items-center justify-between mt-4">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Property</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

