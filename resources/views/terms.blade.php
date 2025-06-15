@extends('layouts.web')

<style>
    .terms-card {
        background-color: white;
        border-radius: 3px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        margin-top: 30px;
        margin-bottom: 30px;
        overflow: hidden;
    }

    .terms-header {
        background-color: green;
        color: white;
        padding: 20px;
        text-align: center;
    }

    .terms-header h2 {
        margin: 0;
    }

    .terms-card-header {
        background-color: #f1f1f1;
        padding: 20px;
        text-align: center;
    }

    .terms-card-footer {
        background-color: #f1f1f1;
        padding: 20px;
        text-align: center;
    }

    .collapse-header {
        font-weight: bold;
        cursor: pointer;
        background-color: #007bff;
        color: white;
        padding: 10px;
        border-radius: 1px;
        margin-bottom: 10px;
        text-align: center;
    }

    .collapse-header:hover {
        background-color: #0056b3;
    }

    .card {
        margin-bottom: 10px;
    }

    .card-header {
        background-color: #f8f9fa;
        cursor: pointer;
    }

    .card-body {
        padding: 20px;
    }

    button:focus {
        outline: none !important;
        box-shadow: none !important;
        border-color: none !important;
        
    }
    .btn-link{
        color: green !important;
    }
    button.active {
        text-decoration: none !important;
    }
</style>

@section('content')
    <section class="hero text-white text-center py-5">
        <div class="container">
            <h1 class="display-4">TUZA ASSETS Ltd</h1>
            <p1>{{ __('terms.title') }}</p1>
        </div>
    </section>
    <section class="policy-section">
        <div class="container">
            <div class="terms-card">
                <div class="terms-header">
                    <h2>{{ __('terms.title') }}</h2>
                </div>
                <div class="terms-card-header">
                    <p>{{ __('terms.welcome') }}</p>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div id="accordion1">
                                <!-- Introduction -->
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link">
                                                {{ __('terms.introduction_title') }}
                                            </button>
                                        </h5>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion1">
                                        <div class="card-body">
                                            <p>{{ __('terms.introduction_content') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Property Management Services -->
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link">
                                                {{ __('terms.property_services_title') }}
                                            </button>
                                        </h5>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion1">
                                        <div class="card-body">
                                            <p>{{ __('terms.property_services_content') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Client Obligations -->
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link">
                                                {{ __('terms.client_obligations_title') }}
                                            </button>
                                        </h5>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion1">
                                        <div class="card-body">
                                            <p>{{ __('terms.client_obligations_content') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tenant Obligations -->
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between" id="headingFour" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link">
                                                {{ __('terms.tenant_obligations_title') }}
                                            </button>
                                        </h5>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion1">
                                        <div class="card-body">
                                            <p>{{ __('terms.tenant_obligations_content') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Payment and Fees -->
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between" id="headingFive" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link">
                                                {{ __('terms.payment_fees_title') }}
                                            </button>
                                        </h5>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion1">
                                        <div class="card-body">
                                            <p>{{ __('terms.payment_fees_content') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div id="accordion2">
                                <!-- Confidentiality -->
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between" id="headingSix" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link">
                                                {{ __('terms.confidentiality_title') }}
                                            </button>
                                        </h5>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion2">
                                        <div class="card-body">
                                            <p>{{ __('terms.confidentiality_content') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Property Inspections -->
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between" id="headingSeven" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link">
                                                {{ __('terms.property_inspections_title') }}
                                            </button>
                                        </h5>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion2">
                                        <div class="card-body">
                                            <p>{{ __('terms.property_inspections_content') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Dispute Resolution -->
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between" id="headingEight" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link">
                                                {{ __('terms.dispute_resolution_title') }}
                                            </button>
                                        </h5>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion2">
                                        <div class="card-body">
                                            <p>{{ __('terms.dispute_resolution_content') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Intellectual Property -->
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between" id="headingNine" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link">
                                                {{ __('terms.intellectual_property_title') }}
                                            </button>
                                        </h5>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                    <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion2">
                                        <div class="card-body">
                                            <p>{{ __('terms.intellectual_property_content') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Amendments -->
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between" id="headingTen" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link">
                                                {{ __('terms.amendments_title') }}
                                            </button>
                                        </h5>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                    <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordion2">
                                        <div class="card-body">
                                            <p>{{ __('terms.amendments_content') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Governing Law -->
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between" id="headingEleven" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link">
                                                {{ __('terms.governing_law_title') }}
                                            </button>
                                        </h5>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                    <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-parent="#accordion2">
                                        <div class="card-body">
                                            <p>{{ __('terms.governing_law_content') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="terms-card-footer">
                    <p>{{ __('terms.footer_content') }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
