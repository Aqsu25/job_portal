<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Degree_user extends Model
{
    protected $fillable = ['user_id', 'degree_id', 'graduation_year', 'institution'];
}
