<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;

class CommentController extends Controller
{
    
    public function store(StoreCommentRequest $request,$post)
    {
      
        $post = Post::find($post);
        $comment = new Comment([
            'body' => $request->body,
            'user_id' => null, 
        ]);
        $post->comments()->save($comment);
        return to_route("posts.show",["post"=>$post]);

    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}