<?php

namespace App\Http\Controllers\Subscriber;

use App\Http\Requests\SubscriberLoginRequest;
use App\Models\Subscriber;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class AuthController extends BaseController
{
    public function loginForm()
    {
        if (Auth::check())
            return redirect(RouteServiceProvider::HOME);
        return view('subscriber.auth.login');
    }

    public function login(SubscriberLoginRequest $request)
    {
        if (!Auth::attempt(['username' => $request->username, 'password' => $request->password]))
            throw ValidationException::withMessages([
                'username' => [trans('auth.failed')],
            ]);

        $subscriber = Subscriber::whereUsername($request->username)->first();
        Auth::login($subscriber);
        Self::swapping($subscriber);
        return redirect(RouteServiceProvider::HOME);
    }

    public function swapping($subscriber)
    {
        if ($subscriber->last_session_id != null) {
            $last_session = Session::getHandler()->read($subscriber->last_session_id);

            if ($last_session)
               $res = Session::getHandler()->destroy($subscriber->last_session_id);
        }

        $subscriber->update([
            'last_session_id' => Session::getId()
        ]);
    }
}
