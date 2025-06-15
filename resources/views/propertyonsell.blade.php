@extends('layouts.web')

@section('content')
<style>
    .feature-list i {
        color: green;
        margin-right: 10px;
    }
    
    .hero {
        min-height: 70vh;
    }

    .hero h1 {
        font-size: 3em;
    }

    @media (max-width: 424px) {
        .hero {
            min-height: 70vh;
        }

        .hero h1 {
            font-size: 1.7em;
        }
    }
</style>

<section class="hero text-white text-center py-5">
    <div class="container">
        <h1 class="display-4 header">TUZA ASSETS Ltd</h1>
        <p1>{{ __('home.PROPERTY_AVAILABLE_FOR_SELL') }}</p1>
    </div>
</section> 
@php
            $response2 = Http::get('http://bid.tuza-assets.com/api/v1/plots-on-sell');
            $plots_on_sell = $response2->json();
            
@endphp
        @if ($plots_on_sell)
            <section class="property-for-sale py-5">
                <div class="container">
                    <h5 class="text-left text-success mb-5 font-weight-bold">{{ __('home.PROPERTY_AVAILABLE_FOR_SELL') }}</h5>
                    <div class="row">
                        @foreach ($plots_on_sell as $property)
                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <img src="{{ $property['featured_photo'] }}" class="card-img-top" alt="Property" style="min-height: 200px; max-height: 200px; width: 100%;">
                                    <div class="card-body pt-2">
                                        <img src="{{ asset('assets/images/5.svg') }}" alt="Location Icon">
                                        <h6 class="">
                                            @php
                                                $locationParts = [];
                                                if (isset($property['province'])) {
                                                    $locationParts[] = $property['province'];
                                                }
                                                if (isset($property['district'])) {
                                                    $locationParts[] = $property['district'];
                                                }
                                                if (isset($property['sector'])) {
                                                    $locationParts[] = $property['sector'];
                                                }
                                                $location = implode(', ', $locationParts);
                                            @endphp
                                            {{ $location }}
                                        </h6>
                                        <p class="m-0 p-0"><strong>Price:</strong> {{ Number::currency($property['price'] ?? 0, in:'RWF') }}</p>
                                        <p class="m-0 p-0"><strong>Size:</strong> {{ number_format($property['size']) }} m<sup>2</sup></p>
                                        <p class="m-0 p-0"><strong>Description:</strong> {!! Str::limit(strip_tags($property['descriptions']), 60) !!}</p>
                                        
                                        <a href="https://bid.tuza-assets.com/plot/{{ $property['id'] }}" target="_blank" class="btn btn-success mt-3 w-100">
                                            <div class="d-flex justify-content-between align-items-end">
                                                <div>{{ __('home.View_more') }}</div>
                                                <div>
                                                    <img src="{{ asset('assets/images/buttonicon.png') }}" alt="View More Icon">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

@endsection
