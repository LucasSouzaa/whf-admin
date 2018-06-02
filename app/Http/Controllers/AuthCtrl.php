<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Usuario;
use Illuminate\Http\Request;

class AuthCtrl extends Controller
{
    public function login()
    {
        $validator = Validator::make(request()->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6'
        ]);

        if ($validator->fails()) {
            return redirect('login')->withErrors($validator);
        }

        $usuario = [
            'email' => request()->post('email'),
            'password' => request()->post('password'),
            'status' => 'a'
        ];

        if (Auth::attempt($usuario, true)) {
            return redirect()->route('auth.home');
        }

        $validator->errors()->add('email', 'Login inválido!');

        return redirect('login')->withErrors($validator);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function home()
    {
        return view('home')->with('usuario', Auth::user());
    }

}
