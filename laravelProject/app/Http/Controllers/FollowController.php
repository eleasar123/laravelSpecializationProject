<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
class FollowController extends Controller
{                                                                
    //

    public function _construct(){
        $this->middleware()->auth();
    }
    public function store(User $user){
        return auth()->user()->following()->toggle($user->profile);
    }
}
