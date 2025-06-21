@extends('layouts.dashboard.app')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="mt-14 rounded-lg border-gray-200 dark:border-gray-700">
            <div class="p-4 bg-white border border-gray-200 border-dashed shadow-md dark:border-gray-700">
                <h1 class="mb-6 text-2xl font-bold">Designs</h1>
                <a href="{{ route('designs.create') }}" class="px-4 py-2 text-white bg-green-500 rounded">Create New
                    Design</a>
                <div class="grid grid-cols-1 gap-4 mt-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                    @foreach ($designs as $design)
                        <div class="p-4 bg-white rounded border">
                            <h2 class="text-lg font-bold">{{ $design->title }}</h2>
                            <p class="font-bold text-gray-800">Price: ${{ $design->price }}</p>
                            @if ($design->main_image)
                                <img src="{{ asset('public/' . $design->main_image) }}" alt="{{ $design->title }}"
                                    class="object-cover mt-2 w-full h-48 rounded">
                            @endif
                            <div class="flex justify-between mt-4">
                                <div>
                                    <a href="{{ route('designs.edit', $design->id) }}"
                                        class="px-2 py-1 text-white bg-green-500 rounded">Edit</a>
                                </div>
                                <form action="{{ route('designs.destroy', $design->id) }}" method="POST"
                                    onsubmit="return confirmDelete();">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-2 py-1 text-white bg-red-500 rounded">Delete</button>
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
