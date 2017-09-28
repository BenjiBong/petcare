<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Admin;
use Image;
use Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin');
    }

    public function showUsers(){
      $users = User::orderBy('created_at', 'asc')->paginate(10);//paginate with 10 per page
      return view('admin.users')->with('users', $users);
    }
    public function showProducts(){
      $products = Product::orderBy('created_at', 'asc')->paginate(10);//paginate with 10 per page
      return view('admin.products')->with('products', $products);
    }

    public function update(Request $request)
    {
       if($request->hasFile('profile_img')){
            $profile_img = $request->file('profile_img');
            $filename = time() . '.' . $profile_img->getClientOriginalExtension();
            Image::make($profile_img)->resize(300,300)->save( public_path('/storage/profile_img/' .$filename ));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        $user_id = auth()->user()->id;
        $users = Admin::find($user_id);
         $users = Auth::user();
        return view('/admin');
    }

    public function destroyUser($id)
    {
        $user = User::find($id);
         if ($user->profile_img !='default.jpg')//if pet image exists
         {
           //Delete Image
           Storage::delete('/storage/profile_img/'. $user->profile_img);
         }
        $user->delete();
        return redirect('/admin/users')->with('success', 'User Deleted');
    }


    
}
