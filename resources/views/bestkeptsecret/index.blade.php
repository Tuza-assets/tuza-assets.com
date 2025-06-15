@extends('layouts.web')
<style>

</style>

@section('content')


    <section class="hero text-white text-center py-5">
        <div class="container">
            <h1 class="display-4">TUZA ASSETS Ltd</h1>
            <p class="lead">{{ __('message.best_kept_secret') }}</p>
        </div>
    </section>

 <div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body p-0">
                    <img src="{{ asset('/assets/images/secret2.jpg') }}" class="img-fluid card-img-top" alt="Living Room">
                </div>
            </div>
        </div>
        <div class="card col-md-6 d-flex align-items-center ">
            <div class="card-body">
                <p >{{ __('message.Screte_intro1') }}</p>
                <p>{{ __('message.Screte_intro2') }}</p>
            </div>
        </div>
    </div>

    <div class="row py-5">
        <div class="col-lg-6 mb-4 mb-lg-0">
            <h5 class="mb-4">TUZA ASSETS</h5>
            <div class="mb-4">
                <ul class="list-unstyled">
                    @foreach(['usa' => '+17047746456', 'canada' => '+15819979608', 'europe' => '+31 6 86495035', 'rwanda' => '+250785519538', 'central_asia' => '+8618805158975'] as $region => $phone)
                        <li style="padding-bottom: 1vh;">
                            <img src="{{ asset('assets/images/2.svg') }}" alt="icon" style="margin-right: 4px;">
                            <a href="tel:{{ $phone }}" style="color: black; text-decoration: none;">{{ __('footer.' . $region) }}</a>
                        </li>
                    @endforeach
                    <li>
                        <img src="{{ asset('assets/images/3.svg') }}" alt="icon" style="margin-right: 4px;">
                        <a href="mailto:info@tuza-assets.com" style="color: black; text-decoration: none;">{{ __('footer.email') }}</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <h5>{{ __('message.secret') }}</h5>
            <div class="card shadow-sm border-0">
                <div class="card-body">
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
                            <button type="submit" class="btn btn-success btn-block">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>

    .card {
        border: 2px solid #ED5303;
        border-radius: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        cursor:pointer;
    }

    .card-body {
        padding: 1.5rem;
    }

    .form-label {
        font-weight: bold;
    }

    .form-control:focus {
        outline: none;
        box-shadow: none;
        border-color: green;
    }

    .btn-success {
        background-color: green;
        border-color: green;
        font-weight: bold;
    }

    .btn-success:hover {
        background-color: #218838;
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

        #backgroundDiv {
            background-image: url('{{ asset('/assets/images/Cont.png') }}');
            background-size: cover;
            /* Ensures the image covers the entire div */
            background-position: center center;
            /* Centers the image */
            background-repeat: no-repeat;
            /* Prevents the image from repeating */
            /* Additional styles for the div */
        }
    </style>
@endsection

