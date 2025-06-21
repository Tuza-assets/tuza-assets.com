<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate the request data
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone' => ['nullable', 'string', 'max:20'],
            'other_phone' => ['nullable', 'string', 'max:20'],
            'country' => ['nullable', 'string', 'max:100'],
            'province' => ['nullable', 'string', 'max:100'],
            'district' => ['nullable', 'string', 'max:100'],
            'sector' => ['nullable', 'string', 'max:100'],
            'cell' => ['nullable', 'string', 'max:100'],
            'village' => ['nullable', 'string', 'max:100'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // 2MB max
        ]);

        // Handle profile photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($user->profile_photo_path && Storage::disk('profile_photos')->exists($user->profile_photo_path)) {
                Storage::disk('profile_photos')->delete($user->profile_photo_path);
            }

            // Store the new photo in the profile_photos disk
            $photoPath = $request->file('photo')->store('/', 'profile_photos');
            $validatedData['profile_photo_path'] = $photoPath;
        }

        // Update user profile
        $user->update($validatedData);

        // If email was changed, mark as unverified
        if ($user->wasChanged('email')) {
            $user->email_verified_at = null;
            $user->save();
        }

        return redirect()->back()->with('status', 'profile-information-updated');
    }

    public function destroyPhoto(Request $request)
    {
        $user = Auth::user();

        // Delete the photo file from storage
        if ($user->profile_photo_path && Storage::disk('profile_photos')->exists($user->profile_photo_path)) {
            Storage::disk('profile_photos')->delete($user->profile_photo_path);
        }

        // Remove the path from the user record
        $user->profile_photo_path = null;
        $user->save();

        return redirect()->back()->with('status', 'profile-photo-deleted');
    }
}
