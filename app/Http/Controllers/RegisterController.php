<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $rules = [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
            'name' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput(); 
        }

        $userData = [
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => $request->name,
        ];
        $user = User::create($userData);
        Auth::login($user);
        return redirect()->route('dashboard');
    }
}