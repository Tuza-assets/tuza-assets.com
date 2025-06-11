@extends('layouts.dashboard.app')

@section('content')
    <div class="bg-white container-fluid">
        <div class="row">
            <div class="container p-3 mx-auto">
                <section class="relative z-10 bg-orange-500">
                    <div class="container mx-auto">
                        <div class="flex">
                            <div class="w-full px-4">
                                <div class="mx-auto max-w-[400px] text-center">
                                    <h2
                                        class="mb-2 text-[50px] font-bold leading-none text-white sm:text-[80px] md:text-[100px]">
                                        @yield('code')
                                    </h2>
                                    <h4 class="mb-3 text-[22px] font-semibold leading-tight text-white">
                                        @yield('message')
                                    </h4>
                                    <p class="mb-8 text-lg text-white">
                                        Error page
                                    </p>
                                    <a href="{{ route('dashboard') }}" wire:navigate
                                        class="inline-block px-8 py-3 text-base font-semibold text-center text-white transition border border-white rounded-lg hover:bg-white hover:text-green-500">
                                        Go To Home
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="absolute top-0 left-0 flex items-center justify-between w-full h-full space-x-5 -z-10 md:space-x-8 lg:space-x-14">
                        <div class="h-full w-1/3 bg-gradient-to-t from-[#FFFFFF14] to-[#C4C4C400]"></div>
                        <div class="flex w-1/3 h-full">
                            <div class="h-full w-1/2 bg-gradient-to-b from-[#FFFFFF14] to-[#C4C4C400]"></div>
                            <div class="h-full w-1/2 bg-gradient-to-t from-[#FFFFFF14] to-[#C4C4C400]"></div>
                        </div>
                        <div class="h-full w-1/3 bg-gradient-to-b from-[#FFFFFF14] to-[#C4C4C400]"></div>
                    </div>
                </section>
                <section>
                    <div class="flex flex-col items-start justify-between p-6 bg-white rounded-lg shadow-lg lg:flex-row">
                        <div class="w-full mb-6 lg:w-1/2 lg:mb-0">
                            <p class="mb-4 text-gray-600">
                                Dynamically underwhelm integrated outsourcing via timely models. Rapidiously
                                reconceptualize
                                visionary imperatives without
                            </p>
                            <div class="mb-4">
                                <p class="flex items-center text-gray-800">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 12l-4 4m0 0l-4-4m4 4V4"></path>
                                    </svg>
                                    info@tuza-assets.com
                                </p>
                                <p class="flex items-center text-gray-800">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 10h2l.338 2.015C5.787 15.802 9.26 18 12.29 18H15c.6 0 1.142-.527 1.142-1.176 0-.594-.5-1.058-1.076-1.176H12.29C9.26 15.702 5.787 13.197 5.337 9.985L5 8H3m0 0h2m0 0h2l.338 2.015C7.787 15.802 11.26 18 14.29 18H17c.6 0 1.142-.527 1.142-1.176 0-.594-.5-1.058-1.076-1.176H14.29C11.26 15.702 7.787 13.197 7.337 9.985L7 8H5m0 0H3">
                                        </path>
                                    </svg>
                                    Rwanda: +25 0785 519 538
                                </p>
                            </div>
                            <div class="flex space-x-4">
                                <a href="#" class="text-gray-500 hover:text-gray-900">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M24 4.6a10 10 0 01-2.9.8 5 5 0 002.2-2.8 9.9 9.9 0 01-3.1 1.2 4.8 4.8 0 00-8.3 4.4A13.7 13.7 0 011.6 3.3a4.8 4.8 0 001.5 6.4A4.8 4.8 0 01.9 9v.1a4.8 4.8 0 003.9 4.7 4.8 4.8 0 01-2.2.1 4.8 4.8 0 004.5 3.3A9.7 9.7 0 010 19.6a13.7 13.7 0 007.5 2.2c9 0 13.9-7.5 13.9-14v-.6a10 10 0 002.5-2.6z" />
                                    </svg>
                                </a>
                                <a href="#" class="text-gray-500 hover:text-gray-900">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M24 4.6a10 10 0 01-2.9.8 5 5 0 002.2-2.8 9.9 9.9 0 01-3.1 1.2 4.8 4.8 0 00-8.3 4.4A13.7 13.7 0 011.6 3.3a4.8 4.8 0 001.5 6.4A4.8 4.8 0 01.9 9v.1a4.8 4.8 0 003.9 4.7 4.8 4.8 0 01-2.2.1 4.8 4.8 0 004.5 3.3A9.7 9.7 0 010 19.6a13.7 13.7 0 007.5 2.2c9 0 13.9-7.5 13.9-14v-.6a10 10 0 002.5-2.6z" />
                                    </svg>
                                </a>
                                <a href="#" class="text-gray-500 hover:text-gray-900">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M24 4.6a10 10 0 01-2.9.8 5 5 0 002.2-2.8 9.9 9.9 0 01-3.1 1.2 4.8 4.8 0 00-8.3 4.4A13.7 13.7 0 011.6 3.3a4.8 4.8 0 001.5 6.4A4.8 4.8 0 01.9 9v.1a4.8 4.8 0 003.9 4.7 4.8 4.8 0 01-2.2.1 4.8 4.8 0 004.5 3.3A9.7 9.7 0 010 19.6a13.7 13.7 0 007.5 2.2c9 0 13.9-7.5 13.9-14v-.6a10 10 0 002.5-2.6z" />
                                    </svg>
                                </a>
                                <a href="#" class="text-gray-500 hover:text-gray-900">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M24 4.6a10 10 0 01-2.9.8 5 5 0 002.2-2.8 9.9 9.9 0 01-3.1 1.2 4.8 4.8 0 00-8.3 4.4A13.7 13.7 0 011.6 3.3a4.8 4.8 0 001.5 6.4A4.8 4.8 0 01.9 9v.1a4.8 4.8 0 003.9 4.7 4.8 4.8 0 01-2.2.1 4.8 4.8 0 004.5 3.3A9.7 9.7 0 010 19.6a13.7 13.7 0 007.5 2.2c9 0 13.9-7.5 13.9-14v-.6a10 10 0 002.5-2.6z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="w-full lg:w-1/2">
                            <form action="{{ route('admin.contact.store') }}" method="POST">
                                <div class="mb-4">
                                    <input type="text" name="name" placeholder="Name"
                                        class="w-full p-2 border border-gray-300 rounded-md">
                                </div>
                                <div class="mb-4">
                                    <input type="email" name="email" placeholder="Email"
                                        class="w-full p-2 border border-gray-300 rounded-md">
                                </div>
                                <div class="mb-4">
                                    <input type="text" name="subject" placeholder="Subject"
                                        class="w-full p-2 border border-gray-300 rounded-md">
                                </div>
                                <div class="mb-4">
                                    <textarea name="message" placeholder="Type your message" class="w-full h-32 p-2 border border-gray-300 rounded-md"></textarea>
                                </div>
                                <div>
                                    <button type="submit"
                                        class="w-full p-2 text-white bg-green-500 rounded-md">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
