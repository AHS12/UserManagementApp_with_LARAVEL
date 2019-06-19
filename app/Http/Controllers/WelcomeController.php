<?php

namespace App\Http\Controllers;

use App\User;

class WelcomeController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fatching all user
        $users = User::all();
        return view('welcome', compact('users'));
    }

}
