<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Gate;

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
        // Fetch all posts and group them by 'work_type'
        $posts = Post::with('application')->get()->groupBy('work_type');


        return view('posts.index', compact('posts'));
    }





    /**
     * Show the form for creating a new resource.
     */
    public function create(Post $post)
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
        // return view('posts.create') ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request, User $user)
    {
        Gate::authorize('store-post', $user);

        $imagename = null;

        if ($request->hasFile('image')) {
            $imagename = $request->file('image')->store('posts', 'public');
        }

        // Prepare data for insertion


        $request_data = $request->validated();
        $request_data['image'] = $imagename;
        $request_data['status'] = 'Pending';
        $request_data['user_id'] = Auth::id();


        // Create the Post
        Post::create($request_data);

        // Redirect back with a success message
        return redirect()->route('post.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view("posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        Gate::authorize('update-post', $post);

        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        // Check if the authenticated user is authorized to update the post
        Gate::authorize('update-post', $post);

        // Prepare data for update
        $request_data = $request->validated();

        // Handle image update if a new one is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }

            // Store the new image
            $request_data['image'] = $request->file('image')->store('posts', 'public');
        }

        // Update the post
        $post->update($request_data);

        // Redirect with a success message
        return redirect()->route('post.index', $post)->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {


        // Delete the associated image if it exists
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        // Delete the post
        $post->delete();

        // Redirect with a success message
        return redirect()->route('post.index');
    }
}
