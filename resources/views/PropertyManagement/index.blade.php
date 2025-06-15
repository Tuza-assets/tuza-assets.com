@extends('layouts.web')
<style>
 .card-custom {
    border: 2px solid #ED5303;
    border-radius: 10px;
    padding: 10px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.card-custom:hover {
    transform: scale(1.05);
    cursor:pointer;
}

.card-custom h5 {
    color: #045501;
    margin-bottom: 10px;
    font-weight: bold;
}

.card-custom p {
    color: #333;
}
</style>

@section('content')

@include('layouts.slider.guid')

    <section class="hero text-white text-center">
        <div class="container">
            <h1 class="display-4">TUZA ASSETS Ltd</h1>
            <p class="lead">{{ __('message.property_management') }}</p>
            <div class="carousel pt-10">
                <!--<a href="{{ route('all_property') }}" class="btn btn-light">{{ __('message.get_started_button') }}</a>-->
                <a href="https://property.tuza-assets.com/register" target="_blank"  style="background-color: #ED5303; border: none; color: white;"  class="btn">{{ __('message.get_started_button') }}</a>
            </div>
        </div>
    </section>

    <div class="container mt-5">
        <div class="row mb-2 px-4">
            <div class="col-md-6">
                <img src="{{ asset('/assets/images/444.jpg') }}" class="img-fluid" alt="Living Room">
            </div>
            <div class="col-md-6 pl-lg-5 pl-md-4">
                <div class="card-custom">
                <p>{{ __('message.property_manager_intro') }}</p>
                 </div>
            </div>
        </div>

        <section >
            <div class="container">
                <div class="row gap-4 align-items-center">
                    <div class="col-md-6">
                         <div class="card-custom">
                            <h5>TUZA ASSETS</h5>
                            <p>{{ __('message.property_manager_intro2') }}</p>
                        </div>
                    </div>
                    <div class="col-md-6 pl-lg-5 pl-md-4">
                        <div class="video-wrapper pt-5">
                            <video width="100%" height="100%" controls>
                                <source src="{{ asset(__('message.property_management_video')) }}" type="video/mp4">
                                <source src="{{ asset(__('message.property_management_video')) }}" type="video/ogg">
                            </video>
                        </div>
                    </div>
                </div>
        </section>

        <div class="row py-5 px-4">
            <div class="col-md-6 d-none d-md-block" id="backgroundDiv">
            </div>
            <div class="col-md-6 pl-lg-5 pl-md-4">
                <h5 class="pb-4 ">{{ __('message.Contact_Us') }}</h3>
                    <form method="POST" action="{{ route('contact-us') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name" class="form-label">{{ __('message.contact_name_label') }}</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email" class="form-label">{{ __('message.contact_email_label') }}</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="tel" class="form-label">{{ __('message.contact_tel_label') }}</label>
                            <input type="tel" class="form-control" name="tel" id="tel" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">{{ __('message.contact_message_label') }}</label>
                            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                        </div>
                        <div>
                           <button type="submit" class="btn text-white btn-block" style="background-color: #045501;">{{ __('message.contact_button') }}</button>
    
                        </div>
                    </form>
            </div>
        </div>

    </div>
    <style>
        input:focus {
            outline: none !important;
            box-shadow: none !important;
            border-color: green !important;
        }

        textarea:focus {
            outline: none !important;
            box-shadow: none !important;
            border-color: green !important;
        }

        input.active {
            text-decoration: none !important;
        }

        textarea.active {
            text-decoration: none !important;
        }

        #backgroundDiv {
            background-image: url('{{ asset('/assets/images/44.jpg') }}');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.collapse').on('shown.bs.collapse', function() {
                $(this).parent().find('.btn-link').addClass('expanded');
                $(this).parent().find('.toggle-icon').text('-');
            }).on('hidden.bs.collapse', function() {
                $(this).parent().find('.btn-link').removeClass('expanded');
                $(this).parent().find('.toggle-icon').text('+');
            });
        });
    </script>
@endsection
