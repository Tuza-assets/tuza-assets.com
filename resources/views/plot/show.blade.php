@extends('layouts.web')

@section('content')
    <style>
        .img-showcase {
            display: flex;
            width: 100%;
            transition: all 0.5s ease;
        }

        .img-showcase img {
            min-width: 100%;
        }

        .img-item:hover {
            opacity: 0.8;
        }

        .product-title::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            height: 4px;
            width: 80px;
            background: #12263a;
        }

        .social-links a:hover {
            background: #000;
            border-color: transparent;
            color: #fff;
        }
    </style>
    </head>

    <body>
        <section class="hero text-white text-center py-5">
            <div class="container">
                <h1 class="display-4">TUZA ASSETS Ltd</h1>
                <p class="lead">{{ __('message.landing.title') }}</p>
            </div>
        </section>
        <div class="container pt-5 pb-5">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <!-- Card with Image -->
                    <div class="card card-custom mx-auto mt-3">
                        <img src="https://via.placeholder.com/600x500" class="card-img-top" alt="Image Placeholder">
                        <div class="card-body">
                        </div>
                    </div>
                    <!-- Image Showcase -->
                    {{-- <div class="overflow-hidden mt-4">
                    <div class="img-showcase">
                        <img src="{{ $plot['featured_photo'] }}" alt="Plot Image" class="img-fluid">
                    </div>
                </div> --}}
                    <!-- Image Thumbnails -->
                    {{-- <div class="d-flex mt-3">
                    @php
                        $photos = json_decode($plot['photos'], true);
                    @endphp
                    @foreach ($photos as $index => $photo)
                        <div class="img-item">
                            <a href="#" data-id="{{ $index + 1 }}">
                                <img src="https://bid.afrinnovators.co.rw/storage/plot/thumbnail/photos/{{ $photo }}" alt="Thumbnail" class="img-thumbnail w-16 h-16">
                            </a>
                        </div>
                    @endforeach
                </div> --}}
                </div>
                <div class="col-md-6">
                    <!-- Product Content -->
                    <div class="product-content">
                        <div class="product-price mt-3">
                            <p class="last-price text-muted">
                                Min Cost: <span>{{ number_format($plot['min_price']) }} {{ $plot['currency'] }}</span>
                            </p>
                            <p class="last-price text-muted">
                                Max Cost: <span>{{ number_format($plot['max_price']) }} {{ $plot['currency'] }}</span>
                            </p>
                        </div>
                        <div class="product-detail mt-3">
                            <h2 class="text-dark font-weight-bold py-3">About Plot</h2>
                            <p class="text-muted">
                                {!! $plot['descriptions'] !!}
                            </p>
                            <ul class="list-unstyled mt-2 text-muted">
                                <li>Size: {{ number_format($plot['size']) }} {{ $plot['measure'] }}</li>
                                <li>Status: {{ ucfirst($plot['status']) }}</li>
                                <li>Created at: {{ \Carbon\Carbon::parse($plot['created_at'])->format('F d, Y') }}</li>
                            </ul>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="purchase-info mt-2">
                                <a href="https://bid.afrinnovators.co.rw/" class="btn btn-primary">
                                    Bid Now
                                </a>
                            </div>
                            <div class="mt-2">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}"
                                    class="btn btn-success" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}&text={{ urlencode($plot['upi']) }}"
                                    class="btn btn-success" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const imgs = document.querySelectorAll('.img-select a');
            const imgBtns = Array.from(imgs);
            let imgId = 1;

            imgBtns.forEach((imgItem) => {
                imgItem.addEventListener('click', (event) => {
                    event.preventDefault();
                    imgId = imgItem.dataset.id;
                    slideImage();
                });
            });

            function slideImage() {
                const displayWidth = document.querySelector('.img-showcase img').clientWidth;
                document.querySelector('.img-showcase').style.transform = `translateX(${-(imgId - 1) * displayWidth}px)`;
            }
        </script>

        <!-- Optional JavaScript; choose one of the two! -->
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
@endsection
