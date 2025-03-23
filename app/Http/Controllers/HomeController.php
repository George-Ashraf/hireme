<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Message;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        $categories = Category::withCount('posts')->get();
        $posts = Post::where('status','Published')->get()->groupBy('work_type');


        return view('home',compact('categories','posts','messages'));
    }

    public function about()
    {
        return view('about');
    }
}
