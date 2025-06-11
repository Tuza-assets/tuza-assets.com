@extends('layouts.web')

@section('content')
<style>
    .payment-container {
        background-color: #f9f9f9;
        min-height: 100vh;
        padding: 20px;
        font-family: Arial, sans-serif;
    }
    
    .payment-card {
        max-width: 600px;
        margin: 0 auto;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 30px;
    }
    
    .payment-title {
        font-size: 28px;
        font-weight: bold;
        margin: 0 0 25px 0;
        color: #222222;
    }
    
    .amount-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }
    
    .amount-label {
        font-size: 16px;
        font-weight: 600;
        color: #006400;
    }
    
    .amount-value {
        font-size: 16px;
        font-weight: 600;
        color: #006400;
    }
    
    .booking-title {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 8px;
        color: #222222;
    }
    
    .booking-description {
        font-size: 14px;
        color: #666666;
        margin-bottom: 25px;
    }
    
    .payment-section-title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 15px;
        color: #222222;
    }
    
    .payment-options {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 25px;
    }
    
    .payment-option {
        position: relative;
    }
    
    .payment-radio {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }
    
    .payment-label {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 15px;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    
    .payment-radio:checked + .payment-label {
        border-color: #006400;
        box-shadow: 0 0 0 2px rgba(0, 100, 0, 0.2);
    }
    
    .payment-logo-container {
        height: 40px;
        display: flex;
        align-items: center;
    }
    
    .payment-logo {
        height: 100%;
        max-width: 120px;
    }
    
    .arrow-icon {
        width: 20px;
        height: 20px;
        color: #999;
    }
    
    .payment-radio:checked + .payment-label .arrow-icon {
        color: #006400;
    }
    
    .network-options {
        margin-bottom: 25px;
        display: none;
    }
    
    .network-option {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }
    
    .network-radio {
        width: 18px;
        height: 18px;
        margin-right: 10px;
        accent-color: #006400;
    }
    
    .network-label {
        font-size: 14px;
    }
    
    .phone-input-label {
        display: block;
        font-size: 14px;
        margin-bottom: 8px;
        color: #222222;
    }
    
    .phone-input {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        font-size: 16px;
        background-color: #f8f8f8;
    }
    
    .phone-input:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }
    
    .submit-button {
        width: 100%;
        background-color: #006400;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 15px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }
    
    .submit-button:hover {
        background-color: #005000;
    }
    
    .error-message {
        color: #d32f2f;
        font-size: 14px;
        margin-top: 5px;
        display: none;
    }
    
    /* Loading Overlay */
    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        display: none;
    }
    
    .loader {
        width: 70px;
        height: 70px;
        border: 8px solid #f3f3f3;
        border-top: 8px solid #006400;
        border-radius: 50%;
        animation: spin 1.5s linear infinite;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    /* Responsive adjustments */
    @media (max-width: 600px) {
        .payment-options {
            grid-template-columns: 1fr;
        }
        
        .payment-card {
            padding: 20px;
        }
    }
</style>

<section class="py-5 text-center text-white bg-success">
    <div class="container mb-2">
    </div>
</section>

<div class="payment-container">
    <div class="payment-card">
        <h1 class="payment-title">Payment summary</h1>
        
        <div class="amount-row">
            <div class="amount-label">Total Amount</div>
            <div class="amount-value">{{ number_format($totalAmount) }} {{ $reservation['currency'] }}</div>
        </div>
        
        <div>
            <h2 class="booking-title">{{ $reservation['property_name'] }}</h2>
            <p class="booking-description">
                Complete payment to confirm your booking from {{ date('M d, Y', strtotime($reservation['check_in'])) }} to {{ date('M d, Y', strtotime($reservation['check_out'])) }}
            </p>
        </div>
        
        <form action="{{ route('reservation.process-payment') }}" method="POST" id="paymentForm">
            @csrf
            <h3 class="payment-section-title">Pay with</h3>
            
            <div class="payment-options">
                <!-- PayPal Option -->
                <div class="payment-option">
                    <input type="radio" id="paypal" name="paymentMethod" value="paypal" class="payment-radio" required />
                    <label for="paypal" class="payment-label">
                        <div class="payment-logo-container">
                            <img src="https://bacsociety.com/wp-content/uploads/2023/08/logo-Paypal-1.png" alt="PayPal Logo" class="payment-logo">
                        </div>
                        <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </label>
                </div>
                
                <!-- KPay Option -->
                <div class="payment-option">
                    <input type="radio" id="kpay" name="paymentMethod" value="kpay" class="payment-radio">
                    <label for="kpay" class="payment-label">
                        <div class="payment-logo-container">
                            <img src="{{ asset('public/images/kpay.png') }}" alt="kpay" class="payment-logo">
                        </div>
                        <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </label>
                </div>
            </div>
            
            <!-- Mobile Money Options -->
            <div id="kpayOptions" class="network-options">
                <div class="network-option">
                    <input id="mtn-momo" type="radio" name="choosenetwork" value="mtn" class="network-radio">
                    <label for="mtn-momo" class="network-label">MTN MOMO</label>
                </div>
                
                <div class="network-option">
                    <input id="airtel-money" type="radio" name="choosenetwork" value="airtel" class="network-radio">
                    <label for="airtel-money" class="network-label">Airtel Money</label>
                </div>
                
                <div class="phone-input-container">
                    <label for="phoneNumber" class="phone-input-label">
                        Phone number
                    </label>
                    <input type="text" id="phoneNumber" name="phoneNumber" class="phone-input" value="{{ $reservation['phone_number'] }}" readonly>
                    <div id="networkError" class="error-message">This phone number cannot be used with the selected network.</div>
                </div>
            </div>
            
            <button type="submit" id="submitButton" class="submit-button">
                Proceed to payment
            </button>
        </form>
    </div>
</div>

<!-- Loading Overlay -->
<div id="loadingOverlay" class="loading-overlay">
    <div class="loader"></div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const kpayRadio = document.getElementById('kpay');
    const paypalRadio = document.getElementById('paypal');
    const kpayOptions = document.getElementById('kpayOptions');
    const mtnRadio = document.getElementById('mtn-momo');
    const airtelRadio = document.getElementById('airtel-money');
    const phoneNumber = document.getElementById('phoneNumber').value;
    const errorMessage = document.getElementById('networkError');
    const form = document.getElementById('paymentForm');
    const loadingOverlay = document.getElementById('loadingOverlay');
    const submitButton = document.getElementById('submitButton');
    
    // Store the network type of the phone number
    let phoneNetworkType = '';
    
    // Function to normalize phone number and detect network
    function normalizePhoneNumber(number) {
        // Remove all spaces
        let normalized = number.replace(/\s+/g, '');
        
        // Remove leading + if present
        if (normalized.startsWith('+')) {
            normalized = normalized.substring(1);
        }
        
        // Check full format with country code
        if (normalized.startsWith('250')) {
            const prefix = normalized.substring(3, 5);
            if (prefix === '72' || prefix === '73') {
                return { type: 'airtel', number: normalized };
            } else if (prefix === '78' || prefix === '79') {
                return { type: 'mtn', number: normalized };
            }
        }
        
        // Check format with leading zero
        if (normalized.startsWith('0')) {
            const prefix = normalized.substring(1, 3);
            if (prefix === '72' || prefix === '73') {
                return { type: 'airtel', number: normalized };
            } else if (prefix === '78' || prefix === '79') {
                return { type: 'mtn', number: normalized };
            }
        }
        
        // Check format without leading zero
        const prefix = normalized.substring(0, 2);
        if (prefix === '72' || prefix === '73') {
            return { type: 'airtel', number: normalized };
        } else if (prefix === '78' || prefix === '79') {
            return { type: 'mtn', number: normalized };
        }
        
        // Default to MTN if we can't determine
        return { type: 'unknown', number: normalized };
    }
    
    function updatePaymentOptions() {
        if (kpayRadio.checked) {
            kpayOptions.style.display = 'block';
            
            // Force the correct network radio button based on phone number
            if (phoneNetworkType === 'airtel') {
                airtelRadio.checked = true;
                mtnRadio.disabled = true;
                airtelRadio.disabled = false;
            } else if (phoneNetworkType === 'mtn') {
                mtnRadio.checked = true;
                airtelRadio.disabled = true;
                mtnRadio.disabled = false;
            } else {
                // If unknown, allow both but warn user
                mtnRadio.disabled = false;
                airtelRadio.disabled = false;
            }
            
            // No need to validate here as we're enforcing correct selection
            errorMessage.style.display = 'none';
        } else {
            kpayOptions.style.display = 'none';
            errorMessage.style.display = 'none';
        }
    }
    
    // Add some visual styling for disabled radio buttons
    function updateRadioStyles() {
        const networkOptions = document.querySelectorAll('.network-option');
        
        networkOptions.forEach(option => {
            const radio = option.querySelector('.network-radio');
            if (radio.disabled) {
                option.style.opacity = '0.5';
                option.style.cursor = 'not-allowed';
            } else {
                option.style.opacity = '1';
                option.style.cursor = 'pointer';
            }
        });
    }
    
    // Process the phone number
    const phoneInfo = normalizePhoneNumber(phoneNumber);
    phoneNetworkType = phoneInfo.type;
    
    // Set up initial state
    updatePaymentOptions();
    updateRadioStyles();
    
    // Event listeners
    kpayRadio.addEventListener('change', function() {
        updatePaymentOptions();
        updateRadioStyles();
    });
    
    paypalRadio.addEventListener('change', function() {
        updatePaymentOptions();
        updateRadioStyles();
    });
    
    // Handle form submission
    form.addEventListener('submit', function(event) {
    // Show loading overlay for both payment methods
    event.preventDefault(); // Prevent normal form submission
    loadingOverlay.style.display = 'flex';
    
    // Check which payment method is selected
    if (kpayRadio.checked) {
        // After 5 seconds, redirect to the coming soon page
        setTimeout(function() {
            window.location.href = '{{ route("payment.kpay.coming.soon") }}';
        }, 5000);
    } else if (paypalRadio.checked) {
        // Submit the form normally for PayPal after showing the loader
        setTimeout(function() {
            form.submit();
        }, 2000); // A shorter delay for PayPal since it's redirecting to an external site
    }
});
});
</script>
@endsection