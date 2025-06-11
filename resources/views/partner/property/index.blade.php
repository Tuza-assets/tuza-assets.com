@extends('layouts.dashboard.app')
@section('content')
    <div class="py-5 mt-5 bg-white container-fluid">
        <div class="row">
            <div class="container p-3 mx-auto col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">My Properties</h5>
                        <a href="{{ route('partner.properties.create') }}" class="btn btn-primary">Add New Property</a>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Property Code</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Price</th>
                                        <th>Availability</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($properties as $property)
                                        <tr>
                                            <td>{{ $property->property_code }}</td>
                                            <td>{{ $property->name }}</td>
                                            <td>{{ $property->property_type }}</td>
                                            <td>{{ $property->currency }} {{ number_format($property->price, 2) }}</td>
                                            <td>
                                                {{ ucfirst($property->availability) }}
                                            </td>
                                            <td>
                                                <div class="flex gap-3 btn-group" role="group">
                                                    <a href="{{ route('partner.properties.show', $property) }}"
                                                        class="btn btn-sm btn-info">View</a>
                                                    <a href="{{ route('partner.properties.edit', $property) }}"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                    <form action="{{ route('partner.properties.destroy', $property) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this property?');"
                                                        style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No properties found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4 d-flex justify-content-center">
                            {{ $properties->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
