@php
    $properties = \App\Models\PropertyOnSell::whereNotNull('user_id')->get();
@endphp

<style>
    .text-primary{
        color: orangered !important;
    }
</style>

@if ($properties instanceof \Illuminate\Support\Collection && $properties->count() > 0)
    <section>
        <div class="py-0 my-0 row">
            <div class="py-0 my-0 col-1"></div>
            <div class="py-0 my-0 col-10">
                <a href="https://www.tuza-assets.com/en/property-on-sell">
                    <h5 class="text-left text-success font-weight-bold">HOUSE FOR SALE</h5>
                </a>
                <p class="mb-5 text-left">
                    Explore a selection of properties available through Tuza Assets, showcasing diverse options
                    tailored to
                    your needs.
                </p>
            </div>
        </div>
        <div class="px-5">
            <!-- Swiper for Large Screens -->
            <swiper-container class="green-swiper large-swiper mySwiper" navigation="true">
                @foreach ($properties->chunk(4) as $chunk)
                    <swiper-slide class="text-success">
                        <div class="px-5 row">
                            @foreach ($chunk as $property)
                                @php
                                    // Determine the first image
                                    $images = is_string($property->images)
                                        ? json_decode($property->images, true)
                                        : $property->images;
                                    $firstImage = 'assets/images/default-image.jpg'; // Default fallback image
                                    if (is_array($images) && !empty($images)) {
                                        $firstImage = isset($images[0]['path'])
                                            ? $images[0]['path']
                                            : (is_string($images[0])
                                                ? $images[0]
                                                : 'assets/images/default-image.jpg');
                                    }
                                @endphp
                                <div class="mb-4 col-3">
                                    <a href="{{ route('new-propertyonselldetail', $property->id) }}"
                                        class="text-decoration-none">
                                    <div class="border-0 shadow card rounded-4 h-100">
                                        <div class="position-relative">
                                            <img src="{{ asset($firstImage) }}" class="card-img-top rounded-top-4"
                                                style="height: 200px; object-fit: cover;">
                                        </div>
                                        <span class="px-4 py-2 shadow-sm badge bg-light text-dark"
                                            style="font-size: 1rem;">
                                            {{ strtoupper($property->property_type) }}
                                        </span>

                                        <div class="text-center card-body">
                                            <h5 class="mb-1 text-black card-title fw-bold" style="color: #000;">
                                                {{ $property->name }}</h5>
                                            <p class="mb-2 text-muted" style="font-size: 0.95rem;">
                                                <i class="fas fa-map-marker-alt"></i>
                                                {{ $property->address ?? $property->district . ', ' . $property->sector . ', ' . $property->village}}
                                            </p>
                                            <div class="mb-3">
                                                <span class="fw-bold text-primary" style="font-size: 1.3rem;">
                                                    {{ $property->currency }}{{ number_format($property->price, 0) }}
                                                </span>
                                            </div>
                                            <div class="pt-2 d-flex justify-content-between text-muted border-top"
                                                style="font-size: 0.95rem;">
                                                <span>{{ ucfirst($property->type ?? '') }}</span>,
                                                <span>{{ ucfirst($property->availability ?? '') }}</span>,
                                                <span><i class="fas fa-ruler-combined"></i>
                                                    {{ $property->size ?? 'N/A' }} Sqm</span>
                                            </div>

                                        </div>
                                    </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </swiper-slide>
                @endforeach
            </swiper-container>
        </div>
        <!-- Swiper for Small Screens -->
        <swiper-container class="green-swiper small-swiper mySwiper">
            @foreach ($properties as $property)
                <swiper-slide>
                    <div class="property-card">
                        <a href="{{ route('new-propertyonselldetail', $property->id) }}" class="text-decoration-none">
                            <div class="overflow-hidden text-white card h-100">
                                <div class="card-img-top zoom-image"
                                    style="background: url('{{ asset('public/' . $firstImage) }}') center/cover no-repeat; height: 280px;">
                                </div>
                                <div class="card-body">
                                    <div class="pb-3 text-success">
                                        <div>
                                            <i class="fas fa-home"></i><span style="font-size:12px;"
                                                class="px-3">{{ $property->name }}</span>
                                        </div>
                                        <div>
                                            <i class="fas fa-tag"></i>
                                            <span style="font-size:12px;"
                                                class="px-3">{{ $property->property_code ?? '' }}</span>
                                        </div>
                                        <div>
                                            <i class="fas fa-map-marker-alt"></i><span style="font-size:12px;"
                                                class="px-3">{{ $property->district }}</span>
                                        </div>
                                    </div>
                                    <h5 class="card-title text-dark">{{ $property->name }}</h5>
                                    <p class="card-text text-muted" style="font-size:15px;">
                                        {!! Str::limit($property->description, 100) !!}
                                    </p>
                                    <a href="{{ route('new-propertyonselldetail', $property->id) }}"
                                        class="p-0 btn btn-link text-success">Details →</a>
                                </div>
                            </div>
                        </a>
                    </div>
                </swiper-slide>
            @endforeach
        </swiper-container>
    </section>
@else
    <p>No properties available at this time.</p>
@endif
