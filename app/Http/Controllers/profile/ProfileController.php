<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate the request
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
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        // Ensure the profile_photos directory exists
        $publicPath = public_path('profile_photos');
        if (!File::exists($publicPath)) {
            File::makeDirectory($publicPath, 0755, true);
        }

        // Handle profile photo upload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $newPhotoName = uniqid('photo_') . '.' . $photo->getClientOriginalExtension();

            // Delete old photo if it exists
            if ($user->profile_photo_path && File::exists(public_path($user->profile_photo_path))) {
                File::delete(public_path($user->profile_photo_path));
            }

            // Move new photo to public/profile_photos
            $photo->move($publicPath, $newPhotoName);

            // Save the relative path to DB
            $validatedData['profile_photo_path'] = 'profile_photos/' . $newPhotoName;
        }

        // Update user information
        $user->update($validatedData);

        // If email was changed, mark it as unverified
        if ($user->wasChanged('email')) {
            $user->email_verified_at = null;
            $user->save();
        }

        return redirect()->back()->with('status', 'profile-information-updated');
    }

    public function destroyPhoto(Request $request)
    {
        $user = Auth::user();

        // Delete the photo file if it exists
        if ($user->profile_photo_path && File::exists(public_path($user->profile_photo_path))) {
            File::delete(public_path($user->profile_photo_path));
        }

        // Clear the profile photo path in the database
        $user->profile_photo_path = null;
        $user->save();

        return redirect()->back()->with('status', 'profile-photo-deleted');
    }
}
