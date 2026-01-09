<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{

    protected $fillable = ['user_id', 'jobdetail_id', 'employer_id', 'applied_date'];

    // job
    public function job()
    {
        return $this->belongsTo(Jobdetail::class,'jobdetail_id');
    }
    // user
       public function user()
    {
        return $this->belongsTo(User::class);
    }
}
