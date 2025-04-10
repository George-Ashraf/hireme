<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Models\Application;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('employer-only');
        $posts = Post::where('user_id', auth::User()->id)->with('application')->paginate(3);
        return view('applications.index', compact('posts'));
    }

    public function status($id)
    {
        Gate::authorize('employer-only');

        $application = Application::findOrFail($id);
        $newStatus = request('status');

        if (!in_array($newStatus, ['Pending', 'Accepted', 'Rejected'])) {
            return redirect()->back();
        }

        if ($newStatus === $application->status) {
            return redirect()->back();
        }

        $application->status = $newStatus;
        $application->save();

        return redirect()->back();
    }

    public function myapplications()
    {
        $applications = Application::where('user_id', Auth::id())
        ->with('post')  // Eager load the related post
        ->orderBy('created_at', 'desc')
        ->get();
        return view('applications.myapplications', compact('applications'));
        
    }
    public function store(StoreApplicationRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth::user()->id;
        $data['status'] = 'Pending';
        $application = Application::create($data);

        return to_route("application.show", compact("application"));
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        $post = Post::where('id', $application->job_id)->first();
        return view('applications.show', compact('application', 'post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplicationRequest $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
{
    // Check if user has permission to delete this application
    if (auth()->id() !== $application->user_id) {
        abort(403);
    }

    $application->delete();
    
    return redirect()->route('post.index')->with('success', 'Application withdrawn successfully');
}
}