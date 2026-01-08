<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['user_id', 'jobdetail_id'];
    // user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // job-detail
    public function job()
    {
        return $this->belongsTo(Jobdetail::class);
    }
}