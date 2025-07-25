<x-guest-layout>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="flex overflow-hidden w-full max-w-5xl bg-white rounded-lg shadow-lg">
            <!-- Left Side: Image and Overlay -->
            <div class="flex relative flex-col justify-center items-center p-8 w-1/2 bg-green-800 hidd-left"
                style="background: linear-gradient(rgba(34, 197, 94, 0.85), rgba(34, 197, 94, 0.85)), url('{{ asset('assets/images/prop3.jpg') }}') center/cover no-repeat;">
                <div class="z-10 text-center text-white">
                    <h2 class="mb-2 text-3xl font-bold">WELCOME BACK</h2>
                    <p class="text-lg font-semibold">Sign in to continue your journey!</p>
                </div>
            </div>



            <!-- Right Side: Form -->
            <div class="overflow-y-auto p-8 w-full max-h-screen bg-white dark:bg-gray-800">
                <div class="w-full">
                    <div class="mb-8 w-full">
                        <x-authentication-card-logo class="mx-auto mb-4" />
                        <h1 class="mb-2 text-3xl font-bold text-gray-900 uppercase dark:text-white">Sign In</h1>
                        <p class="text-gray-600 dark:text-gray-400">Enter your credentials to continue</p>
                    </div>

                    <x-validation-errors class="mb-4" />

                    @if (session('status'))
                        <div class="mb-4 text-sm font-medium text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-6 w-full">
                        @csrf

                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                {{ __('Email') }}
                            </label>
                            <input type="email" id="email" name="email" :value="old('email')"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                placeholder="john@example.com" required autofocus autocomplete="username">
                        </div>

                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                {{ __('Password') }}
                            </label>
                            <input type="password" id="password" name="password"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                placeholder="••••••••" required autocomplete="current-password">
                        </div>

                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <input id="remember_me" name="remember" type="checkbox"
                                    class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-green-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-green-600 dark:ring-offset-gray-800 dark:focus:ring-offset-2">
                                <label for="remember_me" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    {{ __('Remember me') }}
                                </label>
                            </div>

                            @if (Route::has('password.request'))
                                <a class="text-sm text-green-600 hover:underline dark:text-green-500"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>

                        <div class="flex justify-between items-center mt-8">
                            <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('register') }}">
                                {{ __('Need an account?') }}
                            </a>
                            <div class="flex gap-4">
                                <button type="reset"
                                    class="px-6 py-2 font-semibold text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">RESET</button>
                                <x-button class="px-6 py-2 font-semibold bg-green-600 rounded-md hover:bg-green-700">
                                    {{ __('Sign In') }}
                                </x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
