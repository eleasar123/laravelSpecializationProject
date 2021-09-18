<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage()
    {
        $imagePath= ($this->image) ? $this->image: 'profile/LlIeLF26B3KRnrvJ9fKoF4COGHpYydh8T46eibFy.png';// default image if you register with no image set.

        return '/storage/' . $imagePath;
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class); //builtin function
    }
}
