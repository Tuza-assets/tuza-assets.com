@extends('layouts.dashboard.app')

@section('content')

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <h1 class="text-2xl font-bold mb-6">Designs</h1>
            <a href="{{ route('designs.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create New Design</a>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 mt-4">
                @foreach ($designs as $design)
                    <div class="border p-4 rounded">
                        <h2 class="text-xl font-bold">{{ $design->title }}</h2>
                        <p>{{ $design->description }}</p>
                        <p class="text-lg font-bold">${{ $design->price }}</p>
                        @if ($design->main_image)
                            <img src="{{ asset('/' . $design->main_image) }}" alt="{{ $design->title }}"
                                class="w-full h-auto mt-4">
                        @endif
                        <div class="flex justify-between mt-4">
                            <a href="{{ route('designs.show', $design) }}"
                                class="bg-blue-500 text-white px-4 py-2 rounded inline-block">View</a>
                            <a href="{{ route('designs.edit', $design) }}"
                                class="bg-yellow-500 text-white px-4 py-2 rounded inline-block">Edit</a>
                            <form action="{{ route('designs.destroy', $design->id) }}" method="POST"
                                onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
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
