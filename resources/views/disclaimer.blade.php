@extends('layouts.web')
<style>
    /* General Styles */
    .full-width-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .container-custom {
        display: flex;
        align-items: center;
        height: 100vh;
    }

    .text-section {
        padding: 20px;
    }

    /* Card Styles */
    .card {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
        margin-bottom: 20px;
        padding: 20px;
        border: none;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer; /* Make the cursor a pointer */
    }

    .card:hover {
        transform: scale(1.05); /* Zoom effect on hover */
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.2); /* Enhance the shadow on hover */
    }

    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #e1e1e1;
        padding: 15px;
        font-size: 1.25rem;
        display: flex;
        align-items: center;
        color: #333;
        border-radius: 8px 8px 0 0;
    }

    .card-body {
        padding: 20px;
        font-size: 1rem;
        color: #555;
    }

    .card-footer {
        background-color: #f8f9fa;
        padding: 15px;
        text-align: center;
        border-radius: 0 0 8px 8px;
    }

    /* Icon Styles */
    .icon {
        margin-right: 10px;
        color: green; /* Change the icon color to green */
    }

    .hero {
        background-color: #007bff;
        color: white;
    }

    /* Accordion Styles */
    .accordion-button {
        background-color: transparent;
    }

    .accordion-button:not(.collapsed) {
        color: green;
        background-color: transparent;
        border: none;
    }
</style>


@section('content')
    <!-- Hero Section -->
    <section class="hero text-white text-center py-5">
        <div class="container">
            <h1 class="display-4">TUZA ASSETS Ltd</h1>
            <p class="lead">{{ __('disclaimer.applicability_disclaimer_title') }}</p>
        </div>
    </section>
    <!-- Disclaimer Section -->
    <section class="disclaimer-section p-5">
        <div class="container">
            <div class="row justify-content-center">
               <div class="col-lg-8">
                    <!-- Applicability Disclaimer Card -->
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-file-alt icon"></i>{{ __('disclaimer.applicability_disclaimer_title') }}
                        </div>
                        <div class="card-body">
                            <p>{{ __('disclaimer.applicability_disclaimer_text') }}</p>
                        </div>
                    </div>

                    <!-- Liability Card -->
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-exclamation-triangle icon"></i>{{ __('disclaimer.liability_title') }}
                        </div>
                        <div class="card-body">
                            <p>{{ __('disclaimer.liability_text') }}</p>
                        </div>
                    </div>

                    <!-- Changes / Updates Card -->
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-sync icon"></i>{{ __('disclaimer.changes_updates_title') }}
                        </div>
                        <div class="card-body">
                            <p>{{ __('disclaimer.changes_updates_text') }}</p>
                        </div>
                    </div>

                    <!-- External Links Card -->
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-link icon"></i>{{ __('disclaimer.external_links_title') }}
                        </div>
                        <div class="card-body">
                            <p>{{ __('disclaimer.external_links_text') }}</p>
                        </div>
                    </div>

                    <!-- Intellectual Property Card -->
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-copyright icon"></i>{{ __('disclaimer.intellectual_property_title') }}
                        </div>
                        <div class="card-body">
                            <p>{{ __('disclaimer.intellectual_property_text') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
