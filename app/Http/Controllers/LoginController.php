<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Login;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('users.login', [
            'title' => 'Login',
        ]);
    }


    public function create()
    {
        //
    }


    public function store(LoginRequest $request)
    {

        if (
            Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ], $request->input('remember'))
        ) {
            return redirect()->route('admin');
        }
        session()->flash('error', 'email hoặc mật khẩu không chính xác');
        return redirect()->back();
    }


    public function show(Login $login)
    {
        //
    }


    public function edit(Login $login)
    {
        //
    }


    public function update(Request $request, Login $login)
    {
        //
    }


    public function destroy(Login $login)
    {
        //
    }
}