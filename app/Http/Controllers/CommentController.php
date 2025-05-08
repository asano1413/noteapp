<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController
{
    public function index(Post $post)
    {
        $comments = $post->comments()->with('user')->latest()->get();
        return view('posts.comments.index', compact('post', 'comments'));
    }
}
