@extends('layouts.app')

@section('content')

<div class="container">

<form action="/profile/{{$user->id}}" method="post" enctype="multipart/form-data">
@csrf
@method('PATCH')    
    <div class="col-8 offset-2">
    <div class="row">
        <h1>Add New Post</h1>
    </div>

    <div class="form-group row">
        <label for="title">Title</label>
        <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title"
         value="{{ old('title') ?? $user->profile->title }}" autocomplete="title" autofocus>

            @error('title')
                <span class="Invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
    </div>

    <div class="row">
        <label for="description">Description</label>
        <textarea name="description" id="" cols="30" rows="5"
             name="description" id="image" class="form-control-file">{{ old('description') ?? $user->profile->description }}</textarea>
   
        @error('description')
            <span class="Invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
             </span>
        @enderror
    </div>
        

    <div class="form-group row">
        <label for="url">Url/Website</label>
        <input type="text" id="url" class="form-control @error('url') is-invalid @enderror" name="url"
         value="{{ old('url') ?? $user->profile->url }}" autocomplete="url" autofocus>

            @error('url')
                <span class="Invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
    </div>

    <div class="row">
        <label for="image">Profile Image</label>
        <input type="file" name="message" id="image" class="form-control-file" values="{{ old('image') ?? $user->profile->image }}">
    </div>
        @error('image')
            <span class="Invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
             </span>
        @enderror

        <div class="row pt-4">
            <button type="submit" classs="btn-btn-primary">Update Profile</button>
        </div>

    </div>
</form>
         </div>
@endsection
