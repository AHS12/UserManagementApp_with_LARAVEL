<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    //
    public function updateUserImg(User $user)
    {

        // request()->validate([
        //     'image' => ['required', 'image', 'max:2048'],
        // ]);
       $this->validate(request(), ['image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);

        $image = request()->file('image');
        $processedImg = time() . rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $processedImg);

        $user->image = $processedImg;
        $user->save();

        flashMsg('Image Updated');

        return redirect()->back();

    }

}
