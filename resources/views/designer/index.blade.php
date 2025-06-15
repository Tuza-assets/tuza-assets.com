@extends('layouts.dashboard.app')

@section('content')
    <div class="p-4 bg-white ">
        <div class="p-4 bg-white border-gray-200 border border-dashed shadow-md  dark:border-gray-700">
            <h1 class="text-2xl font-bold mb-6">Designs</h1> 
            <a href="{{ route('designs.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Create New Design</a>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 mt-4">
                @foreach($designs as $design)
                    <div class="bg-white p-4 rounded border ">
                        <h2 class="text-lg font-bold">{{ $design->title }}</h2> 
                        <p class="text-gray-800 font-bold">Price: ${{ $design->price }}</p>
                        @if($design->main_image)
                            <img src="{{ asset('public/' . $design->main_image) }}" alt="{{ $design->title }}" class="w-full h-48 object-cover mt-2 rounded">
                            
                        @endif
                        <div class="flex justify-between mt-4">
                            <div>
                                <a href="{{ route('designs.edit', $design->id) }}" class="bg-green-500 text-white px-2 py-1 rounded">Edit</a>
                            </div>
                            <form action="{{ route('designs.destroy', $design->id) }}" method="POST" onsubmit="return confirmDelete();">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                            </form>
                        </div>


                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this design?');
        }
    </script>
@endsection
