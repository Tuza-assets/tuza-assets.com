@extends('layouts.web')
<style>
    .feature-list i {
        color: green;
        margin-right: 10px;
    }
    .heroo {
        background-size: cover;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        min-height: 70%;
        transition: background-image 1s ease-in-out, opacity 1s ease-in-out;
    }

    .heroo::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1;
    }

    .heroo .container {
        position: relative;
        z-index: 2;
    }

    .heroo h1 {
        font-size: 3rem;
        font-weight: bold;
    }

    .heroo p {
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }
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
</style>
@section('content')
    <section class="heroo text-white text-center py-5">
        <div class="container">
            <h1 class="display-4">TUZA ASSETS Ltd</h1>
            <p class="lead">{{ __('message.hero_description') }}</p>
        </div>
    </section>
    <div class="bg-white container-fluid" style="padding: 100px 30px">
        <div class="container">
            <div class="row">
                <div class="col-md-12 row">
                    <div class="col-md-6">
                        <img src="{{ asset('/assets/images/2n.jpg') }}" style="width: 500px; border-radius: 3px;" class="img-fluid" alt="Living Room">
                    </div>
                    <div class="px-4 col-md-6">
                        <div>{{ __('message.property_search_intro') }}</div>

                    </div>
                </div>
                <div class="col-md-6 mt-5">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <h5 class="mb-4">TUZA ASSETS</h5>
                        <div class="mb-4">
                            <ul class="list-unstyled">
                                <li style="padding-bottom:1vh;"><img src="{{ asset('assets/images/2.svg') }}" alt="icon"
                                        style="margin-right: 4px;"><a href="tel:+17047746456"
                                        style="color: black; text-decoration: none;">{{ __('footer.usa') }}</a></li>
                                <li style="padding-bottom:1vh;"><img src="{{ asset('assets/images/2.svg') }}" alt="icon"
                                        style="margin-right: 4px;"><a href="tel:+15819979608"
                                        style="color: black; text-decoration: none;">{{ __('footer.canada') }}</a></li>
                                <li style="padding-bottom:1vh;"><img src="{{ asset('assets/images/2.svg') }}" alt="icon"
                                        style="margin-right: 4px;"><a href="tel:+31 6 86495035"
                                        style="color: black; text-decoration: none;">{{ __('footer.europe') }}</a></li>
                                <li style="padding-bottom:1vh;"><img src="{{ asset('assets/images/2.svg') }}" alt="icon"
                                        style="margin-right: 4px;"><a href="tel:+250785519538"
                                        style="color: black; text-decoration: none;">{{ __('footer.rwanda') }}</a></li>
                                <li style="padding-bottom:1vh;"><img src="{{ asset('assets/images/2.svg') }}" alt="icon"
                                        style="margin-right: 4px;"><a href="tel:+8618805158975"
                                        style="color: black; text-decoration: none;">{{ __('footer.central_asia') }}</a></li>
                                <li><img src="{{ asset('assets/images/3.svg') }}" alt="icon" style="margin-right: 4px;"><a
                                        href="mailto:info@tuza-assets.com"
                                        style="color: black; text-decoration: none;">{{ __('footer.email') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6  mt-5">
                    <h5>{{ __('message.Contact_Us') }}</h5>
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
                <div class="col-lg-6 col-md-6 col-sm-12"></div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                        <a class="btn  btn-success w-100" href="{{ route('Bestkeptsecret') }}" style="background: #045501;padding:10px 20px;margin-top:30px;color:white;" href="">{{__('message.Visit')}}</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const images = ["Diplomate4.jpg", "Diplomate2.jpg", "Diplomate3.jpg"];
            let currentIndex = 0;
            const herooSection = document.querySelector(".heroo");

            function changeBackground() {
                herooSection.style.opacity = 1;  // Start fading out
                setTimeout(() => {
                    herooSection.style.backgroundImage = `url('{{ asset('assets/images/') }}/${images[currentIndex]}')`;
                    herooSection.style.opacity = 1;  // Start fading in
                    currentIndex = (currentIndex + 1) % images.length; // Move to the next image
                }, 1000);  // Wait for the fade-out transition to complete
            }

            setInterval(changeBackground, 5000);
        });
    </script>
@endsection
