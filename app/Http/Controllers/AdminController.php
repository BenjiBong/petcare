<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;

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
