@extends('layouts.dashboard.app-payment')

@section('content')
    <div class="py-5 mt-5 bg-white container-fluid">
        <div class="row">
            <div class="container p-3 mx-auto">
                @php
                    use Carbon\Carbon;
                    use Illuminate\Support\Facades\Auth;
                    use App\Models\Payment;

                    $partner = Auth::user();
                    $latestPayment = Payment::where('user_id', $partner->id)->where('payment_status', 'success')->orderByDesc('created_at')->first();

                    $isPaymentValid = false;

                    if ($latestPayment && $latestPayment->amount >= 1050) {
                        // Convert payment date to Kigali timezone
                        $paymentDate = Carbon::parse($latestPayment->created_at)->timezone('Africa/Kigali');
                        $now = now()->timezone('Africa/Kigali');

                        $daysDiff = $paymentDate->diffInDays($now);

                        // Set validity condition
                        $isPaymentValid = $daysDiff < 30;
                    }
                @endphp

                @if ($isPaymentValid)
                    <!-- Valid Access Section -->
                    <section class="relative z-10 p-5 bg-gray-100">
                        <div class="container mx-auto">
                            <h2 class="mb-8 text-3xl font-bold text-center text-gray-800">Partnership Overview</h2>

                            @if ($daysDiff <= 25)
                                <div class="p-4 mb-6 text-yellow-800 bg-yellow-100 rounded-lg border border-yellow-300">
                                    <i class="mr-2 fa fa-exclamation-circle"></i>
                                    Your access will expire in {{ 30 - $paymentDate->diffInDays(now()) }} days. Please
                                    consider topping up.
                                </div>
                            @endif

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
                @else
                    <!-- Payment Required Section -->
                    <section id="contact-section">
                        <div
                            class="flex flex-col justify-between items-start p-6 bg-white rounded-lg shadow-lg lg:flex-col">
                            <div class="container mb-6 w-full lg:mb-0">
                                <h3 class="mb-4 text-2xl font-bold text-gray-800">Access Required</h3>
                                <p class="mb-4 text-gray-600">
                                    To have full access to sell through <strong>Tuza Assets Ltd</strong>, you must pay an
                                    access fee of <strong>Frw 1050</strong> for a 30-day period. The access is renewed by
                                    topping up at the end of each period.
                                </p>
                                <p class="mb-4 text-gray-600">
                                    <strong>Payment method:</strong> MoMo or Credit/Debit Card.
                                </p>
                                <p class="mb-4 text-gray-600">
                                    Need support? Call <strong>+250 785 519 538</strong> or email
                                    <strong>partners@tuza-assets.com</strong>.
                                </p>
                            </div>
                            <hr>
                            <!-- Payment Form -->
                            <div class="container mx-auto w-full">
                                <h2 class="mb-8 text-3xl font-bold text-gray-800">Make Payment</h2>

                                @if (session('success'))
                                    <div class="p-4 mb-6 text-green-700 bg-green-100 rounded-lg border border-green-300">
                                        <i class="mr-2 fa fa-check-circle"></i> {{ session('success') }}
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div class="p-4 mb-6 text-red-700 bg-red-100 rounded-lg border border-red-300">
                                        <i class="mr-2 fa fa-exclamation-triangle"></i> {{ session('error') }}
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="p-4 mb-6 text-red-700 bg-red-100 rounded-lg border border-red-300">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li><i class="mr-2 fa fa-exclamation-circle"></i>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('pay.irembo') }}" method="POST"
                                    class="p-8 bg-white rounded-lg shadow-lg" id="paymentForm">
                                    @csrf
                                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                        <div class="space-y-4">
                                            <h3 class="pb-2 text-xl font-semibold text-gray-800 border-b border-gray-200">
                                                <i class="mr-2 fa fa-user"></i>Customer Information
                                            </h3>
                                            <div>
                                                <label for="cname"
                                                    class="block mb-2 text-sm font-medium text-gray-700">Full Name *</label>
                                                <input type="text" name="cname" id="cname"
                                                    value="{{ $partner->name }}" placeholder="Enter customer full name"
                                                    required readonly
                                                    class="p-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            </div>
                                            <div>
                                                <label for="email"
                                                    class="block mb-2 text-sm font-medium text-gray-700">Email *</label>
                                                <input type="email" name="email" id="email"
                                                    value="{{ $partner->email }}" placeholder="customer@example.com"
                                                    required readonly
                                                    class="p-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            </div>
                                            <div class="d-none">
                                                <label for="msisdn"
                                                    class="block mb-2 text-sm font-medium text-gray-700">Mobile Number
                                                    *</label>
                                                <input type="tel" name="msisdn" id="msisdn"
                                                    value="{{ old('msisdn') }}" placeholder="0783300000"
                                                    pattern="[0-9]{10}"
                                                    class="p-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                <p class="mt-1 text-xs text-gray-500">Format: Country code + number (e.g.,
                                                    250783300000)</p>
                                            </div>
                                            <input type="hidden" name="cnumber" id="cnumber" value="{{ old('msisdn') }}">
                                        </div>

                                        <div class="space-y-4">
                                            <h3 class="pb-2 text-xl font-semibold text-gray-800 border-b border-gray-200">
                                                <i class="mr-2 fa fa-credit-card"></i>Payment Details
                                            </h3>
                                            <div>
                                                <label for="amount"
                                                    class="block mb-2 text-sm font-medium text-gray-700">Amount *</label>
                                                <div class="relative">
                                                    <input type="number" name="amount" id="amount" value="1050"
                                                        required min="1050" step="1" readonly
                                                        class="p-2 pr-16 w-full rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                    <span
                                                        class="flex absolute inset-y-0 right-5 items-center pr-3 text-gray-500">RWF</span>
                                                </div>
                                            </div>
                                            <div class="d-none">
                                                <label for="currency"
                                                    class="block mb-2 text-sm font-medium text-gray-700">Currency</label>
                                                <select name="currency" id="currency"
                                                    class="p-3 w-full rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                    <option value="RWF" selected>RWF - Rwandan Franc</option>
                                                    <option value="USD">USD - US Dollar</option>
                                                </select>
                                            </div>
                                            <div class="d-none">
                                                <label for="pmethod"
                                                    class="block mb-2 text-sm font-medium text-gray-700">Payment Method
                                                    *</label>
                                                <select name="pmethod" id="pmethod"
                                                    class="p-2 w-full rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                    <option value="">Select Payment Method</option>
                                                    <option value="momo">Mobile Money (MTN/Airtel)</option>
                                                    <option value="cc">Credit/Debit Card</option>
                                                </select>
                                            </div>
                                            <div class="d-none">
                                                <label for="details"
                                                    class="block mb-2 text-sm font-medium text-gray-700">Payment
                                                    Details</label>
                                                <textarea name="details" id="details" rows="3" readonly placeholder="Access payment for partner account."
                                                    class="p-3 w-full rounded-md border border-gray-300 resize-none focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                {{ old('details', 'Payment for partner') }}
                                            </textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Terms and Conditions Section -->
                                    <div class="mt-5 col-md-12">
                                        <div class="card border-primary">
                                            <div class="text-white card-header bg-success">
                                                <h6 class="mb-0">
                                                    <i class="fas fa-file-contract me-2"></i>
                                                    Amategeko n'Amabwiriza yo gukoresha urubuga rwa Tuza Assets Ltd / Tuza
                                                    Assets Terms and Conditions
                                                </h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="p-3 rounded border terms-content"
                                                    style="max-height: 300px; overflow-y: auto; background-color: #f8f9fa;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h6 class="text-primary">English Terms:</h6>
                                                            <ul class="list-unstyled">
                                                                <li class="mb-2">
                                                                    <i class="fas fa-check-circle text-success me-2"></i>
                                                                    You are responsible for the correctness of the
                                                                    data/information you are posting
                                                                </li>
                                                                <li class="mb-2">
                                                                    <i
                                                                        class="fas fa-exclamation-triangle text-warning me-2"></i>
                                                                    Tuza Assets is not responsible for the accurate
                                                                    information provided by the Commissionaires
                                                                </li>
                                                                <li class="mb-2">
                                                                    <i class="fas fa-info-circle text-info me-2"></i>
                                                                    All information you provide about this property you
                                                                    confirm to be true
                                                                </li>
                                                                <li class="mb-2">
                                                                    <i class="fas fa-shield-alt text-secondary me-2"></i>
                                                                    Tuza Assets Ltd is not responsible for followers caused
                                                                    by inaccurate information you provide
                                                                </li>
                                                                <li class="mb-2">
                                                                    <i class="fas fa-ban text-danger me-2"></i>
                                                                    <strong>No refunds. You must use all your credit. Tuza
                                                                        Assets doesn't refund.</strong>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h6 class="text-primary">Amategeko mu Kinyarwanda:</h6>
                                                            <ul class="list-unstyled">
                                                                <li class="mb-2">
                                                                    <i class="fas fa-check-circle text-success me-2"></i>
                                                                    Amakuru yose utanga kuri uyu mutungo uremeza ko ari
                                                                    ukuri
                                                                </li>
                                                                <li class="mb-2">
                                                                    <i
                                                                        class="fas fa-exclamation-triangle text-warning me-2"></i>
                                                                    Tuza Assets Ltd ntabwo yirengera inkurikizi zitewe n'uko
                                                                    amakuru utanze atari ukuri
                                                                </li>
                                                                <li class="mb-2">
                                                                    <i class="fas fa-ban text-danger me-2"></i>
                                                                    <strong>Tuza Assets Ltd ntisubiza amafaranga
                                                                        yakiriye</strong>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-4">
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input @error('terms_accepted') is-invalid @enderror"
                                                            type="checkbox" value="1" id="terms_accepted"
                                                            name="terms_accepted" required
                                                            {{ old('terms_accepted') ? 'checked' : '' }}>
                                                        <label class="form-check-label fw-bold" for="terms_accepted">
                                                            <span class="text-primary">
                                                                Ndemera amategeko n'amabwiriza ya Tuza Assets Ltd
                                                            </span>
                                                            <br>
                                                            <span class="text-secondary">
                                                                I accept the Tuza Assets Ltd Terms and Conditions
                                                            </span>
                                                        </label>
                                                        @error('terms_accepted')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-8">
                                        <button type="submit" id="submitBtn"
                                            class="p-4 w-full font-semibold text-white bg-orange-500 rounded-lg hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <i class="mr-2 fa fa-lock"></i> Process Payment
                                        </button>
                                    </div>

                                    <div class="p-3 mt-4 bg-gray-50 rounded-lg border-l-4 border-orange-500">
                                        <p class="text-sm text-gray-700">
                                            <i class="mr-2 text-blue-500 fa fa-shield-alt"></i>
                                            Your payment is secure and encrypted. You will be redirected to complete it
                                            safely.
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                @endif
            </div>
        </div>
    </div>
@endsection
