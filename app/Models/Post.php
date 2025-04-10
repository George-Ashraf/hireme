<?php

namespace App\Models;
use App\Models\Comment;
use App\Models\Application;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        "skills",
        "salary",
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
    ];

    function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function application()
    {
        return $this->hasMany(Application::class, 'job_id');
    }
}