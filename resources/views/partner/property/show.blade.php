@extends('layouts.dashboard.app')
@section('content')
<div class="bg-white container-fluid">
    <div class="row">
        <div class="container p-3 mx-auto col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Property Details</h5>
                    <div>
                        <a href="{{ route('partner.properties.edit', $property) }}" class="btn btn-primary">Edit Property</a>
                        <a href="{{ route('partner.properties.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <!-- Main Image -->
                        <div class="mb-4 col-md-12">
                            @if($property->mainimage)
                                <img src="{{ asset($property->mainimage) }}" alt="Main Image" class="rounded img-fluid" style="max-height: 400px; width: 100%; object-fit: cover;">
                            @endif
                        </div>

                        <!-- Basic Information -->
                        <div class="col-md-6">
                            <h6 class="mb-3">Basic Information</h6>
                            <table class="table">
                                <tr>
                                    <th>Property Code</th>
                                    <td>{{ $property->property_code }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $property->name }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $property->description }}</td>
                                </tr>
                                <tr>
                                    <th>Type</th>
                                    <td>{{ ucfirst($property->type) }}</td>
                                </tr>
                                <tr>
                                    <th>Property Type</th>
                                    <td>{{ ucfirst($property->property_type) }}</td>
                                </tr>

                                <tr>
                                    <th>Availability</th>
                                    <td>{{ ucfirst($property->availability) }}</td>
                                </tr>
                            </table>
                        </div>

                        <!-- Location Information -->
                        <div class="col-md-6">
                            <h6 class="mb-3">Location Information</h6>
                            <table class="table">
                                <tr>
                                    <th>Country</th>
                                    <td>{{ $property->country }}</td>
                                </tr>
                                <tr>
                                    <th>Province</th>
                                    <td>{{ $property->province }}</td>
                                </tr>
                                <tr>
                                    <th>District</th>
                                    <td>{{ $property->district }}</td>
                                </tr>
                                <tr>
                                    <th>Sector</th>
                                    <td>{{ $property->sector }}</td>
                                </tr>
                                <tr>
                                    <th>Cell</th>
                                    <td>{{ $property->cell }}</td>
                                </tr>
                                <tr>
                                    <th>Village</th>
                                    <td>{{ $property->village }}</td>
                                </tr>
                                <tr>
                                    <th>House Number</th>
                                    <td>{{ $property->house }}</td>
                                </tr>
                                @if($property->map_link)
                                    <tr>
                                        <th>Map Link</th>
                                        <td>
                                            <a href="{{ $property->map_link }}" target="_blank" class="btn btn-sm btn-info">
                                                View on Map
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            </table>
                        </div>

                        <!-- Property Details -->
                        <div class="mt-4 col-md-6">
                            <h6 class="mb-3">Property Details</h6>
                            <table class="table">
                                <tr>
                                    <th>Size</th>
                                    <td>{{ $property->size }} m²</td>
                                </tr>
                                <tr>
                                    <th>Floor</th>
                                    <td>{{ $property->floor }}</td>
                                </tr>
                                <tr>
                                    <th>Total Rooms</th>
                                    <td>{{ $property->room }}</td>
                                </tr>
                                <tr>
                                    <th>Bedrooms</th>
                                    <td>{{ $property->bedrooms }}</td>
                                </tr>
                                <tr>
                                    <th>Bathrooms</th>
                                    <td>{{ $property->bathroom }}</td>
                                </tr>
                                <tr>
                                    <th>Kitchens</th>
                                    <td>{{ $property->kitchen }}</td>
                                </tr>
                                <tr>
                                    <th>Dining Rooms</th>
                                    <td>{{ $property->dining_room }}</td>
                                </tr>
                            </table>
                        </div>

                        <!-- Additional Details -->
                        <div class="mt-4 col-md-6">
                            <h6 class="mb-3">Additional Details</h6>
                            <table class="table">
                                <tr>
                                    <th>Price</th>
                                    <td>{{ $property->currency }} {{ number_format($property->price, 2) }}</td>
                                </tr>
                                <tr>
                                    <th>Year of Construction</th>
                                    <td>{{ $property->year_of_construction }}</td>
                                </tr>
                                <tr>
                                    <th>Construction Type</th>
                                    <td>{{ ucfirst($property->construction_type) }}</td>
                                </tr>
                                @if($property->amenities)
                                    <tr>
                                        <th>Amenities</th>
                                        <td>
                                            @foreach($property->amenities as $amenity)
                                                <span class="badge bg-info me-1">{{ $amenity }}</span>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endif
                            </table>
                        </div>

                        <!-- Additional Images -->
                        @if($property->images)
                            @php
                                $images = is_string($property->images) ? json_decode($property->images, true) : $property->images;
                            @endphp
                            @if(is_array($images) && count($images) > 0)
                                <div class="mt-4 col-12">
                                    <h6 class="mb-3">Additional Images</h6>
                                    <div class="row">
                                        @foreach($images as $image)
                                            <div class="mb-3 col-md-3">
                                                <img src="{{ asset($image) }}" alt="Property Image" class="img-thumbnail" style="max-height: 200px; width: 100%; object-fit: cover;">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
