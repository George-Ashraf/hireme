<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 'Published')->get()->groupBy('work_type');
        return view('posts.index', compact('posts'));
    }
    public function search(Request $request)
    {
        $name = $request->search;

        $search_post = Post::where('status', 'Published')
            ->where(function ($query) use ($name) {
                $query->orWhere('skills', 'like', '%' . $name . '%')
                    ->orWhere('salary', 'like', '%' . $name . '%')
                    ->orWhere('job_title', 'like', '%' . $name . '%')
                    ->orWhere('location', 'like', '%' . $name . '%');
            })
            ->get();

        return view('posts.search', compact('search_post', 'name'));
    }

    public function pending()
    {
        Gate::authorize('admin-only');

        $pendingposts = Post::orderby('status', 'ASC')->get();

        return view('posts.pending', compact('pendingposts'));
    }

    public function myposts()
    {
        Gate::authorize('employer-only');
        $myposts = Post::where('user_id', Auth::user()->id)->get();
        return view('posts.myposts', compact('myposts'));
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


        $categories = Category::all();
        return view('posts.create', compact('categories'));
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

        $request_data = $request->validated();
        $request_data['image'] = $imagename;
        $request_data['status'] = 'Pending';
        $request_data['user_id'] = Auth::id();
        Post::create($request_data);

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
        Gate::authorize('update-post', $post);

        $request_data = $request->validated();
        // after update make the  status pending
        $request_data['status'] = 'Pending';

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $request_data['image'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($request_data);

        return redirect()->route('myposts.index', $post)->with('success', 'Post updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $post->comments()->delete();
        $post->application()->delete();
        $post->delete();

        return redirect()->route('post.index');
    }
}
