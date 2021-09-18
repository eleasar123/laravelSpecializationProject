<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //in making account, it should make also a profile
    protected static function boot()
    {
        parent::boot();
        static::created(function($user){
            $user->profiles()->create([
                'title' => $user->username
            ]);
        });
    }

    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('created_at','DESC');//hasMany because user can post many images
    }

    public function following()
    {
        return $this->belongsToMany(Profile::class);
    }

    //parent
    public function profiles()
    {
        return $this->hasOne(Profile::class);
    }
}
