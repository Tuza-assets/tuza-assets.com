@extends('layouts.dashboard.app')

@section('content')
    <div class="max-w-6xl mx-auto my-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <div class="overflow-hidden">
                    <div class="img-showcase">
                        @if (!empty($design->images) && count($design->images) > 0)
                            @foreach ($design->images as $image)
                                <img src="{{ asset($image) }}" alt="Product Image" data-id="{{ $loop->index + 1 }}">
                            @endforeach
                        @else
                            <p class="p-4">No images available for this design.</p>
                        @endif
                    </div>
                </div>
                <div class="flex mt-3">
                    @if (!empty($design->images) && count($design->images) > 0)
                        @foreach ($design->images as $image)
                            <div class="img-item">
                                <a href="#" data-id="{{ $loop->index + 1 }}">
                                    <img src="{{ asset($image) }}" alt="Thumbnail" class="w-16 h-16 object-cover">
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div>
                <div class="p-8 bg-white rounded-lg shadow-lg">
                    <div class="relative overflow-hidden">
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
            const imgs = document.querySelectorAll('.img-item a');
            const imgBtns = [...imgs];
            let imgId = 1;

            imgBtns.forEach((imgItem) => {
                imgItem.addEventListener('click', (event) => {
                    event.preventDefault();
                    imgId = imgItem.dataset.id;
                    slideImage();
                });
            });

            function slideImage() {
                const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;
                document.querySelector('.img-showcase').style.transform = `translateX(${-(imgId - 1) * displayWidth}px)`;
            }
        });
    </script>
@endsection
