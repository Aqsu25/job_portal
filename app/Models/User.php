<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // profile
    public function profile()
    {
        return $this->hasOne(profile::class);
    }
    // company
    public function company()
    {
        return $this->hasOne(Company::class);
    }
    // job
    public function job()
    {
        return $this->hasMany(Jobdetail::class);
    }

    // job-like
    public function likedJobs()
    {
        return $this->hasMany(Like::class);
    }

    // save-job
    public function saveJob()
    {
        return $this->hasMany(SaveJob::class);
    }
    // application
    public function application()
    {
        return $this->hasMany(Application::class);
    }

    // pivot-table
    public function degree()
    {
        return $this->belongsToMany(Degree::class, 'degree_user', 'user_id', 'degree_id');
    }

    // request-employer
    public function requestEmployer()
    {
        return $this->hasOne(Request_employer::class);
    }
}
