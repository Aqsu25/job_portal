<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jobdetail extends Model
{
    protected $fillable = ['title', 'vacancy', 'salary', 'location', 'description', 'company_id', 'category_id', 'type_id', 'benefits', 'responsibility', 'qualifications', 'keywords'];
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
}
