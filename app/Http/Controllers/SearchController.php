<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $users = User::where('name', 'LIKE', "%{$query}%")->get();
        $posts = Post::where('title', 'LIKE', "%{$query}%")->get();

        return response()->json([
            'users' => $users,
            'posts' => $posts,
        ]);
    }
}
