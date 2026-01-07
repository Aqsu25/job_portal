<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{

    protected $table = 'application';
    protected $fillable = ['user_id', 'jobdetail_id', 'employer_id', 'applied_date'];

    // job
    public function job()
    {
        return $this->belongsTo(Jobdetail::class,'jobdetail_id');
    }
}
