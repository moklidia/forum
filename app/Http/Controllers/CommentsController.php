<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function storeComments(Request $request, Post $post)
    {
        $comment = Comment::create(
            [
            'body' => request('body'),
            'user_id' => auth()->id(),
            'post_id' => $post->id,
            ]
        )->saveAsRoot();

        return back();
    }
    public function storeNestedComments($parent_comment_id)
    {
        $comment = Comment::where('id', $parent_comment_id)->first();
        
        $nestedComment = Comment::create(
            [
            'body' => request('body'),
            'user_id' => auth()->id(),
            'parent_id' => $parent_comment_id,
            'post_id' => $comment->post_id,
            ]
        );

        $nestedComment->parent()->associate($comment)->save();

        return back();
    }
}
