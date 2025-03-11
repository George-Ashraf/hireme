<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

use Illuminate\Support\Facades\Auth;



use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }





    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));    
        // return view('posts.create') ;  
     }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $imagename = null;
    
        if ($request->hasFile('image')) {
            $imagename = $request->file('image')->store('posts', 'public');
        }
    
        // Prepare data for insertion


        $request_data = $request->validated();
        $request_data['image'] = $imagename;
        $request_data['status'] = 'pending';
        $request_data['user_id'] = Auth::id();

    
        // Create the Post
        Post::create($request_data);
    
        // Redirect back with a success message
        return redirect('/post/create')->with('success', 'Post created successfully.');
    }
     /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}