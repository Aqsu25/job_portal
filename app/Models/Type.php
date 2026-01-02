<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Type extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status'];

    // job-detail
    public function jobDetail()
    {
        return $this->hasOne(Jobdetail::class);
    }
}
