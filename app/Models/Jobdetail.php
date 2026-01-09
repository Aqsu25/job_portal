<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobdetail extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'vacancy', 'salary', 'location', 'description', 'company_id', 'category_id', 'type_id', 'benefits', 'responsibility', 'qualifications', 'keywords', 'experience', 'employer_id', 'degree_id', 'status', 'isFeatured'];
    // company
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    // category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // type
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    // application
    public function application()
    {
        return $this->hasMany(Application::class);
    }
    // like
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    // likedbyuser
    public function liked($userId)
    {
        return $this->likes()->where('user_id', $userId)->exists();
    }
    // savejob
    public function saveJob()
    {
        return $this->hasMany(SaveJob::class);
    }
}
