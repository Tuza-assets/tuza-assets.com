
    <section class="container related-properties">
        <h2 class="py-4">Related Properties</h2>
        <div class="row">
            @foreach ($relatedProperties as $related)
                <div class="col-md-3">
                    <div class="mb-4 card">
                        @if ($related->images)
                            @php
                                $relatedImages = is_string($related->images)
                                    ? json_decode($related->images, true)
                                    : $related->images;
                                $relatedImagePath =
                                    is_array($relatedImages) && isset($relatedImages[0]['path'])
                                        ? $relatedImages[0]['path']
                                        : $relatedImages[0];
                            @endphp
                            <div class="py-3 text-white card card-img-top fixed-height-image"
                                style="background-image: url('{{ asset('public/' . $relatedImagePath) }}');
                                background-size: cover; background-position: center;">

                                <!-- Card Content -->
                                <div class="h-64 overflow-hidden card-body">
                                </div>

                                <div class="py-4 card-footer"
                                    style="background-image: url('{{ asset('assets/images/wotermarkimg.png') }}');
                                    background-repeat: no-repeat; background-position: center; background-size: contain;">
                                </div>
                            </div>
                        @else
                            <img src="{{ asset('public/default.jpg') }}" class="card-img-top fixed-height-image"
                                alt="Default Image">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $related->name }}</h5>
                            
                            @if ($related->property_code)
                            <div>
                                {{ $related->property_code ?? '' }}
                            </div>
                            @endif
                            <p class="card-text">{{ number_format($related->price, 2) }} {{ $related->currency }}</p>
                            <a href="{{ route('new-propertyonselldetail', ['id' => $related->id]) }}"
                                class="btn btn-outline-success">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>


