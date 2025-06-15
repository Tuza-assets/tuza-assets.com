@extends('layouts.web')
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
</style>

@section('content')
    <section>
        <div
            style="background-image: url('{{ asset('assets/images/plote.jpg') }}'); background-size: cover; background-position: center;">
            <div class="min-vh-100 d-flex align-items-center justify-content-center bg-overlay ">
                <div class="container mt-5">
                    <div class="row contact-section">
                        <!-- Contact Form -->
                        <div class="col-md-5">
                            <h2>CONTACT US</h2>
                            <form method="POST" action="{{ route('contact-us') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="tel" class="form-label">Tel</label>
                                    <input type="tel" class="form-control" name="tel" id="tel" required>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-custom">SEND</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-2">

                        </div>
                        <!-- Contact Details and Map -->
                        <div class="col-md-5">
                            <h2>OFFICE</h2>
                            <div class="office-info">
                                <ul class="list-unstyled">
                                    <li style="padding-bottom:1vh;"><img src="{{ asset('assets/images/2.svg') }}"
                                            alt="icon" style="margin-right: 4px;"><a href="tel:+17047746456"
                                            style="color: black; text-decoration: none;">{{ __('footer.usa') }}</a></li>
                                    <li style="padding-bottom:1vh;"><img src="{{ asset('assets/images/2.svg') }}"
                                            alt="icon" style="margin-right: 4px;"><a href="tel:+15819979608"
                                            style="color: black; text-decoration: none;">{{ __('footer.canada') }}</a></li>
                                    <li style="padding-bottom:1vh;"><img src="{{ asset('assets/images/2.svg') }}"
                                            alt="icon" style="margin-right: 4px;"><a href="tel:+31 6 86495035"
                                            style="color: black; text-decoration: none;">{{ __('footer.europe') }}</a></li>
                                    <li style="padding-bottom:1vh;"><img src="{{ asset('assets/images/2.svg') }}"
                                            alt="icon" style="margin-right: 4px;"><a href="tel:+250785519538"
                                            style="color: black; text-decoration: none;">{{ __('footer.rwanda') }}</a></li>
                                    <li style="padding-bottom:1vh;"><img src="{{ asset('assets/images/2.svg') }}"
                                            alt="icon" style="margin-right: 4px;"><a href="tel:+8618805158975"
                                            style="color: black; text-decoration: none;">{{ __('footer.central_asia') }}</a>
                                    </li>
                                    <li><img src="{{ asset('assets/images/3.svg') }}" alt="icon"
                                            style="margin-right: 4px;"><a href="mailto:info@tuza-assets.com"
                                            style="color: black; text-decoration: none;">{{ __('footer.email') }}</a></li>
                                </ul>
                            </div>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63716.437160573426!2d30.016134930755805!3d-1.9500798244540807!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dca438c978f17f%3A0x9f6c362b6b3a61bb!2sKigali%2C%20Rwanda!5e0!3m2!1sen!2s!4v1624561234567!5m2!1sen!2s"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .contact-section {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .contact-section h2 {
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-group input,
        .form-group textarea {
            border-radius: 0;
            box-shadow: none;
        }

        .btn-custom {
            background-color: #ff6600;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            width: 100%;
        }

        .btn-custom:hover {
            background-color: #e55c00;
            color: #fff;
        }

        .office-info {
            font-size: 0.9rem;
        }

        .office-info p {
            margin-bottom: 10px;
        }

        .office-info i {
            color: #ff6600;
            margin-right: 10px;
        }

        iframe {
            border: none;
            width: 100%;
            height: 250px;
            border-radius: 5px;
        }
    </style>
@endsection
