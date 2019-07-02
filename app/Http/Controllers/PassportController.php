<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Jobs\UserCreatedMailJob;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PassportController extends Controller
{
    /**
     * Handles Registration Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'birthDate' => 'required|date',
        ]);

        // $request = request();
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $processedImg = time() . rand() . '.' . $extension;
        $image->move(public_path('images'), $processedImg);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'birthDate' => Carbon::parse($request->birthDate),
            'image' => $processedImg,
        ]);

        $user->roles()->attach(2);
        dispatch(new UserCreatedMailJob($user));

        $token = $user->createToken('myToken')->accessToken;

        return response()->json(['token' => $token], 200);
    }

    /**
     * Handles Login Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('myToken')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'UnAuthorised'], 401);
        }
    }

    /**
     * Returns Authenticated User Details
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function details()
    {
        $authUser = new UserResource(auth()->user());
        return response()->json($authUser, 200);
    }
}
