@extends('layouts.web')

@section('content')
<section class="py-5 text-center text-white bg-success">
    <div class="container mb-2">
    </div>
</section>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 rounded-3 shadow-sm mb-4">
                <div class="card-body p-4">
                    <div class="text-center mb-4">
                        <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-check fa-3x"></i>
                        </div>
                        <h3 class="fw-bold">Thank You for Your Booking!</h3>
                        <p class="text-muted">Your booking has been confirmed and payment has been processed.</p>
                    </div>
                    
                    <div class="card mb-4 border-0 rounded-3" style="background-color: #fff4e6;">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="mb-1" style="color: #FF7F00;">Booking Reference</h6>
                                    <p class="mb-0 fs-5 fw-bold">TZA-{{ date('Ymd') }}-{{ rand(1000, 9999) }}</p>
                                </div>
                                <div class="ms-auto">
                                    <span class="badge p-2" style="background-color: #FF7F00;">
                                        <i class="fas fa-bookmark"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <h5 class="mb-3 fw-bold">Booking Details</h5>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li class="mb-2"><strong>Property:</strong> {{ $booking['property_name'] }}</li>
                                <li class="mb-2"><strong>Check-in:</strong> {{ date('M d, Y', strtotime($booking['check_in'])) }}</li>
                                <li class="mb-2"><strong>Check-out:</strong> {{ date('M d, Y', strtotime($booking['check_out'])) }}</li>
                                <li class="mb-2"><strong>Guests:</strong> {{ $booking['guest_count'] }}</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li class="mb-2"><strong>Name:</strong> {{ $booking['first_name'] }} {{ $booking['last_name'] }}</li>
                                <li class="mb-2"><strong>Email:</strong> {{ $booking['email'] }}</li>
                                <li class="mb-2"><strong>Phone:</strong> {{ $booking['phone_number'] }}</li>
                                <li class="mb-2"><strong>Payment Method:</strong> {{ ucfirst($booking['payment_method']) }}
                                    @if($booking['payment_method'] == 'kpay')
                                        ({{ strtoupper($booking['network']) }})
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="card border-0 rounded-3 bg-light mb-4">
                        <div class="card-body">
                            <h5 class="fw-bold mb-3">Payment Summary</h5>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Total Amount:</span>
                                <span class="fw-bold">{{ number_format($booking['total']) }} {{ $booking['currency'] }}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>Status:</span>
                                <span class="badge bg-success">Paid</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <p>A confirmation email has been sent to {{ $booking['email'] }}</p>
                        <a href="" class="btn btn-lg px-5 py-3 mt-3" style="background-color: #FF7F00; color: white;">
                            Return to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection