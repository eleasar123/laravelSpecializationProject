@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="cpl-3 p-5">
            <img src="{{ $user->profiles->profileImage() }}" class="w-100 rounded-circle" style="height: 180px;">
        </div>
        <div class="col-9 p-5">

            <div class="d-flex justify-content-between align-items-baseline">

                <div class = "d-flex align-items-center pb-4"> <!--padding bottom 4 -->
                    <h1>{{ $user->username }}</h1> <!--Mushtash syntax-->

                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>
                
                @can('update', $user->profiles)
                    <a href="/p/create" class="btn btn-primary">Add New Post</a>
                @endcan

            </div>

            @can('update', $user->profiles)
                <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan

            <div class= "d-flex">
                <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div class="pr-5"><strong>{{ $user->profiles->followers->count() }}</strong> followers</div>
                <div class="pr-5"><strong>{{ $user->following->count() }}</strong> following</div>
            </div>

            

            <div class="pt-4 font-weight-bold">{{ $user->profiles->title }}</div>
            <div>{{ $user->profiles->description }}</div>
            <div><a href="#">{{ $user->profiles->url }}</a></div>

        </div>
    </div>

    <div class="row">

    @foreach($user->posts as $post)
        <div class="col-4 pb-3">
            <a href="/p/{{ $post->id }}">
            <img src="/storage/{{ $post->image }}" class="w-100">
            </a>
        </div>
    @endforeach
       

    </div>
</div>
@endsection
