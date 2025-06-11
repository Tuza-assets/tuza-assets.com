@extends('layouts.dashboard.app')

@section('content')
    <div class="px-2 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">


            <div class="py-2 mx-3 auto max-w-7xl sm:px-6">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    {{ __('Profile') }}
                </h2>
                @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                    @livewire('profile.update-profile-information-form')

                    <x-section-border />
                @endif

                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    <div class="mt-10 sm:mt-0">
                        @livewire('profile.update-password-form')
                    </div>

                    <x-section-border />
                @endif

            </div>
    </div>
@endsection
