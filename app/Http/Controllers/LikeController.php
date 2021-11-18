<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;

class LikeController extends Controller
{
    public function countLikes()
    {
      $posts = Post::all();
      foreach ($posts as $post) {
        $post->count = $post->likes->count();
        $user = User::where('id', $post->user_id)->first();
        $post->name = $user->name;
      }

      return response()->json([
            'posts' => $posts
        ], 200);
    }
    
    public function judgeHasLike(Request $request)
    {
      $hasLike = Like::where('post_id', $request->post_id)->where('user_id', $request->user_id)->first();
    
      if (!$hasLike) {
        $like = Like::create([
          'post_id' => $request->post_id,
          'user_id' => $request->user_id,
        ]);
        return response()->json([
            'like' => $like,
        ], 200);
      } else {
        $like = Like::where('post_id', $request->post_id)->where('user_id', $request->user_id)->delete();
        return response()->json([
          'delete' => $like,
        ], 400);
      }
    }

    public function commentPost(Request $request)
    {
      $post = Post::where('id', $request->id)->first();
      $user = User::where('id', $post->user_id)->first();
      $post->name = $user->name;

      return response()->json([
        'post' => $post
      ], 200);
    }
}

