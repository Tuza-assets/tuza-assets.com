@extends('layouts.web')

 @section('content')
<section>
    <div style="background-image: url('{{ asset('assets/images/plote.jpg') }}'); background-size: cover; background-position: center;">
        <div class="min-vh-100 d-flex align-items-center justify-content-center bg-overlay ">
            <div class="container">
                <div class="container py-5">
                    <div class="row text-bl text-center">
                        <div class="col-md-4 mt-4">
                            <div class="card card-custom h-100" style="border: 3px solid #fe6900; border-radius: 8px;">
                                <div class="card-body">
                                    <img src="{{ asset('assets/images/sale.png') }}" alt="Sell Plot" class="img-fluid mx-auto d-block">
                                    <hr style="border: 1px solid #fe6900; width: 80%;">
                                    <h2 style="color: black">{{ __('message.sellplot') }}</h2>
                                    <p style="color: black">
                                        {{ __('message.sellplot_desc') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <div class="card card-custom h-100" style="border: 3px solid #fe6900; border-radius: 8px;">
                                <div class="card-body">
                                    <img src="{{ asset('assets/images/buyplot.png') }}" alt="Buy Plot"  class="img-fluid mx-auto d-block">
                                    <hr style="border: 1px solid #fe6900; width: 80%;">
                                    <h2 style="color: black"> {{ __('message.buyplot') }}</h2>
                                    <p style="color: black">
                                        {{ __('message.buyplot_desc') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <div class="card card-custom h-100" style="border: 3px solid #fe6900; border-radius: 8px;">
                                <div class="card-body">
                                    <img src="{{ asset('assets/images/bid.png') }}" alt="Bid Plot" class="img-fluid mx-auto d-block">
                                    <hr style="border: 1px solid #fe6900; width: 80%;">
                                    <h2 style="color: black"> {{ __('message.bidplot') }}</h2>
                                    <p style="color: black"> {{ __('message.bidplot_desc') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                 <div class="container py-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="video-container">
                                <iframe 
                                    width="100%" 
                                    height="450" 
                                     src="{{ __('message.video_url') }}"
                                    frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen>
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="text-center p-4">
                    <a href="https://bid.tuza-assets.com/" target="_blank" class="btn text-2xl" style="background-color: #FE6900; color:#ffffff" >{{ __('message.get_start') }}</a>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f4f4f4;
    }

    .bg-overlay {
        background-color: rgba(0, 0, 0, 0.5);
    }

    .text-center h1,
    .text-center p {
        color: white;
    }

    .card-custom {
        border: 3px solid #fe6900;
        border-radius: 8px;
        transition: transform 0.3s, box-shadow 0.3s;
        background-color: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card-custom:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        cursor:pointer;
    }

    .card-body {
        text-align: center;
        padding: 2rem;
    }

    .card-title {
        color: #333;
        font-weight: bold;
    }

    .card-text {
        color: #666;
    }



    .card hr {
        border: 1px solid #fe6900;
        width: 80%;
    }

    .btn-primary {
        background-color: #fe6900;
        border: none;
        font-size: 1.25rem;
        padding: 0.75rem 2rem;
        border-radius: 5px;
        color: white;
        transition: background-color 0.3s, transform 0.3s;
    }

    .btn-primary:hover {
        background-color: #e85e00;
        transform: scale(1.05);
    }
</style>
@endsection
