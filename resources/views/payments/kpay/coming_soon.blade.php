@extends('layouts.web')
@section('content')
<style>
    .coming-soon-container {
        max-width: 550px;
        margin: 50px auto;
        padding: 30px 25px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 3px 15px rgba(0, 0, 0, 0.06);
        text-align: center;
    }
    
    .logo-container {
        margin-bottom: 25px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .logo-container img {
        height: 50px;
    }
    
    .status-badge {
        display: inline-block;
        background-color: #fcf8e3;
        color: #8a6d3b;
        font-size: 13px;
        font-weight: 500;
        padding: 5px 14px;
        border-radius: 100px;
        margin-bottom: 15px;
    }
    
    .title {
        font-size: 24px;
        font-weight: 600;
        color: #222;
        margin-bottom: 14px;
    }
    
    .description {
        font-size: 15px;
        color: #555;
        margin-bottom: 25px;
        line-height: 1.4;
        max-width: 450px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .payment-options {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-bottom: 30px;
    }
    
    .option-card {
        background-color: #f9f9f9;
        border-radius: 8px;
        padding: 16px;
        width: 120px;
        text-align: center;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
        transition: all 0.3s ease;
    }
    
    .option-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
    }
    
    .option-card i {
        font-size: 26px;
        color: #006400;
        margin-bottom: 10px;
    }
    
    .option-card h4 {
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 4px;
    }
    
    .option-card p {
        font-size: 12px;
        color: #666;
    }
    
    .primary-button {
        background-color: #006400;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 500;
        border: none;
        font-size: 14px;
        transition: all 0.2s ease;
        display: inline-block;
    }
    
    .primary-button:hover {
        background-color: #005000;
        text-decoration: none;
        color: white;
    }
    
    .progress-indicator {
        margin: 30px auto 0;
        max-width: 350px;
        display: flex;
        justify-content: center;
    }
    
    .progress-step {
        width: 100px;
        position: relative;
    }
    
    .progress-step:not(:last-child):after {
        content: '';
        position: absolute;
        top: 12px;
        left: 50%;
        width: 100%;
        height: 2px;
        background-color: #e0e0e0;
    }
    
    .progress-icon {
        background-color: #f0f0f0;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 6px;
        position: relative;
        z-index: 1;
        font-size: 12px;
    }
    
    .progress-step.active .progress-icon {
        background-color: #006400;
        color: white;
    }
    
    .progress-step.active:not(:last-child):after {
        background-color: #006400;
    }
    
    .progress-label {
        font-size: 11px;
        color: #666;
        text-align: center;
    }
    
    .progress-step.active .progress-label {
        color: #006400;
        font-weight: 500;
    }
</style>

<section class="py-5 text-center text-white bg-success">
    <div class="container mb-2">
    </div>
</section>

<div class="coming-soon-container">
    <div class="logo-container">
        <img src="{{ asset('public/images/kpay.png') }}" alt="KPay Logo">
    </div>
    
    <div class="status-badge">Coming Soon</div>
    
    <h1 class="title">KPay Integration in Progress</h1>
    
    <p class="description">
        We're finalizing our KPay mobile money integration for MTN and Airtel. Please check back soon.
    </p>
    
    <div class="payment-options">
        <div class="option-card">
            <i class="fas fa-mobile-alt"></i>
            <h4>MTN MoMo</h4>
            <p>Coming soon</p>
        </div>
        
        <div class="option-card">
            <i class="fas fa-mobile-alt"></i>
            <h4>Airtel Money</h4>
            <p>Coming soon</p>
        </div>
    </div>
    
    <div class="progress-indicator">
        <div class="progress-step active">
            <div class="progress-icon">
                <i class="fas fa-code"></i>
            </div>
            <div class="progress-label">Development</div>
        </div>
        
        <div class="progress-step">
            <div class="progress-icon">
                <i class="fas fa-vial"></i>
            </div>
            <div class="progress-label">Testing</div>
        </div>
        
        <div class="progress-step">
            <div class="progress-icon">
                <i class="fas fa-check"></i>
            </div>
            <div class="progress-label">Launch</div>
        </div>
    </div>
    
    <div style="margin-top: 25px;">
        <a href="{{ url('property/payment') }}" class="primary-button">
            <i class="fas fa-arrow-left" style="margin-right: 5px;"></i> Back to Payment
        </a>
    </div>
</div>
@endsection