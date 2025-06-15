@extends('layouts.web')

<style>
    /* General Styles */
    body {
        font-family: 'Arial', sans-serif;
        color: #333;
    }

    /* Hero Section */
    .hero {
        background: linear-gradient(to right, #009879, #4CAF50);
        padding: 100px 0;
    }

    .hero h1 {
        font-size: 3rem;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .hero p {
        font-size: 1.2rem;
    }

    /* Content Section */
    .content-section {
        padding: 80px 30px;
        background-color: #f9f9f9;
    }

    .content-section h3 {
        margin-top: 30px;
        color: #045501;
        font-weight: bold;
    }

    .content-section p {
        margin-top: 20px;
        line-height: 1.6;
    }

    .content-section strong {
        color: #333;
        display: block;
        margin-top: 20px;
    }

    .content-section a.btn {
        background-color: #045501;
        margin-top: 40px;
        padding: 10px 20px;
        border-radius: 5px;
        text-transform: uppercase;
        transition: background-color 0.3s ease;
    }

    .content-section a.btn:hover {
        background-color: #033d00;
    }

    /* Card Styles */
    .background {
        background-color: #045501 !important;
    }

    .card {
        border: 2px solid #ED5303 !important; /* Orange border */
        border-radius: 10px; /* Rounded corners */
        transition: transform 0.3s ease; /* Smooth scaling on hover */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        margin-bottom: 20px; /* Space between cards */
    }

    .card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 1.2rem;
        color: #fff;
        padding: 10px 15px;
    }

    .card-header i {
        margin-right: 10px;
        font-size: 1.5rem;
    }

    .card-text {
        font-size: 1rem;
        color: #555;
    }

    /* Feature List */
    .feature-list {
        margin-top: 40px;
        list-style: none;
        padding: 0;
    }

    .feature-list li {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .feature-list i {
        color: #009879;
        margin-right: 15px;
        font-size: 1.5rem;
    }
    a{
        color:green;
    }

    /* Media Queries */
    @media (max-width: 768px) {
        .hero h1 {
            font-size: 2rem;
        }

        .content-section {
            padding: 50px 20px;
        }

        .card {
            margin-bottom: 15px; /* Reduced spacing */
        }

        .card-header {
            font-size: 1rem;
            padding: 10px;
        }

        .card-body {
            font-size: 0.9rem;
        }
    }
</style>

@section('content')
    <!-- Hero Section -->
    <section class="hero text-white text-center">
        <div class="container">
            <h1 class="display-4">TUZA ASSETS Ltd</h1>
            <p class="lead">{{ __('message.legal_issues_facilitation') }}</p>
        </div>
    </section>

    <!-- Content Section -->
    <div class="content-section container-fluid">
        <div class="container">
            <!-- Overview and Details -->
            <div class="row">
                <div class="col-lg-12">
                    <p>{{ __('message.legal_intro') }}</p>
                    <h3>{{ __('message.legal_how_we_help') }}</h3>
                    <p>{{ __('message.legal_help_intro') }}</p>
                    <p>{{ __('message.legal_case_study') }}</p>
                    <div class="row">
                        <!-- Card 1 -->
                        <div class="col-lg-4 col-md-6 col-12 mb-4">
                            <div class="card h-100">
                                <div class="card-header background text-white">
                                    <i class="fas fa-check-circle"></i>
                                    <p>{{ __('message.legal_identify_issues_title') }}</p>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">{{ __('message.legal_identify_issues') }}</p>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Card 2 -->
                        <div class="col-lg-4 col-md-6 col-12 mb-4">
                            <div class="card h-100">
                                <div class="card-header background text-white">
                                    <i class="fas fa-check-circle"></i>
                                    <p>{{ __('message.legal_research_precedents_title') }}</p>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">{{ __('message.legal_research_precedents') }}</p>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Card 3 -->
                        <div class="col-lg-4 col-md-6 col-12 mb-4">
                            <div class="card h-100">
                                <div class="card-header background text-white">
                                    <i class="fas fa-check-circle"></i>
                                    <p>{{ __('message.legal_build_argument_title') }}</p>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">{{ __('message.legal_build_argument') }}</p>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Card 4 -->
                        <div class="col-lg-4 col-md-6 col-12 mb-4">
                            <div class="card h-100">
                                <div class="card-header background text-white">
                                    <i class="fas fa-check-circle"></i>
                                    <p>{{ __('message.legal_anticipate_counterarguments_title') }}</p>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">{{ __('message.legal_anticipate_counterarguments') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p>{{ __('message.legal_final_step') }}</p>

                    <a href="{{ route('Contact') }}" class="btn text-white">{{ __('message.legal_contact_cta') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
