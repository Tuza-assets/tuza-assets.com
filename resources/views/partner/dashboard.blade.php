@extends('layouts.dashboard.app')

@section('content')
    <div class="bg-white container-fluid">
        <div class="row">
            <div class="container p-3 mx-auto">
                @php
                    $partner = Auth::user();
                    $payment = App\Models\Payment::where('user_id', $partner->id)->get();

                @endphp

                @if ($payment->count() < 0)
                    <!-- Welcome Section -->
                    <section class="relative z-10 p-5 bg-orange-500">
                        <div class="container mx-auto">
                            <h2 class="mb-8 text-3xl font-bold text-center text-gray-800">Partnership Overview</h2>
                            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                                <div class="p-6 bg-white rounded-lg shadow-lg">
                                    <div class="flex items-center mb-4">
                                        <div class="p-3 bg-blue-100 rounded-full">
                                            <i class="text-xl text-green-600 fa fa-chart-bar"></i>
                                        </div>
                                        <h3 class="ml-4 text-xl font-semibold text-gray-800">Performance</h3>
                                    </div>
                                    <p class="text-gray-600">Track your partnership metrics and performance indicators.</p>
                                </div>

                                <div class="p-6 bg-white rounded-lg shadow-lg">
                                    <div class="flex items-center mb-4">
                                        <div class="p-3 bg-green-100 rounded-full">
                                            <i class="text-xl text-green-600 fa fa-dollar-sign"></i>
                                        </div>
                                        <h3 class="ml-4 text-xl font-semibold text-gray-800">Earnings</h3>
                                    </div>
                                    <p class="text-gray-600">View your earnings, commissions, and payment history.</p>
                                </div>

                                <div class="p-6 bg-white rounded-lg shadow-lg">
                                    <div class="flex items-center mb-4">
                                        <div class="p-3 bg-purple-100 rounded-full">
                                            <i class="text-xl text-purple-600 fa fa-users"></i>
                                        </div>
                                        <h3 class="ml-4 text-xl font-semibold text-gray-800">Network</h3>
                                    </div>
                                    <p class="text-gray-600">Expand your network and connect with other partners.</p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Contact & Support Section -->
                    <section id="contact-section">
                        <div
                            class="flex flex-col items-start justify-between p-6 bg-white rounded-lg shadow-lg lg:flex-row">
                            <div class="w-full mb-6 lg:w-1/2 lg:mb-0">
                                <h3 class="mb-4 text-2xl font-bold text-gray-800">Need Support?</h3>
                                <p class="mb-4 text-gray-600">
                                    Our dedicated partner support team is here to help you succeed. Reach out to us for any
                                    questions, technical support, or partnership opportunities.
                                </p>
                                <div class="mb-4">
                                    <p class="flex items-center mb-3 text-gray-800">
                                        <i class="mr-3 text-gray-600 fa fa-envelope"></i>
                                        partners@tuza-assets.com
                                    </p>
                                    <p class="flex items-center mb-3 text-gray-800">
                                        <i class="mr-3 text-gray-600 fa fa-phone"></i>
                                        Partner Hotline: +250 785 519 538
                                    </p>
                                    <p class="flex items-center text-gray-800">
                                        <i class="mr-3 text-gray-600 fa fa-clock"></i>
                                        Support Hours: Mon-Fri 8AM-6PM
                                    </p>
                                </div>
                                <div class="flex space-x-4">
                                    <a href="#" class="text-gray-500 transition-colors hover:text-green-600">
                                        <i class="text-xl fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="text-gray-500 transition-colors hover:text-green-600">
                                        <i class="text-xl fab fa-facebook"></i>
                                    </a>
                                    <a href="#" class="text-gray-500 transition-colors hover:text-green-600">
                                        <i class="text-xl fab fa-linkedin"></i>
                                    </a>
                                    <a href="#" class="text-gray-500 transition-colors hover:text-green-600">
                                        <i class="text-xl fab fa-instagram"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="container w-1/2 mx-auto">
                                <h2 class="mb-8 text-3xl font-bold text-center text-gray-800">Make Payment</h2>

                                <!-- Payment Status Messages -->
                                @if (session('success'))
                                    <div class="p-4 mb-6 text-green-700 bg-green-100 border border-green-300 rounded-lg">
                                        <i class="mr-2 fa fa-check-circle"></i>
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div class="p-4 mb-6 text-red-700 bg-red-100 border border-red-300 rounded-lg">
                                        <i class="mr-2 fa fa-exclamation-triangle"></i>
                                        {{ session('error') }}
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="p-4 mb-6 text-red-700 bg-red-100 border border-red-300 rounded-lg">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li><i class="mr-2 fa fa-exclamation-circle"></i>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <!-- Payment Form -->
                                <div class="max-w-4xl mx-auto">
                                    <form action="{{ route('payment.process') }}" method="POST"
                                        class="p-8 bg-white rounded-lg shadow-lg" id="paymentForm">
                                        @csrf

                                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                            <!-- Customer Information -->
                                            <div class="space-y-4">
                                                <h3
                                                    class="pb-2 text-xl font-semibold text-gray-800 border-b border-gray-200">
                                                    <i class="mr-2 fa fa-user"></i>Customer Information
                                                </h3>

                                                <div>
                                                    <label for="cname"
                                                        class="block mb-2 text-sm font-medium text-gray-700">Full Name
                                                        *</label>
                                                    <input type="text" name="cname" id="cname"
                                                        value="{{ old('cname') }}" placeholder="Enter customer full name"
                                                        required
                                                        class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                                </div>

                                                <div>
                                                    <label for="email"
                                                        class="block mb-2 text-sm font-medium text-gray-700">Email
                                                        Address *</label>
                                                    <input type="email" name="email" id="email"
                                                        value="{{ old('email') }}" placeholder="customer@example.com"
                                                        required
                                                        class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                                </div>

                                                <div>
                                                    <label for="msisdn"
                                                        class="block mb-2 text-sm font-medium text-gray-700">Mobile
                                                        Number *</label>
                                                    <input type="tel" name="msisdn" id="msisdn"
                                                        value="{{ old('msisdn') }}" placeholder="250783300000" required
                                                        pattern="[0-9]{12}"
                                                        class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                                    <p class="mt-1 text-xs text-gray-500">Format: Country code + number
                                                        (e.g., 250783300000)</p>
                                                </div>

                                                <!-- Hidden field to use mobile number as customer number -->
                                                <input type="hidden" name="cnumber" id="cnumber"
                                                    value="{{ old('msisdn') }}">
                                            </div>

                                            <!-- Payment Details -->
                                            <div class="space-y-4">
                                                <h3
                                                    class="pb-2 text-xl font-semibold text-gray-800 border-b border-gray-200">
                                                    <i class="mr-2 fa fa-credit-card"></i>Payment Details
                                                </h3>

                                                <div>
                                                    <label for="amount"
                                                        class="block mb-2 text-sm font-medium text-gray-700">Amount
                                                        *</label>
                                                    <div class="relative">
                                                        <input type="number" name="amount" id="amount"
                                                            value="{{ old('amount') }}" placeholder="4200" required
                                                            min="100" step="1"
                                                            class="w-full p-3 pr-16 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                                        <span
                                                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500">RWF</span>
                                                    </div>
                                                </div>

                                                <div>
                                                    <label for="currency"
                                                        class="block mb-2 text-sm font-medium text-gray-700">Currency</label>
                                                    <select name="currency" id="currency"
                                                        class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                                        <option value="RWF"
                                                            {{ old('currency') == 'RWF' ? 'selected' : '' }}>RWF -
                                                            Rwandan Franc</option>
                                                        <option value="USD"
                                                            {{ old('currency') == 'USD' ? 'selected' : '' }}>USD - US
                                                            Dollar</option>
                                                    </select>
                                                </div>

                                                <div>
                                                    <label for="pmethod"
                                                        class="block mb-2 text-sm font-medium text-gray-700">Payment
                                                        Method *</label>
                                                    <select name="pmethod" id="pmethod" required
                                                        class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                                        <option value="">Select Payment Method</option>
                                                        <option value="momo"
                                                            {{ old('pmethod') == 'momo' ? 'selected' : '' }}>Mobile
                                                            Money (MTN/Airtel)</option>
                                                        <option value="cc"
                                                            {{ old('pmethod') == 'cc' ? 'selected' : '' }}>
                                                            Credit/Debit Card</option>
                                                    </select>
                                                </div>

                                                <div>
                                                    <label for="details"
                                                        class="block mb-2 text-sm font-medium text-gray-700">Payment
                                                        Description *</label>
                                                    <textarea name="details" id="details" placeholder="Brief description of the payment..." rows="3" required
                                                        class="w-full p-3 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('details') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Submit Button -->
                                        <div class="mt-8">
                                            <button type="submit" id="submitBtn"
                                                class="w-full p-4 font-semibold text-white transition-all duration-200 transform bg-orange-500 rounded-lg bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 hover:scale-105">
                                                <i class="mr-2 fa fa-lock"></i>
                                                <span id="btnText">Process Payment</span>
                                                <span id="btnLoader" class="hidden">
                                                    <i class="mr-2 fa fa-spinner fa-spin"></i>Processing...
                                                </span>
                                            </button>
                                        </div>

                                        <!-- Security Notice -->
                                        <div class="p-3 mt-4 border-l-4 border-orange-500 rounded-lg bg-gray-50">
                                            <p class="text-sm text-gray-700">
                                                <i class="mr-2 text-blue-500 fa fa-shield-alt"></i>
                                                Your payment information is secured with industry-standard encryption.
                                                You will be redirected to complete the payment securely.
                                            </p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </section>
                @else
                    @php
                        $payment = App\Models\Payment::where('user_id', $partner->id)->get();
                        $property = App\Models\PropertyOnSell::where('user_id', $partner->id)->get();
                    @endphp
                    <div class="container p-3 mx-auto">
                        <h2 class="mb-8 text-3xl font-bold text-center text-gray-800">Partnership Overview</h2>
                    </div>
                    <div class="container p-3 mx-auto">
                        <div class="row">
                            <div class="mb-4 col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between p-md-1">
                                            <div class="flex-row d-flex">
                                                <div class="align-self-center">
                                                    <i class="text-green-500 fas fa-pencil-alt fa-3x me-4"></i>
                                                </div>
                                                <div>
                                                    <h4>Total Property on sell</h4>
                                                    <p class="mb-0">Total Property </p>
                                                </div>
                                            </div>
                                            <div class="align-self-center">
                                                <h2 class="mb-0 h1">{{ $property->count() }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between p-md-1">
                                            <div class="flex-row d-flex">
                                                <div class="align-self-center">
                                                    <i class="text-green-500 fas fa-money-bill-alt fa-3x me-4"></i>
                                                </div>
                                                <div>
                                                    <h4>Payment</h4>
                                                    <p class="mb-0">Total Pay </p>
                                                </div>
                                            </div>
                                            <div class="align-self-center">
                                                <h2 class="mb-0 h1">
                                                    {{ $payment->sum('amount') }},{{ $payment->first()->currency ?? 'RWF' }}
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
