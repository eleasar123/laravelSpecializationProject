@extends('layouts.app')

@section('content')

<div class="container">

<form action="/p" method="post" enctype="multipart/form-data">
@csrf
    <div class="col-8 offset-2">
    <div class="row">
        <h1>Add New Post</h1>
    </div>

    <div class="form-group row">
        <label>Post Caption</label>
        <input type="text" id="caption" class="form-control @error('caption') is-invalid @enderror" name="caption"
         value="" autocomplete="caption" autofocus>

            @error('caption')
                <span class="Invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
    </div>

    <div class="row">
        <label for="image">Post Image</label>
        <input type="file" name="message" id="image" class="form-control-file">
    </div>
        @error('caption')
            <span class="Invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
             </span>
        @enderror

        <div class="row pt-4">
            <button type="submit" classs="btn-btn-primary">Add New Post</button>
        </div>
    </div>
</form>
         </div>
@endsection
