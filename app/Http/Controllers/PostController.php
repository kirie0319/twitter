<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $item = Post::create($request->all());
        return response()->json([
            'data' => $item
        ], 201);
    }

    public function delete(Request $request)
    {
        $item = Post::where('id', $request->id)->first();
        $item->delete();
        if ($item) {
            return response()->json([
                'message' => $item,
            ], 200);
        } else {
            return response()->json([
                'message' => $request,
            ], 404);
        }
    }
}
