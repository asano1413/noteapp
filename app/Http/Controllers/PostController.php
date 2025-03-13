<?php

namespace App\Http\Controllers\PostController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        // 投稿の一覧を表示
        return view('posts.index');
    }

    public function create()
    {
        // 新しい投稿を作成するフォームを表示
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // 新しい投稿を保存
        // バリデーションと保存処理を追加
        return redirect()->route('posts.index');
    }

    public function show($post)
    {
        // 特定の投稿を表示
        return view('posts.show', compact('post'));
    }

    public function edit($post)
    {
        // 特定の投稿を編集するフォームを表示
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $post)
    {
        // 特定の投稿を更新
        // バリデーションと更新処理を追加
        return redirect()->route('posts.show', $post);
    }

    public function destroy($post)
    {
        // 特定の投稿を削除
        return redirect()->route('posts.index');
    }

    public function delete($post)
    {
        // 特定の投稿をソフトデリート
        return redirect()->route('posts.index');
    }

    public function restore($post)
    {
        // 特定の投稿を復元
        return redirect()->route('posts.index');
    }

    public function forceDelete($post)
    {
        // 特定の投稿を完全に削除
        return redirect()->route('posts.index');
    }

    public function comments($post)
    {
        // 特定の投稿のコメント一覧を表示
        return view('comments.index', compact('post'));
    }

    public function createComment($post)
    {
        // 新しいコメントを作成するフォームを表示
        return view('comments.create', compact('post'));
    }

    public function storeComment(Request $request, $post)
    {
        // 新しいコメントを保存
        // バリデーションと保存処理を追加
        return redirect()->route('posts.comments', $post);
    }

    public function showComment($post, $comment)
    {
        // 特定のコメントを表示
        return view('comments.show', compact('post', 'comment'));
    }

    public function editComment($post, $comment)
    {
        // 特定のコメントを編集するフォームを表示
        return view('comments.edit', compact('post', 'comment'));
    }

    public function updateComment(Request $request, $post, $comment)
    {
        // 特定のコメントを更新
        // バリデーションと更新処理を追加
        return redirect()->route('posts.comments.show', [$post, $comment]);
    }

    public function destroyComment($post, $comment)
    {
        // 特定のコメントを削除
        return redirect()->route('posts.comments', $post);
    }

    public function deleteComment($post, $comment)
    {
        // 特定のコメントをソフトデリート
        return redirect()->route('posts.comments', $post);
    }

    public function restoreComment($post, $comment)
    {
        // 特定のコメントを復元
        return redirect()->route('posts.comments', $post);
    }

    public function forceDeleteComment($post, $comment)
    {
        // 特定のコメントを完全に削除
        return redirect()->route('posts.comments', $post);
    }

    public function replies($post, $comment)
    {
        // 特定のコメントの返信一覧を表示
        return view('replies.index', compact('post', 'comment'));
    }

    public function createReply($post, $comment)
    {
        // 新しい返信を作成するフォームを表示
        return view('replies.create', compact('post', 'comment'));
    }

    public function storeReply(Request $request, $post, $comment)
    {
        // 新しい返信を保存
        // バリデーションと保存処理を追加
        return redirect()->route('posts.comments.replies', [$post, $comment]);
    }

    public function showReply($post, $comment, $reply)
    {
        // 特定の返信を表示
        return view('replies.show', compact('post', 'comment', 'reply'));
    }

    public function editReply($post, $comment, $reply)
    {
        // 特定の返信を編集するフォームを表示
        return view('replies.edit', compact('post', 'comment', 'reply'));
    }

    public function updateReply(Request $request, $post, $comment, $reply)
    {
        // 特定の返信を更新
        // バリデーションと更新処理を追加
        return redirect()->route('posts.comments.replies.show', [$post, $comment, $reply]);
    }

    public function destroyReply($post, $comment, $reply)
    {
        // 特定の返信を削除
        return redirect()->route('posts.comments.replies', [$post, $comment]);
    }
}
