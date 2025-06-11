@extends('layouts.web')

@section('content')
<section>
    <div style="background-image: url('{{ asset('assets/images/plote.jpg') }}'); background-size: cover; background-position: center;">
        <div class="min-vh-100 d-flex align-items-center justify-content-center bg-overlay ">
            <div class="container mt-5 rental-collection p-5">
                <h2 class="font-weight-bold pb-5 pt-5">{{ __('rental-collection.head') }}</h2>
                <div class="row">
                    <div class="col-md-8 content">
                        <p>{{ __('rental-collection.description') }}</p>
                        <a href="{{ __('rental-collection.button_link') }}" class="btn btn-custom">{{ __('rental-collection.button_text') }}</a>
                    </div>
                    <div class="col-md-4 image">
                        <img src="{{ asset('assets/images/residential-buildings.jpg') }}" alt="{{ __('rental-collection.image_alt') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .rental-collection {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .rental-collection .image img {
        max-width: 100%;
        border-radius: 5px;
    }
    .rental-collection .content {
        padding: 20px;
    }
    .rental-collection .btn-custom {
        background-color: #ff6600;
        color: #fff;
        border: none;
        padding: 10px 20px;
        font-size: 1rem;
        font-weight: bold;
    }
    .rental-collection .btn-custom:hover {
        background-color: #e55c00;
        color: #fff;
    }
</style>
@endsection
