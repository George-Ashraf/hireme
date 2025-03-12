<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\user;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{

    public function store(StoreCommentRequest $request,$post)
    {

        $post = Post::find($post);
        $comment = new Comment([
            'body' => $request->body,
            'user_id' => Auth::id(),
        ]);
        $post->comments()->save($comment);
        return to_route("post.show",["post"=>$post]);

    }

    public function edit($post,Comment $comment )
    {
        return  view("comments.edit" ,compact("post","comment"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request,$post, Comment $comment )
    {
        $comment->update([
            'body' => $request->body,
        ]);
        return to_route("post.show",["post"=>$post]);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($post,Comment $comment )
    {
         $comment->delete();
         return to_route("post.show",["post"=>$post]);

    }
}