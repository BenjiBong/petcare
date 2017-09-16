<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
class UserController extends Controller
{
    //
    public function dashboard(){
        return view('dashboard', array('user' => Auth::user()) );
    }

    public function update_profile(Request $request){
        //Handle the user upload of avatar
        if($request->hasFile('profile_img')){
            $profile_img = $request->file('profile_img');
            $filename = time() . '.' . $profile_img->getClientOriginalExtension();
            Image::make($profile_img)->resize(300,300)->save( public_path('/storage/profile_image/' .$filename ));

            $user = Auth::user();
            $user->profile_img = $filename;
            $user->save;
        }
        return view('dashboard', array('user' => Auth::user()) );
    }
}
