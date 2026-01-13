<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request_employer extends Model
{
    protected $table = 'request_employer';

    protected $fillable = ['user_id', 'request_employer', 'status'];

    public function employer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
