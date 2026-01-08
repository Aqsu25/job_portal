<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaveJob extends Model
{
    protected $fillable = ['user_id', 'jobdetail_id'];

    // user-save
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // job-detail
    public function job()
    {
        return $this->belongsTo(Jobdetail::class, 'jobdetail_id');
    }
}
