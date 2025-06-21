@extends('layouts.dashboard.app')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="mt-14 rounded-lg border-gray-200 dark:border-gray-700">
            <!-- Card Header -->
            <div class="px-6 py-4 bg-gray-100">
                <h1 class="display-4 header">{{ $property->property_code }}</h1>
                @if (isset($property->user_id) && $property->user)
                    <div>
                        <h1 class="h5"><strong>By:   </strong>{{ $property->user->name }}, {{ $property->user->email }}, {{ $property->user->phone }},{{ $property->user->other_phone }}</h1>
                    </div>
                @else
                    <div class="container">
                        <strong>Tuza Assets</strong>
                    </div>
                @endif
            </div>

            @if ($property->images)
                <div class="mt-4">
                    <h2 class="mb-2 text-sm font-bold text-gray-700">Current Images:</h2>
                    <div class="grid grid-cols-3 gap-4">
                        @foreach (is_string($property->images) ? json_decode($property->images, true) : $property->images as $image)
                            @if (is_array($image) && isset($image['path']))
                                <div class="p-2 rounded border">
                                    <img src="{{ asset($image['path']) }}" alt="Image"
                                        class="object-cover w-full h-64 rounded">
                                </div>
                            @elseif (is_string($image))
                                <div class="p-2 rounded border">
                                    <img src="{{ asset($image) }}" alt="Image" class="object-cover w-full h-64 rounded">
                                </div>
                            @else
                                <div class="p-2 rounded border">
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
                    <p class="text-gray-600">{{ $property->currency }} &nbsp;{{ number_format($property->price, 2) }}</p>
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
    </div>
@endsection
