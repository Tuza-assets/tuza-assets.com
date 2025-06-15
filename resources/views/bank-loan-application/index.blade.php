@extends('layouts.web')

@section('content') 
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
            .lead {
                display: none;
            }

            .hero h1 {
                font-size: 2em;
            }
        }
</style>
    <section class="hero text-white text-center py-5">
        <div class="container">
            <h1 class="display-4">TUZA ASSETS Ltd</h1>
            <p class="lead">{{ __('message.landing.title') }}</p>
        </div>
    </section>
    <section>
        <div class="container">
                <h3 class="text-center p-3">{{ __('message.form.applicants_details') }}</h3>
                <div class="stepper">
                    <div class="step active">1</div>
                    <div class="step">2</div>
                    <div class="step">3</div>
                    <div class="step">4</div>
                    <div class="step">5</div>
                    <div class="step">6</div>
                </div>

                <form class="pb-5 pt-3">
                    <div class="form-row row gap-4">
                        <div class="form-group col-md-4">
                            <label for="surname">{{ __('message.form.surname') }}</label>
                            <input type="text" class="form-control" id="surname" placeholder="{{ __('message.form.surname') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="familyName">{{ __('message.form.family_name') }}</label>
                            <input type="text" class="form-control" id="familyName" placeholder="{{ __('message.form.family_name') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="idPassportNo">{{ __('message.form.id_passport_no') }}</label>
                            <input type="text" class="form-control" id="idPassportNo" placeholder="{{ __('message.form.id_passport_no') }}">
                        </div>
                    </div>

                    <div class="form-row row gap-4">
                        <div class="form-group col-md-4">
                            <label for="nationality">{{ __('message.form.nationality') }}</label>
                            <select id="nationality" class="form-control">
                                <option selected>{{ __('message.form.nationality') }}</option>
                                <!-- Add other nationalities as needed -->
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="taxPinNo">{{ __('message.form.tax_pin_no') }}</label>
                            <input type="text" class="form-control" id="taxPinNo" placeholder="{{ __('message.form.tax_pin_no') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="dob">{{ __('message.form.dob') }}</label>
                            <input type="text" class="form-control" id="dob" placeholder="{{ __('message.form.dob') }}">
                        </div>
                    </div>

                    <div class="form-row row gap-4">
                        <div class="form-group col-md-4">
                            <label for="maritalStatus">{{ __('message.form.marital_status') }}</label>
                            <select id="maritalStatus" class="form-control">
                                <option selected>{{ __('message.form.marital_status') }}</option>
                                <!-- Add other marital status options as needed -->
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="matrimonialRegime">{{ __('message.form.matrimonial_regime') }}</label>
                            <input type="text" class="form-control" id="matrimonialRegime" placeholder="{{ __('message.form.matrimonial_regime') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="gender">{{ __('message.form.gender') }}</label>
                            <select id="gender" class="form-control">
                                <option selected>{{ __('message.form.gender') }}</option>
                                <!-- Add other gender options as needed -->
                            </select>
                        </div>
                    </div>

                    <div class="form-row row gap-4">
                        <div class="form-group col-md-4">
                            <label for="spouseName">{{ __('message.form.spouse_name') }}</label>
                            <input type="text" class="form-control" id="spouseName" placeholder="{{ __('message.form.spouse_name') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="spouseDob">{{ __('message.form.spouse_dob') }}</label>
                            <input type="text" class="form-control" id="spouseDob" placeholder="{{ __('message.form.spouse_dob') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="spouseId">{{ __('message.form.spouse_id') }}</label>
                            <input type="text" class="form-control" id="spouseId" placeholder="{{ __('message.form.spouse_id') }}">
                        </div>
                    </div>

                    <div class="form-row row gap-4">
                        <div class="form-group col-md-4">
                            <label for="postalAddress">{{ __('message.form.postal_address') }}</label>
                            <input type="text" class="form-control" id="postalAddress" placeholder="{{ __('message.form.postal_address') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="postalCode">{{ __('message.form.postal_code') }}</label>
                            <input type="text" class="form-control" id="postalCode" placeholder="{{ __('message.form.postal_code') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="homePhone">{{ __('message.form.home_phone') }}</label>
                            <input type="text" class="form-control" id="homePhone" placeholder="{{ __('message.form.home_phone') }}">
                        </div>
                    </div>

                    <div class="form-row row gap-4">
                        <div class="form-group col-md-4">
                            <label for="mobileNo">{{ __('message.form.mobile_no') }}</label>
                            <input type="text" class="form-control" id="mobileNo" placeholder="{{ __('message.form.mobile_no') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="dependents">{{ __('message.form.dependents') }}</label>
                            <input type="number" class="form-control" id="dependents" placeholder="{{ __('message.form.dependents') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="residentialAddress">{{ __('message.form.residential_address') }}</label>
                            <input type="text" class="form-control" id="residentialAddress" placeholder="{{ __('message.form.residential_address') }}">
                        </div>
                    </div>

                    <div class="form-row pb-5 row gap-5">
                        <div class="form-group col-md-4">
                            <label for="email">{{ __('message.form.email') }}</label>
                            <input type="email" class="form-control" id="email" placeholder="{{ __('message.form.email') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nextOfKin">{{ __('message.form.next_of_kin') }}</label>
                            <input type="text" class="form-control" id="nextOfKin" placeholder="{{ __('message.form.next_of_kin') }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nextOfKinTel">{{ __('message.form.next_of_kin_tel') }}</label>
                            <input type="text" class="form-control" id="nextOfKinTel" placeholder="{{ __('message.form.next_of_kin_tel') }}">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-block" style="background-color: #02732A">{{ __('message.form.next_button') }}</button>
                </form>
        </div>
    </section>

    <style>
        .stepper {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            position: relative;
        }
        .stepper::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 2px;
            background-color: #ddd;
            z-index: 1;
        }
        .step {
            z-index: 2;
            background: #fff;
            border: 2px solid #ddd;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            font-weight: bold;
            color: #999;
        }
        .step.active {
            border-color: #28a745;
            color: #28a745;
        }
        .step.completed {
            border-color: #28a745;
            background-color: #28a745;
            color: #fff;
        }
        .step-title {
            margin-top: 10px;
            font-size: 16px;
            text-align: center;
        }
    </style>
@endsection
