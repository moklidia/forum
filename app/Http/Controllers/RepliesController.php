<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Http\Requests\ReplyValidation;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['store']);
    }

    public function store($ChannelId, Thread $thread, ReplyValidation $rules)
    {
        $thread->addReply(
            [
            'body' => request('body'),
            'user_id' => auth()->id(),
            ]
        );

        return back()->with('flash', 'Your reply has been published!');
    }
}
