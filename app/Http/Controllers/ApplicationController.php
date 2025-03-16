<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Models\Application;
use App\Models\Post;
use App\Models\User;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user(); // Get authenticated employer

        // Get only posts created by this employer
        $posts = Post::where('user_id', $user->id)->pluck('id');

        // Fetch applications related to the employer's job posts
        $applications = Application::whereIn('job_id', $posts)->get();

        return view('applications.index', compact('applications'));
    }


    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
        
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplicationRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $data['status'] = 'Pending';
        $application= Application::create($data);
      
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
        //
    }
}