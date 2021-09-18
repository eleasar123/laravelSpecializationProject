@extends('layouts.app')

@section('content')

<div class="container">

    @foreach($posts as $post)
    <div class="row">
        <div class="col-8 offset-2">
            <img src="{{ $post->image }}" alt="" class="w-100">
        </div>

            <div class="d-flex align-items-center">
                <img src="/storage/{{$post->user->profile->profileImage()}}" class="rounded-circle w-100" style="max-width:40px;">
            </div>
            
            <div>
                <h5 class="font-weight-bold">
                    <a href="/profile/{{$post->user->id}}"><span class="text-dark"> {{ $post->user->username}}</span></a>
                   
                </h5>
            </div>
            <span class="text-dark"> {{ $post->user->username}}</span>
            <p><span>{{ $post->caption }}</span></p>
            <hr>

    </div>  
    @endforeach
</div>
@endsection
