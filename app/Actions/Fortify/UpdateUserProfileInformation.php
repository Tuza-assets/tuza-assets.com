<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, mixed>  $input
     */
    public function update(User $user, array $input): void
    {
        dd($input);
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'phone' => ['nullable', 'string', 'max:25'],
            'other_phone' => ['nullable', 'string', 'max:25'],
            'country' => ['nullable', 'string', 'max:100'],
            'province' => ['nullable', 'string', 'max:100'],
            'district' => ['nullable', 'string', 'max:100'],
            'sector' => ['nullable', 'string', 'max:100'],
            'cell' => ['nullable', 'string', 'max:100'],
            'village' => ['nullable', 'string', 'max:100'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        $userData = [
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'] ?? null,
            'other_phone' => $input['other_phone'] ?? null,
            'country' => $input['country'] ?? null,
            'province' => $input['province'] ?? null,
            'district' => $input['district'] ?? null,
            'sector' => $input['sector'] ?? null,
            'cell' => $input['cell'] ?? null,
            'village' => $input['village'] ?? null,
        ];

        dd($userData);

        if ($input['email'] !== $user->email && $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $userData);
        } else {
            $user->forceFill($userData)->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string|null>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $input['email_verified_at'] = null;

        $user->forceFill($input)->save();

        $user->sendEmailVerificationNotification();
    }
}
