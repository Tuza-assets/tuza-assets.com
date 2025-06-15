<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\URL;


class AuthenticationController extends Controller
{

     public function remoteLogin(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => true, 'message' => $validator->errors()->first(), 'data' => null], 422);
        }
            // Attempt to authenticate the user
        if (!auth()->attempt($request->only('email', 'password'))) {
            return response()->json(['error' => true, 'message' => 'Invalid login details', 'data' => null], 401);
        }

    try {
        $user = User::where('email', $request->get('email'))->first();

            $url = URL::temporarySignedRoute('admin.authenticate.guest', now()->addHours(2), ['user' => $user->id]);

            return response()->json([
                'error' => false,
                'message' => 'User logged in successfully',
                'access_token' => $url,
                'token_type' => 'access_link',
            ], 200);


        } catch (\Throwable $th) {
            return response()->json(['error' => true, 'message' => 'An error occurred during login', 'data' =>   $user], 500);
        }
    }
}