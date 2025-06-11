@extends('layouts.web')

@section('content')
<section class="py-5 text-center text-white bg-success">
    <div class="container mb-2">
    </div>
</section>
    
<div class="container py-5">
    <div class="row">
        <div class="col-12 mb-4">
            <a href="#" class="text-decoration-none" style="color: #FF7F00;">
                <i class="fas fa-chevron-left"></i> Back to confirmation
            </a>
        </div>
        
        <div class="col-md-7">
            <!-- Company banner -->
            <div class="card mb-4 border-0 rounded-3 shadow-sm">
                <div class="card-body p-3" style="background-color: #fff4e6;">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-1" style="color: #FF7F00;">Tuza Assets</h6>
                            <p class="mb-0 small">Premium Property Management for the Rwandan Diaspora and Diplomats in Rwanda.</p>
                        </div>
                        <div class="ms-auto">
                            <span class="badge p-2" style="background-color: #FF7F00;">
                                <i class="fas fa-home"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Trip details -->
            <h4 class="mb-4 fw-bold">Your Booking Details</h4>
            
            <div class="card mb-4 border-0 shadow-sm rounded-3">
                <div class="card-body">
                    <div class="py-3 border-bottom">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-calendar-alt me-3" style="color: #FF7F00;"></i>
                            <div>
                                <h6 class="fw-bold mb-1">Booking Period</h6>
                                <p class="mb-0">{{ date('M d', strtotime($checkInDate)) }}–{{ date('d, Y', strtotime($checkOutDate)) }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="py-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-users me-3" style="color: #FF7F00;"></i>
                            <div>
                                <h6 class="fw-bold mb-1">Guests</h6>
                                <p class="mb-0">{{ $guestCount }} {{ $guestCount == 1 ? 'guest' : 'guests' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Login/Signup section -->
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-body p-4">
                    <h4 class="mb-3 fw-bold">Contact Information</h4>
                    
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Phone Number <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #fff4e6; color: #FF7F00; border: 1px solid #ced4da;">
                                Rwanda (+250)
                            </button>
                            <input type="tel" class="form-control" id="phoneNumber" name="phone_number" placeholder="Phone number" aria-label="Phone number">
                        </div>
                        <div class="text-danger mt-1 small d-none" id="phoneError">Phone number is required</div>
                        <p class="small text-muted mt-2">We'll contact you to confirm your booking details. Standard message and data rates apply. 
                            <a href="#" class="text-decoration-none" style="color: #FF7F00;">Privacy Policy</a>
                        </p>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Your email address">
                        <div class="text-danger mt-1 small d-none" id="emailError">Email address is required</div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName" class="form-label">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="firstName" name="first_name" placeholder="First name">
                            <div class="text-danger mt-1 small d-none" id="firstNameError">First name is required</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName" class="form-label">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Last name">
                            <div class="text-danger mt-1 small d-none" id="lastNameError">Last name is required</div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="specialRequests" class="form-label">Special Requests (Optional)</label>
                        <textarea class="form-control" id="specialRequests" name="special_requests" rows="3" placeholder="Any special requirements?"></textarea>
                    </div>
                    
                    <button type="button" id="completeBooking" class="btn w-100 py-3 text-white" style="background-color: #FF7F00;">Complete Booking</button>
                </div>
            </div>
            
            <!-- Hidden form with all the data needed for reservation -->
            <form action="{{ route('reservation.complete') }}" method="POST" id="bookingForm">
                @csrf
                <input type="hidden" name="property_name" value="{{ $property['name'] }}">
                <input type="hidden" name="check_in" value="{{ $checkInDate }}">
                <input type="hidden" name="property_id" value="{{ $property['id'] }}"> 
                <input type="hidden" name="check_out" value="{{ $checkOutDate }}">
                <input type="hidden" name="guest_count" value="{{ $guestCount }}">
                <input type="hidden" name="total" value="{{ $totalAmount }}">
                <input type="hidden" name="subtotal" value="{{ $subtotal }}">
                <input type="hidden" name="rent_per_month" value="{{ $rentPerMonth }}">
                <input type="hidden" name="currency" value="{{ $currency }}">
                <input type="hidden" name="first_name" value="">
                <input type="hidden" name="last_name" value="">
                <input type="hidden" name="email" value="">
                <input type="hidden" name="phone_number" value="">
                <input type="hidden" name="special_requests" value="">
            </form>
        </div>
        
        <!-- Property details card -->
        <div class="col-md-5">
            <div class="card shadow rounded-3 overflow-hidden mb-4 sticky-md-top" style="top: 20px;">
                <div class="row g-0">
                    <div class="col-4">
                        <img src="{{ $property['thumbnail']['image'] }}" class="img-fluid rounded-start h-100" style="object-fit: cover;" alt="{{ $property['name'] }}">
                    </div>
                    <div class="col-8">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $property['name'] }}</h5>
                            <p class="card-text">{{ $property['province'] }}, {{ $property['district'] }}</p>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-star me-1" style="color: #FF7F00;"></i>
                                <span>5.00 (1 review) • <span class="badge" style="background-color: #FF7F00;">Superhost</span></span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card-body border-top">
                    <h5 class="mb-3 fw-bold">Price details</h5>
                    
                    <div class="d-flex justify-content-between mb-3">
                        <span>{{ number_format($rentPerMonth) }} {{ $currency }} × {{ $months }} {{ $months == 1 ? 'Month' : 'Months' }}</span>
                        <span>{{ number_format($subtotal) }} {{ $currency }}</span>
                    </div>
                    
                    <div class="d-flex justify-content-between mb-3">
                        <span>Cleaning fee</span>
                        <span>{{ number_format($cleaningFee) }} {{ __("Rwf") }}</span>
                    </div>
                    
                    <div class="d-flex justify-content-between mb-3">
                        <span>Service fee</span>
                        <span>{{ number_format($serviceFee) }} {{ __("Rwf") }}</span>
                    </div>
                    
                    <div class="d-flex justify-content-between font-weight-bold flex-column"
                                    style="border-bottom: 1px solid orange">
                        <div class="d-flex justify-content-between">    
                            <p>Total Rent Amount</p>
                            <p><span>{{ number_format($subtotal) }}</span> {{ $currency }}</p> </div>
                            <div class="d-flex justify-content-between">
                                <p>Total Fee</p>
                                <p><span>{{ number_format($serviceFee+$cleaningFee) }}</span> {{ __("Rwf") }}</p>
                            </div>
                        </div>
                     </div>
                
                <div class="card-footer border-top bg-light">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-shield-alt me-2" style="color: #FF7F00;"></i>
                        <small class="text-muted">Your payment is secured with our advanced encryption.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get form elements
    const completeButton = document.getElementById('completeBooking');
    const bookingForm = document.getElementById('bookingForm');
    const phoneNumber = document.getElementById('phoneNumber');
    const email = document.getElementById('email');
    const firstName = document.getElementById('firstName');
    const lastName = document.getElementById('lastName');
    const specialRequests = document.getElementById('specialRequests');
    
    // Error elements
    const phoneError = document.getElementById('phoneError');
    const emailError = document.getElementById('emailError');
    const firstNameError = document.getElementById('firstNameError');
    const lastNameError = document.getElementById('lastNameError');
    
    // Add validation and submission
    completeButton.addEventListener('click', function() {
        // Reset all error states
        phoneError.classList.add('d-none');
        emailError.classList.add('d-none');
        firstNameError.classList.add('d-none');
        lastNameError.classList.add('d-none');
        
        phoneNumber.classList.remove('is-invalid');
        email.classList.remove('is-invalid');
        firstName.classList.remove('is-invalid');
        lastName.classList.remove('is-invalid');
        
        // Validate each field
        let isValid = true;
        
        if (!phoneNumber.value.trim()) {
            phoneNumber.classList.add('is-invalid');
            phoneError.classList.remove('d-none');
            isValid = false;
        }
        
        if (!email.value.trim()) {
            email.classList.add('is-invalid');
            emailError.classList.remove('d-none');
            isValid = false;
        } else if (!email.value.includes('@')) {
            email.classList.add('is-invalid');
            emailError.textContent = 'Please enter a valid email address';
            emailError.classList.remove('d-none');
            isValid = false;
        }
        
        if (!firstName.value.trim()) {
            firstName.classList.add('is-invalid');
            firstNameError.classList.remove('d-none');
            isValid = false;
        }
        
        if (!lastName.value.trim()) {
            lastName.classList.add('is-invalid');
            lastNameError.classList.remove('d-none');
            isValid = false;
        }
        
        // If all fields are valid, submit the form
        if (isValid) {
            // Transfer values to hidden form
            bookingForm.querySelector('input[name="first_name"]').value = firstName.value.trim();
            bookingForm.querySelector('input[name="last_name"]').value = lastName.value.trim();
            bookingForm.querySelector('input[name="email"]').value = email.value.trim();
            bookingForm.querySelector('input[name="phone_number"]').value = phoneNumber.value.trim();
            bookingForm.querySelector('input[name="special_requests"]').value = specialRequests.value.trim();
            
            // Submit the hidden form
            bookingForm.submit();
        }
    });
    
    // Add input validation on blur events
    phoneNumber.addEventListener('blur', function() {
        if (!this.value.trim()) {
            this.classList.add('is-invalid');
            phoneError.classList.remove('d-none');
        } else {
            this.classList.remove('is-invalid');
            phoneError.classList.add('d-none');
        }
    });
    
    email.addEventListener('blur', function() {
        if (!this.value.trim()) {
            this.classList.add('is-invalid');
            emailError.textContent = 'Email address is required';
            emailError.classList.remove('d-none');
        } else if (!this.value.includes('@')) {
            this.classList.add('is-invalid');
            emailError.textContent = 'Please enter a valid email address';
            emailError.classList.remove('d-none');
        } else {
            this.classList.remove('is-invalid');
            emailError.classList.add('d-none');
        }
    });
    
    firstName.addEventListener('blur', function() {
        if (!this.value.trim()) {
            this.classList.add('is-invalid');
            firstNameError.classList.remove('d-none');
        } else {
            this.classList.remove('is-invalid');
            firstNameError.classList.add('d-none');
        }
    });
    
    lastName.addEventListener('blur', function() {
        if (!this.value.trim()) {
            this.classList.add('is-invalid');
            lastNameError.classList.remove('d-none');
        } else {
            this.classList.remove('is-invalid');
            lastNameError.classList.add('d-none');
        }
    });
});
</script>
@endsection