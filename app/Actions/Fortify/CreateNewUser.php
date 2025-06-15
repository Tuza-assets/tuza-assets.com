<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'phone' => ['required', 'string', 'max:20'],
            'country' => ['required', 'string', 'max:255'],
            'province' => ['required', 'string', 'max:255'],
            'district' => ['required', 'string', 'max:255'],
            'sector' => ['required', 'string', 'max:255'],
            'cell' => ['required', 'string', 'max:255'],
            'village' => ['required', 'string', 'max:255'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // Generate the user ID
        $lastUser = User::orderBy('id', 'desc')->first();
        $number = $lastUser ? (int) substr($lastUser->user_id, 3, -2) + 1 : 1;
        $userId = 'TAA' . str_pad($number, 4, '0', STR_PAD_LEFT) . 'RW';

        $user = User::create([
            'user_id' => $userId,
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'SecretPassword' => $input['password'],
            'phone' => $input['phone'],
            'country' => $input['country'],
            'province' => $input['province'],
            'district' => $input['district'],
            'sector' => $input['sector'],
            'cell' => $input['cell'],
            'village' => $input['village'],
            'user_role' => 'user',
        ]);

        // Auto-login the user after creation
        Auth::login($user);

        return $user;
    }
}
