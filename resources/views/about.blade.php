@extends('layouts.web')
<style>
    .faq-section .card-body {
        display: none;
        transition: max-height 0.3s ease;
    }

    .faq-section .card-body.show {
        display: block;
    }

    .card-border {
        border-right: 1px solid #1D940F;
    }
 
 .card-border {
     color:black;
 }
  .card-border1 {
     color:black;
 }
 
 
.text-success {
    color: #1D940F;
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

    .btn-success {
        background: #1D940F;
    }

    .text-success {
        color: #1D940F;
    }
</style>
@section('content')
    <section class="hero text-white text-center py-5">
        <div class="container">
            <h1 class="display-4">TUZA ASSETS Ltd</h1>
            <p class="lead">{{ __('message.about_us') }}</p>
        </div>
    </section>


    <section class="section-background">
        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>{{ __('message.about-us-head.head') }}</h2>
                            <p class="text-left">{{ __('message.about-us-p.description') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row gap-3 bg-white text-success">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 card-border" style="padding-top:4rem">
                            <div class="icon-box ">
                                <img style="width: 35px" src="{{ asset('assets/images/word.svg') }}" alt="Mission Icon">
                                <h5 class="font-weight-bold mb-2  " style="color:#EE6016">{{ __('message.mission.title') }}</h5>
                                <div style=" padding-top:1rem">
                                    <p style="text-align: left;">
                                        {{ __('message.mission.description') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 card-border" style="padding-top:4rem">
                            <div class="icon-box">
                                <img style="width: 35px" src="{{ asset('assets/images/eye-scan_svgrepo.com.svg') }}"
                                    alt="Vision Icon">
                                <h5 class="font-weight-bold mb-2  " style="color:#EE6016">{{ __('message.vision.title') }}</h5>
                                <div style=" padding-top:1rem">
                                    <p style="text-align: left;">{{ __('message.vision.description') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3  card-border" style="padding-top:4rem">
                            <div class="icon-box">
                                <img style="width: 35px"
                                    src="{{ asset('assets/images/value-proposition-offer-value-submit-a-proposal-offer-a-benefit_svgrepo.com.svg') }}"
                                    alt="Values Icon">
                               <h5 class="font-weight-bold mb-2" style="color:#EE6016">{{ __('message.values.title') }}</h5>
                                <div style=" padding-top:1rem">
                                    <p style="text-align: left;">{{ __('message.values.description') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 card-border1" style="padding-top:4rem">
                            <div class="icon-box">
                                <img style="width: 35px"
                                    src="{{ asset('assets/images/plan-a-trip-think_svgrepo.com.svg') }}" alt="Motto Icon">
                             <h5 class="font-weight-bold mb-2 " style="color:#EE6016">{{ __('message.motto.title') }}</h5>
                                <div style=" padding-top:1rem">
                                    <p style="text-align: left;">{{ __('message.motto.description') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="section-background">
        <div class="container">
            <h2>{{ __('message.why-tuza-assets') }}</h2>
            <p>{{ __('message.why-tuza-assets-description') }}</p>
    </section>

    <!--@include('layouts.howitwork.howitwork')-->
    <!-- Team Section -->
    <section class="team-section ">
        <div class="container py-4">
            <h2 class="text-center mb-5 mt-3 font-weight-bold text-success">{{ __('message.our-team') }}</h2>
            <div class="row justify-content-center">
                 <div class="col-md-3"></div>
                <div class="col-md-3 team-member text-center">
                                        <img src="{{ asset('assets/images/manager.png') }}" style="width:100%;height:400px" class="img-thumbnail border-0 border-none" alt="Team Member 1">
                    <h5 class="mt-2">ERIC SEKANYANYA</h5>
                    <p>CEO (Chief Executive Officer) / Founder</p>
                    <p><a href="mailto:eric.sekanyana@tuza-assets.com">    <i class="fa fa-envelope"></i> eric.sekanyana@tuza-assets.com</a></p>
                    
                </div>
                
                <div class="col-md-3 team-  text-center">
                    <img src="{{ asset('assets/images/25.png') }}"   style="width:100%;height:400px" class="img-thumbnail border-0 border-none" alt="Team Member 5">
                    <h5 class="mt-2">CASSIEN NSENGUMVA</h5>
                      <p>CFO ( Chief Finance Officer)</p>
                    <p><a href="mailto:cassien@tuza-assets.com">
                        <i class="fa fa-envelope"></i>
                        cassien@tuza-assets.com</a></p>
                </div>
                <div class="col-md-3"></div>
                
                <div class="col-md-3 team-member text-center">
                    <img src="{{ asset('assets/images/team.png') }}"   style="width:100%;height:400px" class="img-thumbnail border-0 border-none" class="img-fluid"  alt="Team Member 2">
                    <h5 class="mt-2">BJÖRN LAMMENS</h5>
                    <p>Technical / System Manager</p>
                    <p><a href="mailto:bjorn@tuza-assets.com">
                           <i class="fa fa-envelope"></i> bjorn@tuza-assets.com</a></p>
                </div>
                <div class="col-md-3 team-member text-center">
                    <img src="{{ asset('assets/images/27.png') }}"   style="width:100%;height:400px" class="img-thumbnail border-0 border-none"  alt="Team Member 3">
                    <h5 class="mt-2">UWASE ASSOUMPTA</h5>
                    <p>Country Representative</p>
                    <p><a href="mailto:info@tuza-assets.com">
                           <i class="fa fa-envelope"></i> info@tuza-assets.com</a></p>
                </div>
                <div class="col-md-3 team-member text-center">
                    <img src="{{ asset('assets/images/26.png') }}"  style="width:100%;height:400px" class="img-thumbnail border-0 border-none" alt="Team Member 4">
                    <h5 class="mt-2">WILL GOODHAND</h5>
                    <p>PR Marketing Specialist</p>
                    <p><a href="mailto:marketing@tuza-assets.com">
                          <i class="fa fa-envelope"></i> marketing@tuza-assets.com</a></p>
                </div>

            </div>
        </div>
    </section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
@endsection
