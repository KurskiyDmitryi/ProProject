<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    function login_form()
    {
        return view('login.login_form');
    }

    function registration_form()
    {
        return view('login.registration_form');
    }

    function registration_process(loginRequest $request)
    {

            User::create([
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'name' => $request->name,
            ]);
dd('helloy');

//        return redirect()->route('login')->with('success', 'Регистрация прошла успешно');

    }

}
