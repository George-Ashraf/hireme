<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;




use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

use function Pest\Laravel\post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Fetch all posts and group them by 'work_type'
         $posts = Post::where('status','Published')->get()->groupBy('work_type');



         return view('posts.index',compact('posts'));

    }

    public function pending()
    {

        Gate::authorize('admin-only');



         $pendingposts=Post::orderby('status','ASC')->get();



         return view('posts.pending',compact('pendingposts'));
    }

    public function  myposts()
    {
        Gate::authorize('employer-only');
        $myposts=Post::where('user_id',Auth::user()->id)->get();
        return view('posts.myposts',compact('myposts'));
    }
    public function status($id)
    {

        Gate::authorize('admin-only');
        $post = Post::findOrFail($id);
        if ($post->status == 'Pending') {

            $post->status = 'Published';
            $post->save();
            return redirect()->back();
        } else {
            $post->status = 'Pending';
            $post->save();

            return redirect()->back();
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Post $post)
    {
        // Gate::authorize('create-post', $post);

        $categories = Category::all();
        return view('posts.create', compact('categories'));

     }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // dd($request);
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
        return redirect()->route('post.index')->with('success', 'Post created successfully.');
    }
     /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view("posts.show",compact("post"));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        Gate::authorize('update-post', $post);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        Gate::authorize('update-post', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('delete-post', $post);
    }
}
