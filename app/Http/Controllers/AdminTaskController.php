<?php

namespace App\Http\Controllers;

use App\User;
use App\Jobs;
use App\Jobs\AdminCreatedMailJob;

class AdminTaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    //
    public function makeAdmin(User $user)
    {
        $user->roles()->sync(1);
        flashMsg($user->name.' is Now Admin');
        dispatch( new AdminCreatedMailJob($user));

        return redirect()->back();

    }

    public function makeUser(User $user)
    {
        $user->roles()->sync(2);

        flashMsg($user->name.' is Now User');
        return redirect()->back();

    }

    public function DemoteToUser(User $user)
    {
        $user->roles()->sync(2);
        flashMsg($user->name.' You are No Longer Admin');
        return redirect()->route('home');

    }

}
