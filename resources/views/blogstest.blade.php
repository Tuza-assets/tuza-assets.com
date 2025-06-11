@extends('layouts.web')

@section('content')
    <div class="min-vh-100 d-flex align-items-center justify-content-center">
        <div class="container service-section bg-success">
            <div class="slider">
                <div class="slide-track d-flex">
                    <div class="slide bg-white">
                        <img src="{{ asset('assets/images/sliko.png') }}" height="100" width="250" alt="" />
                        <div class="hover-content">{{ __('logo.services.inspection') }}</div>
                    </div>
                    <div class="slide bg-white">
                        <img src="{{ asset('assets/images/radiant.png') }}" height="100" width="250" alt="" />
                        <div class="hover-content">{{ __('logo.services.insurance') }}</div>
                    </div>
                    <div class="slide bg-white">
                        <img src="{{ asset('assets/images/stractorr.png') }}" height="100" width="250" alt="" />
                        <div class="hover-content">{{ __('logo.services.design') }}</div>
                    </div>
                    <div class="slide bg-white">
                        <img src="{{ asset('assets/images/lighting.png') }}" height="100" width="250" alt="" />
                        <div class="hover-content">{{ __('logo.services.lighting') }}</div>
                    </div>
                    <div class="slide bg-white">
                        <img src="{{ asset('assets/images/consenet.png') }}" height="100" width="250" alt="" />
                        <div class="hover-content">{{ __('logo.services.consultancy') }}</div>
                    </div>
                    <!-- Duplicate slides for continuous loop -->
                    <div class="slide bg-white">
                        <img src="{{ asset('assets/images/sliko.png') }}" height="100" width="250" alt="" />
                        <div class="hover-content">{{ __('logo.services.inspection') }}</div>
                    </div>
                    <div class="slide bg-white">
                        <img src="{{ asset('assets/images/radiant.png') }}" height="100" width="250" alt="" />
                        <div class="hover-content">{{ __('logo.services.insurance') }}</div>
                    </div>
                    <div class="slide bg-white">
                        <img src="{{ asset('assets/images/stractorr.png') }}" height="100" width="250" alt="" />
                        <div class="hover-content">{{ __('logo.services.design') }}</div>
                    </div>
                    <div class="slide bg-white">
                        <img src="{{ asset('assets/images/lighting.png') }}" height="100" width="250" alt="" />
                        <div class="hover-content">{{ __('logo.services.lighting') }}</div>
                    </div>
                    <div class="slide bg-white">
                        <img src="{{ asset('assets/images/consenet.png') }}" height="100" width="250" alt="" />
                        <div class="hover-content">{{ __('logo.services.consultancy') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<style>
    @-webkit-keyframes scroll {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(calc(-250px * 10)); /* Adjust for the number of slides */
        }
    }

    @keyframes scroll {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(calc(-250px * 10)); /* Adjust for the number of slides */
        }
    }

    .slider {
        background: transparent;
        height: 100px;
        margin: auto;
        overflow: hidden;
        position: relative;
        width: 100%;
    }

    .slider::before,
    .slider::after {
        background: transparent;
        content: "";
        height: 100px;
        position: absolute;
        width: 100px;
        z-index: 2;
    }

    .slider::after {
        right: 0;
        top: 0;
        transform: rotateZ(180deg);
    }

    .slider::before {
        left: 0;
        top: 0;
    }

    .slider .slide-track {
        -webkit-animation: scroll 40s linear infinite;
        animation: scroll 40s linear infinite;
        display: flex;
        width: calc(250px * 20); /* Adjust for the number of slides times 2 */
    }

    .slider .slide {
        height: 100px;
        width: 250px;
        position: relative;
    }

    .slide img {
        display: block;
        width: 100%;
        height: 100%;
    }

    .slide .hover-content {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.2); /* Corrected syntax for 20% opacity */
        color: black;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 10px;
        box-sizing: border-box;
        border: 2px solid #FF6600;
    }

    .slide:hover img {
        display: none;
    }

    .slide:hover .hover-content {
        display: flex;
    }

    .d-flex {
        display: flex;
        gap: 2rem;
    }
</style>


@endsection
