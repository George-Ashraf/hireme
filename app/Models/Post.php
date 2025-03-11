<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable =[
        'skills',
        'comapny',
        'salary',
        'job_title',
        'location',
        'work_type',
        'description',
        'status',
        'image',
        'responsibility',
        'qualification',
        'benefits',
        'experience_level',
        'closed_date',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
