<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;

class AuthController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->status == '1') {
            $contacts = Contact::all();
            return view('admin.dashboard', compact('contacts'));
        } elseif ($user->status == '2') {
            return view('designer.dashboard');
        } elseif ($user->status == '3') {
            return view('blogger.dashboard');
        } elseif ($user->status == '4') {
            return view('partner.dashboard');
        } else {
            return view('default.dashboard');
        }
    }
}