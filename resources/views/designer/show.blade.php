@extends('layouts.dashboard.app')

@section('content')
    <div class="max-w-6xl mx-auto my-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                
                <div class="main-image-container mb-3 h-96 overflow-hidden rounded-lg">
                    @if (!empty($design->images) && count($design->images) > 0)
                        <figure
                            class="max-w-sm transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
                            <a href="#">
                                <img id="mainImage" src="{{ asset($design->images[0]) }}" class="rounded-lg"
                                    alt="image description">
                            </a>
                        </figure>
                    @else
                        <p>No images available for this design.</p>
                    @endif
                </div>
                <div class="flex mt-3 flex-wrap">
                    @if (!empty($design->images) && count($design->images) > 0)
                        @foreach ($design->images as $image)
                            <div class="thumbnail-item p-2">
                                <a href="#" data-id="{{ $loop->index }}" class="thumbnail-link">
                                    <img src="{{ asset($image) }}" alt="Thumbnail"
                                        class="w-16 h-16 object-cover rounded cursor-pointer">
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div>
                <div class="p-8 bg-white rounded-lg shadow-lg">
                    <div class="relative overflow-hidden mb-4">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                            <h1 class="text-white text-4xl font-bold">{{ $design->title }}</h1>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">{{ $design->description }}</p>
                    <div class="flex items-center justify-between">
                        <p class="text-lg text-gray-800 font-semibold">{{ $design->currency }}{{ $design->price }}</p>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Purchase</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mainImage = document.getElementById('mainImage');
            const thumbnails = document.querySelectorAll('.thumbnail-link');

            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function(event) {
                    event.preventDefault();
                    const imageId = this.dataset.id;
                    const newImage = thumbnails[imageId].querySelector('img').src;
                    mainImage.src = newImage;
                });
            });
        });
    </script>
@endsection
