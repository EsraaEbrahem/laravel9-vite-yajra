<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\adminLoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends BaseController
{

    public function loginForm()
    {
        if(Auth::check())
            return redirect(RouteServiceProvider::DASHBOARD);
        return view('admin.auth.login');
    }


    public function login(AdminLoginRequest $request)
    {
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            throw ValidationException::withMessages([
                'email' => [trans('auth.failed')],
            ]);

        $admin = User::whereEmail($request->email)->first();
        Auth::login($admin);
        return redirect(RouteServiceProvider::DASHBOARD);
    }

}
