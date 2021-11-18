<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class CommentController extends Controller
{
    public function showComment()
    {
        $comments = comment::all();
        foreach ($comments as $comment) {
            $user = User::where('id', $comment->user_id)->first();
            $comment->name = $user->name;
        }

        return response()->json([
                'comments' => $comments
            ], 200);
    }

    public function createComment(Request $request)
    {
        $item = Comment::create($request->all());
        return response()->json([
            'data' => $item
        ], 201);
    }
}
