<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Reply;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(20);
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('posts.index')->with('success', '投稿が作成されました。');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }


    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index')->with('success', '投稿が更新されました。');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', '投稿が削除されました。');
    }

    public function comments(Post $post)
    {
        $comments = $post->comments()->latest()->paginate(10);
        return view('posts.comments.index', compact('post', 'comments'));
    }

    public function createComment(Post $post)
    {
        return view('posts.comments.create', compact('post'));
    }

    public function storeComment(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $post->comments()->create([
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('posts.comments', $post)->with('success', 'コメントが追加されました。');
    }

    public function editComment(Post $post, Comment $comment)
    {
        return view('posts.comments.edit', compact('post', 'comment'));
    }

    public function updateComment(Request $request, Post $post, Comment $comment)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $comment->update([
            'content' => $request->content,
        ]);

        return redirect()->route('posts.comments', $post)->with('success', 'コメントが更新されました。');
    }

    public function destroyComment(Post $post, Comment $comment)
    {
        $comment->delete();
        return redirect()->route('posts.comments', $post)->with('success', 'コメントが削除されました。');
    }

}
