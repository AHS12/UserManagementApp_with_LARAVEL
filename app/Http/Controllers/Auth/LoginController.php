<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\User;
use Illuminate\Validation\ValidationException;


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
    protected $redirectTo = '/home';

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            // authenticated();
            return redirect()->intended($this->redirectPath());
        }
    }

    /**
     * Method override to send correct error messages
     * Get the failed login response instance.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @use  \Illuminate\Support\Facades\Auth;
     * @use  App\User;
     */

    protected function sendFailedLoginResponse(Request $request)
    {
        // throw ValidationException::withMessages([
        //     $this->username() => [trans('auth.failed')],
        // ])->redirectTo('/login');

        if (!User::where('email', $request->email)->first()) {
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors([
                    $this->username() => [trans('auth.email')],
                ]);
        }

        if (!User::where('email', $request->email)->where('password', bcrypt($request->password))->first()) {
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors([
                    'password' => [trans('auth.password')],
                ]);
        }
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */

    /* Note: use Illuminate\Http\Request;  */

    protected function authenticated(Request $request, $user)
    {
        //$request->session()->flash('message', 'Login Success!');
        flashMsg('Login Success! Welcome ' . $user->name);
        return redirect()->intended($this->redirectPath());
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /*----------------------- Logout -------------
    |  we override the loggedout function to change the
    |  funtionality of the defaults..for example the redirect path
     *-------------------------------------------------------------------*/

    protected function loggedOut(Request $request)
    {
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/login');
    }

}
