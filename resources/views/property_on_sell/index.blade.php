@extends('layouts.dashboard.app')

@section('content')
    <div class="container-fluid bg-white">
        <div class="row ">
            <div class="col-lg-12 rounded border  bg-white shadow-md p-3">
                     <h1 class="text-2xl font-bold mb-4">Property on sell</h1>
                <!-- Updated Create Button -->
        <a href="{{ route('admin.properties.create', ['property_id' => $property->id ?? null]) }}" 
           class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
           Create Property
        </a>
        
        <table class="table-auto w-full mt-4">
            <thead>
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Description</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>   
            </thead>
            <tbody>   
                @foreach ($properties as $property)       
                <tr>
                    <td class="border px-4 py-2">{{ $property->name }}</td>
                    <td class="border px-4 py-2">{!! Str::limit($property->description, 60) !!} </td>
                    <td class="border px-4 py-2">{{ $property->status }}</td>
                    <td class="border px-4 py-2 d-flex justify-spacebetween gap-2" >
                        <a href="{{ route('admin.properties.show', $property->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">View</a>
                       <!-- Updated Edit Button -->  
                        <a href="{{ route('admin.properties.create', ['property_id' => $property->id]) }}" 
                           class="bg-orange-500 hover:bg-orange-700   text-white font-bold py-2 px-4 rounded">
                           Edit
                        </a>   

                        <form action="{{ route('admin.properties.destroy', $property->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
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