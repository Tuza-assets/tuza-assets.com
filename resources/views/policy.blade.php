@extends('layouts.web')
<style>
    .terms-card {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        margin-top: 30px;
        margin-bottom: 30px;
        padding: 20px;
        overflow: hidden;
    }

    .terms-header {
        background-color: #045501;
        color: white;
        padding: 20px;
        text-align: center;
        border-radius: 8px 8px 0 0;
    }

    .terms-header h2 {
        margin: 0;
        font-size: 1.75rem;
    }

    .terms-card-header,
    .terms-card-footer {
        background-color: #f1f1f1;
        padding: 20px;
        text-align: center;
    }


    .card {
        border: 1px solid #ED5303 !important; 
        margin-bottom: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer; /* Make the cursor a pointer */
    }

    .card:hover {
        transform: scale(1.05); /* Zoom effect on hover */
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.2); /* Enhance the shadow on hover */
    }
    .card-header {
        background-color: #045501 !important; 
        cursor: pointer;
        padding: 15px;
        font-size: 1.1rem;
        display: flex;
        color:white;
        align-items: center;
    }

    .card-body {
        padding: 20px;
        border-top: 1px solid #ED5303 !important; 
    }

    button:focus {
        outline: none !important;
        box-shadow: none !important;
        border-color: none !important;
    }

    .btn-link {
        color: green !important;
    }

    button.active {
        text-decoration: none !important;
    }

    .icon {
        margin-right: 10px;
    }

    .card-content {
        padding: 20px;
        border-top: 1px solid #ddd;
    }
    .card-content a{
        color:#045501;
    }
</style>

@section('content')
    <section class="hero text-white text-center py-5" style="background-color: #007bff;">
        <div class="container">
            <h1 class="display-4">TUZA ASSETS Ltd</h1>
            <p>Privacy Policy</p>
        </div>
    </section>

    <section class="policy-section p-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="terms-card">
                        <div class="terms-header">
                            <h2>Privacy Policy Overview</h2>
                        </div>

                        <div class="terms-card-header">
                            <p><i class="fa fa-calendar icon"></i>Last Updated: {{ __('policy.last_updated') }}</p>
                        </div>

                        <div class="card-content">
                            <p>{{__('policy.intro')}}<a href="https://www.tuzaassets.com">https://www.tuzaassets.com</a> {{__('policy.intro2')}}</p>

                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-user icon"></i>Information We Collect
                                </div>
                                <div class="card-body">
                                    <ul>
                                        <li>{!! __('policy.info_we_collect.personal_information') !!}</li>
                                        <li>{!! __('policy.info_we_collect.financial_information') !!}</li>
                                        <li>{!! __('policy.info_we_collect.usage_data') !!}</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-cogs icon"></i>How We Use Your Information
                                </div>
                                <div class="card-body">
                                    <ul>
                                        <li>{!! __('policy.how_we_use.provide_services') !!}</li>
                                        <li>{!! __('policy.how_we_use.communication') !!}</li>
                                        <li>{!! __('policy.how_we_use.website_improvement') !!}</li>
                                        <li>{!! __('policy.how_we_use.compliance') !!}</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-lock icon"></i>Data Protection
                                </div>
                                <div class="card-body">
                                    <p>{!! __('policy.data_protection') !!}</p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-share-alt icon"></i>Data Sharing
                                </div>
                                <div class="card-body">
                                    <p>{!! __('policy.data_sharing') !!}</p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-cookie-bite icon"></i>Cookies and Tracking Technologies
                                </div>
                                <div class="card-body">
                                    <p>{!! __('policy.cookies') !!}</p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-link icon"></i>Third-Party Links
                                </div>
                                <div class="card-body">
                                    <p>{!! __('policy.third_party_links') !!}</p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-child icon"></i>Children’s Privacy
                                </div>
                                <div class="card-body">
                                    <p>{!! __('policy.children_privacy') !!}</p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-user-shield icon"></i>Your Privacy Rights
                                </div>
                                <div class="card-body">
                                    <p>{!! __('policy.privacy_rights') !!}</p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-sync icon"></i>Changes to this Privacy Policy
                                </div>
                                <div class="card-body">
                                    <p>{!! __('policy.policy_changes') !!}</p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-envelope icon"></i>Contact Information
                                </div>
                                <div class="card-body">
                                    <p>{!! __('policy.contact') !!}</p>
                                </div>
                            </div>

                            <div class="terms-card-footer">
                                <p> {!! __('policy.thanks') !!}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
