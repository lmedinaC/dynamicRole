<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function logout()
    {
        Auth::user()->tokens()->delete();

        return [
            'message' => 'Logged out',
        ];
    }
}
