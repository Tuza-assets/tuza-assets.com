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
    <section class="py-5 text-center text-white hero">
        <div class="container">
            <h1 class="display-4">TUZA ASSETS Ltd</h1>
            <p class="lead">CONTACT</p>
        </div>
    </section>

    <section>
        <div class="px-3 py-5 row">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <div class="w-full">
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

            <div class="col-md-4">
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
                           <button type="submit" class="text-white btn btn-block" style="background-color: #045501;">{{ __('message.contact_button') }}</button>

                        </div>
                    </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </section>
@endsection
