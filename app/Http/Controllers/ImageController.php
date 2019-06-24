<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    //
    public function updateUserImg(User $user)
    {

        // request()->validate([
        //     'image' => ['required', 'image', 'max:2048'],
        // ]);
        $this->validate(request(), ['image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048']);

        $image = request()->file('image');
        $processedImg = time() . rand() . '.' . $image->getClientOriginalExtension();

        //deleting current image
        $currentImg = $user->image;
        $image_path = public_path() . "/images/" . $currentImg;
        // dd($image_path);

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $image->move(public_path('images'), $processedImg);

        $user->image = $processedImg;
        $user->save();

        flashMsg('Image Updated');

        return redirect()->back();

    }

}
