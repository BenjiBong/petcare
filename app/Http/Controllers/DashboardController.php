<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\User;
use Auth;
use App\Http\Requests;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $user_id = auth()->user()->id;
       $users = User::find($user_id);
        $users = Auth::user();
        return view('dashboard', array('users' => Auth::user()) )->with('pets',$users->pets);
    }



    public function update(Request $request)
    {
        /* $users = Auth::user();

        if($request->hasFile('profile_img')){
            //Get filename with extension
            $filenameWithExt = $request->file('profile_img')->getClientOriginalName();
            //Get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('profile_img')->getClientOriginalExtension();
            //Filename to Store
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('profile_img')->storeAs('/storage/profile_img', $filenameToStore);
          }

          //to edit pet
          if($request->hasFile('profile_img')){
            //unlink('public/pet_images/' . $pet->pet_image);
            if ($user->profile_img !='default.jpg')
            {
              //Delete Image
              Storage::delete('public/profile_img/'. $user->profile_img);
            }
            $user->profile_img = $filenameToStore;

          }

          $user->save();
*/

       if($request->hasFile('profile_img')){
            $profile_img = $request->file('profile_img');
            $filename = time() . '.' . $profile_img->getClientOriginalExtension();
            Image::make($profile_img)->resize(300,300)->save( public_path('/storage/profile_img/' .$filename ));

            $user = Auth::user();
            $user->profile_img = $filename;
            $user->save();
        }
        return view('/dashboard', array('users' => Auth::user()) );
    }
        //Handle file upload

}
