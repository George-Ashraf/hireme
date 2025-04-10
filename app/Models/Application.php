<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    /** @use HasFactory<\Database\Factories\ApplicationFactory> */
    use HasFactory;
    protected $fillable = ['status','user_id', 'job_id'];




    function user()
    {

        return $this->belongsTo(User::class, 'user_id');
    }



    function post()
    {

        return $this->belongsTo(Post::class, 'job_id');
    }
}