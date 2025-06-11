@extends('layouts.web')
<style>
    .feature-list i {
        color: green;
        margin-right: 10px;
    }
</style>
@section('content')
<style>
    <style type="text/css">
        .hero {
            min-height: 70vh;
        }

        .hero h1 {
            font-size: 3em;


        }  
        @media (max-width: 424px) {
            .header{
                margin-top:40px;
            } 

            .hero h1 {
                font-size: 2em;
            }
        }
 
        .facilitation-section {
            padding: 20px;
        }

        .facilitation-section img {
            width: 100%;
            height: auto;
        }

        .facilitation-section h2 {
            margin-top: 20px;
        }

        .facilitation-section p {
            margin-top: 10px;
        }

        .btn-custom {
            margin-top: 20px;
        }
        h4{
            font-size: 20px;
            color: #045501;
        }
    </style>
    <section class="hero text-white text-center py-5">
        <div class="container">
            <h1 class="display-4">{{ __('message.hero_title') }}</h1>
            <p1>{{ __('message.hero_subtitle') }}</p1>
        </div>
    </section>
    
    <div class="container facilitation-section pb-5" style="padding-top: 100px">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('/assets/images/property-insurance-1005x670.jpg') }}" alt="Insurance Image">
            </div>
            <div class="col-md-6">
                <h4 class="font-weight-bold">{{ __('message.facilitation_intro') }}</h4>
                <p>{{ __('message.facilitation_description') }}</p>
                <h4 class="font-weight-bold">{{ __('message.why_need_title') }}</h4>
                <p>{{ __('message.why_need_description') }}</p>
                <h4 class="font-weight-bold">{{ __('message.how_help_title') }}</h4>
                <p>{{ __('message.how_help_description') }}</p>
                <a href="{{ route('Contact') }}" class="btn btn-custom text-white" style="background-color: #045501;">{{ __('message.facilitation_cta') }}</a>
            </div>
        </div>
    </div>

@endsection
