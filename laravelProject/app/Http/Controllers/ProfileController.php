<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use \App\Profile;
class ProfileController extends Controller
{
    //
    public function index(User $user){
       // $user = User::findorfail($user);

      // dd($user);
      $follows=(auth()->user()) ? auth()->user()->following->contains($user->id): false;
        //return view("home",['user' => $user]);
        return view("home", compact('user', 'follows'));// should be change to index to view with other's profiles
    }


    public function edit(User $user){
        //dd($user);
        $this->authorize('update', $user->profile);
        return view("profiles.edit", compact('user'));
    }

    public function update(User $user){
        //dd($user);
        $data= request()->validate([
             'title' => 'required',
             'description' => 'required',
             'url' => 'url',
             'image' => ''
        ]);

        if(request('image')){

            $imagePath=request('image')->store('uploads', 'public');

            $image=Image::make(public_path("storage/{$imagePath}"))->resize(1000, 1000);
            $image->save();
            $imageArray = ['image' => $imagePath];
        }

        auth()->$user->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{{$user->id}})");
    }
}
