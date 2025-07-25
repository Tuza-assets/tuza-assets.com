<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="flex w-full max-w-5xl overflow-hidden bg-white rounded-lg shadow-lg">
            <!-- Left Side: Image and Overlay -->
            <div class="relative flex flex-col items-center justify-center w-1/2 p-8 bg-green-800 hidd-left"
                style="background: linear-gradient(rgba(34, 197, 94, 0.85), rgba(34, 197, 94, 0.85)), url('{{ asset('assets/images/prop5.jpg') }}') center/cover no-repeat;">
                <div class="z-10 text-center text-white">
                    <h2 class="mb-2 text-3xl font-bold">WELCOME</h2>
                    <p class="text-lg font-semibold">Learn about your account access and policies</p>
                </div>
            </div>

            <!-- Right Side: Terms and Conditions -->
            <div class="w-full max-h-screen p-8 overflow-y-auto bg-white dark:bg-gray-800">
                <div class="w-full space-y-6">
                    <x-authentication-card-logo class="mx-auto mb-4" />

                    <h1 class="mb-4 text-3xl font-bold text-gray-900 uppercase dark:text-white">
                        Terms and Conditions
                    </h1>
                    <hr>

                    <div class="space-y-4 text-sm leading-relaxed text-gray-800 dark:text-gray-200">
                        <h2 class="text-xl font-semibold">Account Creation Process</h2>
                        <ol class="space-y-1 list-decimal list-inside">
                            <li>Sign up (using the form)</li>
                            <li>Confirmation link sent to the email</li>
                            <li>Sign in</li>
                        </ol>

                        <h2 class="mt-6 text-xl font-semibold">User Account Terms</h2>
                        <p>
                            Kugirango wemererwe kwamamaza ku rubuga rwa <strong>Tuza Assets Ltd</strong>,
                            usabwa kwishyura amafaranga <strong>1050 Frw</strong> kuri buri post imara iminsi 30,
                            akongera kwishyurwa iyo minsi irangiye.
                        </p>
                        <p>
                            To have full access to sell through <strong>Tuza Assets Ltd</strong>,
                            you must pay an <strong>access fee of Frw 1050</strong> for a 30-day period.
                            The access is renewed by topping up at the end of each period.
                        </p>

                        <h2 class="mt-6 text-xl font-semibold">Payment Method</h2>
                        <ul class="space-y-1 list-disc list-inside">
                            <li>Kwishyura ukoresheje MoMo</li>
                            <li><strong>Credit Amount / Amafaranga: FRW 1050,-</strong></li>
                            <li>Account Access</li>
                        </ul>
                    </div>

                    <div class="flex justify-center mt-8">
                        <a href="{{ route('register') }}"
                           class="inline-block px-6 py-2 font-semibold text-white bg-green-600 rounded-md hover:bg-green-700">
                            Proceed to Register
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
