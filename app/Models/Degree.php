<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    protected $fillable = ['name', 'level', 'code'];

    // pivot-table-user
    public function user()
    {
        return $this->belongsToMany(User::class, 'degree_user', 'degree_id', 'user_id');
    }

    // pivot-table-job
    public function job()
    {
        return $this->belongsToMany(Jobdetail::class, 'degree_jobdetail', 'degree_id', 'jobdetail_id');
    }
}
