@extends('layouts.dashboard.app')

@section('content')
    <div class="mt-14 rounded-lg border-gray-200 dark:border-gray-700">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
                <div class="overflow-hidden mb-3 h-96 rounded-lg main-image-container">
                    @if (!empty($design->images) && count($design->images) > 0)
                        <figure
                            class="max-w-sm filter grayscale transition-all duration-300 cursor-pointer hover:grayscale-0">
                            <a href="#">
                                <img id="mainImage" src="{{ asset($design->images[0]) }}" class="rounded-lg"
                                    alt="image description">
                            </a>
                        </figure>
                    @else
                        <p>No images available for this design.</p>
                    @endif
                </div>
                <div class="flex flex-wrap mt-3">
                    @if (!empty($design->images) && count($design->images) > 0)
                        @foreach ($design->images as $image)
                            <div class="p-2 thumbnail-item">
                                <a href="#" data-id="{{ $loop->index }}" class="thumbnail-link">
                                    <img src="{{ asset($image) }}" alt="Thumbnail"
                                        class="object-cover w-16 h-16 rounded cursor-pointer">
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div>
                <div class="p-8 bg-white rounded-lg shadow-lg">
                    <div class="overflow-hidden relative mb-4">
                        <div class="flex absolute inset-0 justify-center items-center bg-black bg-opacity-50">
                            <h1 class="text-4xl font-bold text-white">{{ $design->title }}</h1>
                        </div>
                    </div>
                    <p class="mb-4 text-gray-700">{{ $design->description }}</p>
                    <div class="flex justify-between items-center">
                        <p class="text-lg font-semibold text-gray-800">{{ $design->currency }}{{ $design->price }}</p>
                        <button class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Purchase</button>
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
