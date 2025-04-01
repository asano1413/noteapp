<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Reply;

class PostController extends Controller
{
    // 投稿一覧の表示
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    // 投稿の詳細表示
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // 投稿作成フォームの表示
    public function create()
    {
        return view('posts.create');
    }

    // 投稿の保存
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

    // 投稿の編集フォームの表示
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // 投稿の更新
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

    // 投稿の削除
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', '投稿が削除されました。');
    }

    // コメント一覧の表示
    public function comments(Post $post)
    {
        $comments = $post->comments()->latest()->paginate(10);
        return view('posts.comments.index', compact('post', 'comments'));
    }

    // コメント作成フォームの表示
    public function createComment(Post $post)
    {
        return view('posts.comments.create', compact('post'));
    }

    // コメントの保存
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

    // コメントの編集フォームの表示
    public function editComment(Post $post, Comment $comment)
    {
        return view('posts.comments.edit', compact('post', 'comment'));
    }

    // コメントの更新
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

    // コメントの削除
    public function destroyComment(Post $post, Comment $comment)
    {
        $comment->delete();
        return redirect()->route('posts.comments', $post)->with('success', 'コメントが削除されました。');
    }
}
