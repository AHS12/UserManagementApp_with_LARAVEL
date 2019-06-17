<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'birthDate' => ['required', 'date'],
            'image' => ['required', 'image', 'max:2048'],
        ]);
    }

    /**
     * pick up the image file and process it
     *
     * @param  App\Http\Requests;
     * @return image file Name
     */

    public function getUserImage(Request $request)
    {
        $image = $request->file('image');
        $processedImg = time() . rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $processedImg);
        return $processedImg;

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param
     * @return \App\User
     */

    protected function create(array $data)
    {
        $request = request();
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $processedImg = time() . rand() . '.' . $extension;
        $image->move(public_path('images'), $processedImg);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'birthDate' => Carbon::parse($data['birthDate']),
            'image' => $processedImg,
        ]);


        return $user;
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        $request->session()->flash('message', 'Registration Successful');

        return $this->registered($request, $user)
        ?: redirect($this->redirectPath());
    }
}
