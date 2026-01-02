<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status'];

    // job-detail
    public function jobDetail()
    {
        return $this->belongsTo(Jobdetail::class);
    }
}
