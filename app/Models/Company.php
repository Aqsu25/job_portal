<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'website', 'email', 'employer_id'];
    // job-detail
    public function jobDetail()
    {
        return $this->hasMany(Jobdetail::class);
    }
    // employer
    public function employer()
    {
        return $this->belongsTo(User::class, 'employer');
    }
}
