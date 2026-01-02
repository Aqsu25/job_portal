<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profileimage extends Model
{
    protected $fillable = ['profile_id', 'image'];
    // profile
    public function profile()
    {
        return $this->belongsTo(profile::class);
    }
}
