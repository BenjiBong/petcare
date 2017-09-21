<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;//to be able to delete image. For storage:: library
use App\Pet;//to use eloquent
use Illuminate\Support\Facades\Auth;

class PetsController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');//to require users to log in
  }


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      //
      // $pets = Post::all();
      // $pets = Post::where('title', 'First Post')->get();
      //$pets=DB::select('SELECT * FROM posts'); to use sql
      //$pets = Post::orderBy('created_at', 'asc')->take(1)->get();//to limit to just one post
      //$pets = Post::orderBy('created_at', 'asc')->get();

      if (!Auth::user()){
        return redirect('/')->with('error', 'You need to login!');
      }

      $pets = Pet::orderBy('created_at', 'asc')->paginate(10);//paginate with 10 per page
      return view('pets.index')->with('pets', $pets);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('pets.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $this->validate($request, [
          'name' => 'required',
          'type' => 'required',
          'color' => 'required',
          'pet_image' => 'image|nullable|max:1999',
      ]);

      //Handle file upload
            if($request->hasFile('pet_image')){
              //Get filename with extension
              $filenameWithExt = $request->file('pet_image')->getClientOriginalName();
              //Get just file name
              $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
              //Get just extension
              $extension = $request->file('pet_image')->getClientOriginalExtension();
              //Filename to Store
              $filenameToStore = $filename.'_'.time().'.'.$extension;

              $path = $request->file('pet_image')->storeAs('storage/pet_images', $filenameToStore);
            }
            else {
              $filenameToStore = 'noimage.jpg';
            }
            //to create pet
            $pet = new Pet;
            $pet->name = $request->input('name');
            $pet->type = $request->input('type');
            $pet->color = $request->input('color');
            $pet->user_id = auth()->user()->id;
            $pet->pet_image = $filenameToStore;
            $pet->save();

            return redirect('/dashboard')->with('success', 'Pet Saved');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
      $pet = Pet::find($id);
      return view('pets.show')->with('pet', $pet);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $pet = Pet::find($id);

    if (!Auth::user()){
      return redirect('/')->with('error', 'You need to login!');
    }
    if (auth()->user()->id != $pet->user_id){
      return redirect('/pets')->with('error', 'You do not have permission to edit this pet!');
    }
      return view('pets.edit')->with('pet', $pet);
      //$pets = Pet::orderBy('created_at', 'asc')->paginate(10);//paginate with 10 per page
      //return view('pets.index')->with('pets', $pets);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $this->validate($request, [
        'name' => 'required',
        'type' => 'required',
        'color' => 'required',
        'pet_image' => 'image|nullable|max:1999',
    ]);

    //Handle file upload
          if($request->hasFile('pet_image')){
            //Get filename with extension
            $filenameWithExt = $request->file('pet_image')->getClientOriginalName();
            //Get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('pet_image')->getClientOriginalExtension();
            //Filename to Store
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('pet_image')->storeAs('/storage/pet_images', $filenameToStore);
          }

          //to edit pet
          $pet = Pet::find($id);
          $pet->name = $request->input('name');
          $pet->type = $request->input('type');
          $pet->color = $request->input('color');
          if($request->hasFile('pet_image')){
            //unlink('public/pet_images/' . $pet->pet_image);
            if ($pet->pet_image !='noimage.jpg')
            {
              //Delete Image
              Storage::delete('/storage/pet_images/'. $pet->pet_image);
            }
            $pet->pet_image = $filenameToStore;

          }

          $pet->save();

          return redirect('/dashboard')->with('success', 'Pet Updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $pet = Pet::find($id);
       if ($pet->pet_image !='noimage.jpg')//if pet image exists
       {
         //Delete Image
         Storage::delete('/storage/pet_images/'. $pet->pet_image);
       }
      $pet->delete();
      return redirect('/dashboard')->with('success', 'Pet Deleted');
  }
}
