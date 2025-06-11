@extends('layouts.dashboard.app')

@section('content')
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <!-- Card Header -->
        <div class="px-6 py-4 bg-gray-100">
            <h1 class="display-4 header">TUZA ASSETS Ltd</h1>
            <p class="text-xl font-bold text-gray-800">Property Details</p>
        </div>

        @if ($property->images)
            <div class="mt-4">
                <h2 class="text-gray-700 text-sm font-bold mb-2">Current Images:</h2>
                <div class="grid grid-cols-3 gap-4">
                    @foreach (is_string($property->images) ? json_decode($property->images, true) : $property->images as $image)
                        @if (is_array($image) && isset($image['path']))
                            <div class="border rounded p-2">
                                <img src="{{ asset('public/storage/' . $image['path']) }}" alt="Image"
                                    class="w-full h-64 object-cover rounded">
                            </div>
                        @elseif (is_string($image))
                            <div class="border rounded p-2">
                                <img src="{{ asset('public/' . $image) }}" alt="Image"
                                    class="w-full h-64 object-cover rounded">
                            </div>
                        @else
                            <div class="border rounded p-2">
                                <p class="text-red-500">Invalid image format</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Card Body -->
        <div class="p-6">
            <!-- Property Name -->
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Name:</h3>
                <p class="text-gray-600">{{ $property->name }}</p>
            </div>

            <!-- Price -->
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Price:</h3>
                <p class="text-gray-600">{{ $property->currency }}  &nbsp;{{ number_format($property->price, 2) }}</p>
            </div>

            <!-- Description -->
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Description:</h3>
                <p class="text-gray-600">{{ $property->description ?: 'No description provided' }}</p>
            </div>

            <!-- Type -->
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Type:</h3>
                <p class="text-gray-600">{{ $property->type ?: 'Not specified' }}</p>
            </div>

            <!-- Location Details -->
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Location:</h3>
                <ul class="text-gray-600">
                    @if ($property->country)
                        <li><span class="font-semibold">Country:</span> {{ $property->country }}</li>
                    @endif
                    @if ($property->province)
                        <li><span class="font-semibold">Province:</span> {{ $property->province }}</li>
                    @endif
                    @if ($property->district)
                        <li><span class="font-semibold">District:</span> {{ $property->district }}</li>
                    @endif
                    @if ($property->sector)
                        <li><span class="font-semibold">Sector:</span> {{ $property->sector }}</li>
                    @endif
                    @if ($property->cell)
                        <li><span class="font-semibold">Cell:</span> {{ $property->cell }}</li>
                    @endif
                    @if ($property->village)
                        <li><span class="font-semibold">Village:</span> {{ $property->village }}</li>
                    @endif
                    @if ($property->house)
                        <li><span class="font-semibold">House:</span> {{ $property->house }}</li>
                    @endif
                </ul>
            </div>

            <!-- Additional Details -->
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Additional Details:</h3>
                <ul class="text-gray-600">
                    @if ($property->size)
                        <li><span class="font-semibold">Size:</span> {{ $property->size }}</li>
                    @endif
                    @if ($property->floor)
                        <li><span class="font-semibold">Floor:</span> {{ $property->floor }}</li>
                    @endif
                    @if ($property->room)
                        <li><span class="font-semibold">Rooms:</span> {{ $property->room }}</li>
                    @endif
                    @if ($property->dimension)
                        <li><span class="font-semibold">Dimension:</span> {{ $property->dimension }}</li>
                    @endif
                </ul>
            </div>

            <!-- Status -->
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Status:</h3>
                <p class="text-gray-600">{{ ucfirst($property->status) }}</p>
            </div>
        </div>
    </div>
@endsection
