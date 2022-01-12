<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  Request  $request
     *
     * @return Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if (Auth::user()->hasRole('Admin')) {
            $this->redirectTo = 'dashboard';
        } else {
            if (Auth::user()->hasRole(['Receptionist'])) {
                $this->redirectTo = 'appointments';
            } elseif (Auth::user()->hasRole(['Doctor', 'Case Manager', 'Lab Technician', 'Pharmacist'])) {
                $this->redirectTo = 'employee/doctor';
            } elseif (Auth::user()->hasRole(['Patient'])) {
                $this->redirectTo = 'patient/my-cases';
            } elseif (Auth::user()->hasRole(['Nurse'])) {
                $this->redirectTo = 'bed-types';
            } elseif (Auth::user()->hasRole(['Accountant'])) {
                $this->redirectTo = 'accounts';
            } else {
                $this->redirectTo = 'employee/notice-board';
            }
        }

        if (! isset($request->remember)) {
            return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath())
                    ->withCookie(\Cookie::forget('email'))
                    ->withCookie(\Cookie::forget('password'))
                    ->withCookie(\Cookie::forget('remember'));
        }

        return $this->authenticated($request, $this->guard()->user())
            ?: redirect()->intended($this->redirectPath())
                ->withCookie(\Cookie::make('email', $request->email, 3600))
                ->withCookie(\Cookie::make('password', $request->password, 3600))
                ->withCookie(\Cookie::make('remember', 1, 3600));
    }
}
