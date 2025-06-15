<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function sell_index()
    {
        return view('admin_auth.sell_login');
    }

}
