<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $fillable = ['user_id', 'designation', 'image', 'phone'];

    // user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // profile-img 
        public function profile_image()
    {
        return $this->hasOne(Profileimage::class);
    }

}
