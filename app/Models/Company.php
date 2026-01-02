<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'location', 'website', 'email'];
    // job-detail
    public function jobDetail()
    {
        return $this->hasOne(Jobdetail::class);
    }
}
