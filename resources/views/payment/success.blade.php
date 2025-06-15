@extends('layouts.dashboard.app')

@section('content')
<div class="container px-4 py-8 mx-auto">
    <div class="max-w-2xl p-8 mx-auto bg-white rounded-lg shadow-lg">
        <div class="text-center">
            <div class="mb-4">
                <i class="text-6xl text-green-500 fas fa-check-circle"></i>
            </div>
            <h1 class="mb-4 text-3xl font-bold text-gray-800">Payment Successful!</h1>
            <p class="mb-6 text-gray-600">
                Your payment has been processed successfully. You will receive a confirmation email shortly.
            </p>
            <div class="space-y-4">
                <a href="{{ route('partner.dashboard') }}"
                   class="inline-block px-6 py-3 text-white transition-colors bg-blue-600 rounded-lg hover:bg-blue-700">
                    Return to Dashboard
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
