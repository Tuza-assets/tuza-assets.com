<form method="POST" action="{{ route('user-profile-information.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Profile Photo -->
    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
            <!-- Profile Photo File Input -->
            <input type="file" id="photo" name="photo" x-ref="photo"
                x-on:change="photoName = $refs.photo.files[0].name;
                                        const reader = new FileReader();
                                        reader.onload = (e) => {
                                            photoPreview = e.target.result;
                                        };
                                        reader.readAsDataURL($refs.photo.files[0]);
                                " />

            <x-label for="photo" value="{{ __('Photo') }}" />

            <!-- Current Profile Photo -->
            <div class="mt-2" x-show="!photoPreview">
                <img src="{{ Auth::user()->profile_photo_path ? asset(Auth::user()->profile_photo_path) : asset('images/default-avatar.png') }}"
                    alt="{{ Auth::user()->name }}" class="object-cover w-20 h-20 rounded-full">
            </div>

            <!-- New Profile Photo Preview -->
            <div class="mt-2" x-show="photoPreview" style="display: none;">
                <span class="block w-20 h-20 bg-center bg-no-repeat bg-cover rounded-full"
                    x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                </span>
            </div>

            <x-input-error for="photo" class="mt-2" />
        </div>
    @endif

    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
        <!-- Name -->
        <div class="col-span-1">
            <x-label for="name" value="{{ __('Full Name') }}" />
            <x-input id="name" name="name" type="text" class="block w-full mt-1"
                value="{{ old('name', Auth::user()->name ?? '') }}" required autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-1">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" name="email" type="email" class="block w-full mt-1"
                value="{{ old('email', Auth::user()->email ?? '') }}" required autocomplete="email" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) &&
                    !Auth::user()->hasVerifiedEmail())
                <p class="mt-2 text-sm text-yellow-600">
                    {{ __('Your email address is unverified.') }}

                <form method="POST" action="{{ route('verification.send') }}" class="inline">
                    @csrf
                    <button type="submit"
                        class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </form>
                </p>

                @if (session('status') == 'verification-link-sent')
                    <p class="mt-2 text-sm font-medium text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>

        <!-- Phone -->
        <div class="col-span-1">
            <x-label for="phone" value="{{ __('Phone Number') }}" />
            <x-input id="phone" name="phone" type="tel" class="block w-full mt-1"
                value="{{ old('phone', Auth::user()->phone ?? '') }}" autocomplete="tel" />
            <x-input-error for="phone" class="mt-2" />
        </div>

        <!-- Other Phone -->
        <div class="col-span-1">
            <x-label for="other_phone" value="{{ __('Other Phone Number') }}" />
            <x-input id="other_phone" name="other_phone" type="tel" class="block w-full mt-1"
                value="{{ old('other_phone', Auth::user()->other_phone ?? '') }}" autocomplete="tel" />
            <x-input-error for="other_phone" class="mt-2" />
        </div>
    </div>

    <!-- Location Information Section -->
    <div class="col-span-6 mt-8">
        <h3 class="mb-4 text-lg font-medium text-gray-900">{{ __('Location Information') }}</h3>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            <!-- Country -->
            <div class="col-span-1">
                <x-label for="country" value="{{ __('Country') }}" />
                <x-input id="country" name="country" type="text" class="block w-full mt-1"
                    value="{{ old('country', Auth::user()->country ?? '') }}" autocomplete="country" />
                <x-input-error for="country" class="mt-2" />
            </div>

            <!-- Province -->
            <div class="col-span-1">
                <x-label for="province" value="{{ __('Province') }}" />
                <x-input id="province" name="province" type="text" class="block w-full mt-1"
                    value="{{ old('province', Auth::user()->province ?? '') }}" autocomplete="address-level1" />
                <x-input-error for="province" class="mt-2" />
            </div>

            <!-- District -->
            <div class="col-span-1">
                <x-label for="district" value="{{ __('District') }}" />
                <x-input id="district" name="district" type="text" class="block w-full mt-1"
                    value="{{ old('district', Auth::user()->district ?? '') }}" autocomplete="address-level2" />
                <x-input-error for="district" class="mt-2" />
            </div>

            <!-- Sector -->
            <div class="col-span-1">
                <x-label for="sector" value="{{ __('Sector') }}" />
                <x-input id="sector" name="sector" type="text" class="block w-full mt-1"
                    value="{{ old('sector', Auth::user()->sector ?? '') }}" />
                <x-input-error for="sector" class="mt-2" />
            </div>

            <!-- Cell -->
            <div class="col-span-1">
                <x-label for="cell" value="{{ __('Cell') }}" />
                <x-input id="cell" name="cell" type="text" class="block w-full mt-1"
                    value="{{ old('cell', Auth::user()->cell ?? '') }}" />
                <x-input-error for="cell" class="mt-2" />
            </div>

            <!-- Village -->
            <div class="col-span-1">
                <x-label for="village" value="{{ __('Village') }}" />
                <x-input id="village" name="village" type="text" class="block w-full mt-1"
                    value="{{ old('village', Auth::user()->village ?? '') }}" />
                <x-input-error for="village" class="mt-2" />
            </div>
        </div>
    </div>

    <div class="flex items-center justify-end mt-6">
        @if (session('status') === 'profile-information-updated')
            <p class="text-sm text-green-600 me-3">{{ __('Saved.') }}</p>
        @endif

        <x-button type="submit">
            {{ __('Save') }}
        </x-button>
    </div>
</form>
