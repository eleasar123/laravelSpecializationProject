<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class PostController extends Controller
{
    //

    public function _construct(){
        $this->middleware('auth');
        
    }

    public function index(){
        $users = auth()->user()->following()->pluck('profiles.user_id');   
        
        $posts = Post::wherein('user_id', $users) ->latest()->get();

        dd($posts);
        return view('posts.index', compact('posts'));
    }

    public function create(){
        return view('post.create');
    }

    public function store(){
        $data=request()->validate([
            'caption' => 'required',
            'image' => ['required','image']
        ]);

        //dd(request('image')->store('uploads', 'public'));
        $imagePath=request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->resize(1200,1200);
        $image->save();
        auth()->user()->post()->create([
            'caption' => $data['caption'],
            'image' => $imagePath
        ]);

        dd(request()->all());
    }

    public function show( \App\Post $post){
        
        //dd($post);

        return view("post.show", compact('post'));
    }
}
