@extends('layouts.dashboard.app')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="mt-14 rounded-lg border-gray-200 dark:border-gray-700">
            <div class="p-3 bg-white rounded border shadow-md col-lg-12">
                <h1 class="mb-4 text-2xl font-bold uppercase">Property on sell</h1>
                <!-- Updated Create Button -->
                <a href="{{ route('admin.properties.create', ['property_id' => $property->id ?? null]) }}"
                    class="px-4 py-2 font-bold text-white bg-green-500 rounded hover:bg-green-700">
                    Create Property
                </a>
                <table class="mt-4 w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Property_Code</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Description</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">By:</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($properties as $property)
                            <tr>
                                <td class="px-4 py-2 border"> <a href="{{ route('admin.properties.show', $property->id) }}"
                                        class="text-success">{{ $property->property_code }}</a></td>
                                <td class="px-4 py-2 border">{{ $property->name }}</td>
                                <td class="px-4 py-2 border">{!! Str::limit($property->description, 60) !!} <br>
                                    <small>{{ $property->district }}, {{ $property->sector }}, {{ $property->cell }}</small></td>
                                <td class="px-4 py-2 border">{{ $property->status }}</td>
                                <td class="px-4 py-2 border">
                                    @if (isset($property->user_id) && $property->user)
                                        <div>
                                            <h1 class="h5"><strong>By:</strong>{{ $property->user->name }}</h1>
                                        </div>
                                    @else
                                        <div class="container">
                                            <strong>Tuza Assets</strong>
                                        </div>
                                    @endif
                                </td>
                                <td class="gap-2 px-4 py-2 border d-flex justify-spacebetween">
                                    <!-- Updated Edit Button -->
                                    <a href="{{ route('admin.properties.create', ['property_id' => $property->id]) }}"
                                        class="px-4 py-2 font-bold text-white bg-orange-500 rounded hover:bg-orange-700">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.properties.destroy', $property->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-700">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
