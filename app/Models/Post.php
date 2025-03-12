<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{


    protected $fillable = [
        "skills",
        "company",
        "salary" ,
        "job_title",
        "location",
        "work_type",
        "description",
        "status",
        "image",
        "responsibility",
        "qualification",
        "benefits",
        "experience_level",
        "closed_date",
        "category_id",
        "user_id"
    ] ;


function user()
{

    return $this->belongsTo(User::class, 'user_id');

    
}

function category()
{

    return $this->belongsTo(Category::class, 'category_id');

    
}


    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
}