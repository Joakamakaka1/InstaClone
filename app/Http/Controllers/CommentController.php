<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment(Request $request, $postId)
    {
        $request->validate([
            'comment' => 'required|string|max:500'
        ]);

        Comment::create([
            'comment' => $request->comment,
            'publish_date' => now(),
            'user_id' => Auth::id(),
            'post_id' => $postId
        ]);

        return redirect()->route('posts.index');
    }
}
