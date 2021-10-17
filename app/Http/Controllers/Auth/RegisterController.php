<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    private $userService;
    
    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    public function register(Request $request){
        $userValidate = $request->validate([
            'email' => 'required|email|max:200',
            'password' => 'required',
            'name' => 'required|max:200'
        ]);

        $user = $this->userService->store($userValidate);

        $token = $user->createToken('Token_Plano')->plainTextToken;

        return response()->json(['token' => $token]);
    }
}
