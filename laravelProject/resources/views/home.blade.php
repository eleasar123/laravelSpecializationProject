@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{$user->profile->profileImage()}}" class="w-100" alt="">
        </div>
        <div class="col-9 p-5">
            <div class="d-flex justify-content-between align-items-baseline"></div>
                <div class="d-flex align-items-center pb-4">
                    <h1>{{$user->name}}</h1>
                    
                    <follow-button user-id="{{ $user->id }}" follows="{{ follows }}"></follow-button>
                </div>
                @can('update', $user->profile)
                <a href="/p/create" class="btn btn-primary">Add New Post</a>
                @endcan
            </div>

            @can('update', $user->profile)
            <a href="/profile/{{ $user->id }}/edit"></a>
            @endcan
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $user->post->count() }}</strong>Post</div>
                <div class="pr-5"><strong>{{ $user->profile->followers->count() }}</strong>Followers</div>
                <div class="pr-5"><strong>{{ $user->following->count()}}</strong>Following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
            <div class="">{{ $user->profile->description}}</div>
            <div href="#">{{ $user->profile->url }}</div>
        </div>
    </div>
    <div class="row">
    @foreach($user->post as $post)
        <div class="col-4">
           <!-- <img src="/storage/{{ $post->image }}.jpg" alt="w-100">-->
           <a href="">
               <img src="/storage/{{$post->id}}" alt="">
           </a>
        </div>
    @endforeach
    </div>
</div>
@endsection
