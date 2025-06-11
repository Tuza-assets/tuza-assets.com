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
        background-color: orange;
        color: white;
        padding: 10px;
        border-radius: 1px;
        margin-bottom: 10px;
        text-align: center;
    }

    .collapse-header:hover {
        background-color: green;
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

    button {
        color: black !important;
        ;
    }

    button:focus {
        outline: none !important;
        box-shadow: none !important;
        border-color: none !important;
        color: orange !important;

    }

    button.active {
        text-decoration: none !important;
        color: orange !important;

    }

    button:hover {
        text-decoration: none !important;
        color: orange !important;

    }
</style>

<section class="policy-section">
    <div class="container">
        <div class="terms-card">
            <div class="terms-header">
                <h5>{{ __('faq.header') }}</h5>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div id="accordion1">
                            <!-- Question 1 -->
                            <div class="card">
                                <div class="card-header d-flex justify-content-between" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link">
                                            {{ __('faq.q1') }}
                                        </button>
                                    </h5>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion1">
                                    <div class="card-body">
                                        <p>{!! __('faq.a1') !!}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Question 2 -->
                            <div class="card">
                                <div class="card-header d-flex justify-content-between" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link">
                                            {{ __('faq.q2') }}
                                        </button>
                                    </h5>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion1">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">{{ __('faq.a2') }}
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="list-group">
                                                    @if(is_array(__('faq.a2.list2')))
                                                        @foreach(__('faq.a2.list2') as $item)
                                                            <li class="list-group-item">{{ $item }}</li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Question 3 -->
                            <div class="card">
                                <div class="card-header d-flex justify-content-between" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link">
                                            {{ __('faq.q3') }}
                                        </button>
                                    </h5>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion1">
                                    <div class="card-body">
                                        <p>{{ __('faq.a3') }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Question 4 -->
                            <div class="card">
                                <div class="card-header d-flex justify-content-between" id="headingFour" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link">
                                            {{ __('faq.q4') }}
                                        </button>
                                    </h5>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion1">
                                    <div class="card-body">
                                        <p>{{ __('faq.a4') }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Question 5 -->
                            <div class="card">
                                <div class="card-header d-flex justify-content-between" id="headingFive" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link">
                                            {{ __('faq.q5') }}
                                        </button>
                                    </h5>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion1">
                                    <div class="card-body">
                                        <p>{!! __('faq.a5') !!}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Question 6 -->
                            <div class="card">
                                <div class="card-header d-flex justify-content-between" id="headingSix" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link">
                                            {{ __('faq.q6') }}
                                        </button>
                                    </h5>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion1">
                                    <div class="card-body">
                                        <p>{!!__('faq.a6') !!}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Question 7 -->
                            <div class="card">
                                <div class="card-header d-flex justify-content-between" id="headingSeven" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link">
                                            {{ __('faq.q7') }}
                                        </button>
                                    </h5>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion1">
                                    <div class="card-body">
                                        <p>{!! __('faq.a7') !!}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Question 8 -->
                            <div class="card">
                                <div class="card-header d-flex justify-content-between" id="headingEight" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link">
                                            {{ __('faq.q8') }}
                                        </button>
                                    </h5>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion1">
                                    <div class="card-body">
                                        <p>{!! __('faq.a8') !!}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                     <div class="col-12 col-md-6">
                        <div id="accordion1">

                            <!-- Question 9 -->
                            <div class="card">
                                <div class="card-header d-flex justify-content-between" id="headingNine" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link">
                                            {{ __('faq.q9') }}
                                        </button>
                                    </h5>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion1">
                                    <div class="card-body">
                                        <p>{{ __('faq.a9') }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Question 10 -->
                            <div class="card">
                                <div class="card-header d-flex justify-content-between" id="headingTen" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link">
                                            {{ __('faq.q10') }}
                                        </button>
                                    </h5>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordion1">
                                    <div class="card-body">
                                        <p>{{ __('faq.a10') }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Question 11 -->
                            <div class="card">
                                <div class="card-header d-flex justify-content-between" id="headingEleven" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link">
                                            {{ __('faq.q11') }}
                                        </button>
                                    </h5>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-parent="#accordion1">
                                    <div class="card-body">
                                        <p>{{ __('faq.a11') }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Question 12 -->
                            <div class="card">
                                <div class="card-header d-flex justify-content-between" id="headingTwelve" data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link">
                                            {{ __('faq.q12') }}
                                        </button>
                                    </h5>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve" data-parent="#accordion1">
                                    <div class="card-body">
                                        <p>{{ __('faq.a12') }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Question 13 -->
                            <div class="card">
                                <div class="card-header d-flex justify-content-between" id="headingThirteen" data-toggle="collapse" data-target="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link">
                                            {{ __('faq.q13') }}
                                        </button>
                                    </h5>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div id="collapseThirteen" class="collapse" aria-labelledby="headingThirteen" data-parent="#accordion1">
                                    <div class="card-body">
                                        <p>{{ __('faq.a13') }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Question 14 -->
                            <div class="card">
                                <div class="card-header d-flex justify-content-between" id="headingFourteen" data-toggle="collapse" data-target="#collapseFourteen" aria-expanded="false" aria-controls="collapseFourteen">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link">
                                            {{ __('faq.q14') }}
                                        </button>
                                    </h5>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div id="collapseFourteen" class="collapse" aria-labelledby="headingFourteen" data-parent="#accordion1">
                                    <div class="card-body">
                                        <p>{{ __('faq.a14') }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Question 16 -->
                            <div class="card">
                                <div class="card-header d-flex justify-content-between" id="headingSixteen" data-toggle="collapse" data-target="#collapseSixteen" aria-expanded="false" aria-controls="collapseSixteen">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link">
                                            {{ __('faq.q16') }}
                                        </button>
                                    </h5>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div id="collapseSixteen" class="collapse" aria-labelledby="headingSixteen" data-parent="#accordion1">
                                    <div class="card-body">
                                        <p>{{ __('faq.a16') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    <script>
        $(document).ready(function() {
            $('.collapse').on('show.bs.collapse', function() {
                $(this).prev('.card-header').find('.fas').removeClass('fa-chevron-down').addClass(
                    'fa-chevron-up');
            }).on('hide.bs.collapse', function() {
                $(this).prev('.card-header').find('.fas').removeClass('fa-chevron-up').addClass(
                    'fa-chevron-down');
            });
        });
    </script>