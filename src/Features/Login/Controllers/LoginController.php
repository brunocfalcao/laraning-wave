<?php

namespace Laraning\Wave\Features\Login\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('wave.guest')->except('logout');
    }

    public function showLoginForm()
    {
        return flame();
    }

    protected function guard()
    {
        return Auth::guard('wave');
    }

    protected function redirectTo()
    {
        return route('wave.home');
    }

    public function login(Request $request)
    {
        // Validate request.
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::guard('wave')->attempt($request->only(['email', 'password']), $request->filled('remember'))) {
            return redirect()->intended(route('wave.home'));
        } else {
            throw ValidationException::withMessages([
                'email' => [trans('auth.failed')], ]);
        }
    }
}
