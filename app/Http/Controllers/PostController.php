<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\TextPost;
use App\Models\AudioPost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $user = $request->user();

        $post = new Post();
        $post->user_id = $user->id;
        $post->type = $request->type;
        $post->save();

        if ($request->type === 'text') {
            $textPost = new TextPost($request->all());
            $textPost->post_id = $post->id;
            $textPost->save();
        } elseif ($request->type === 'audio') {
            $audioPost = new AudioPost($request->all());
            $audioPost->post_id = $post->id;
            $audioPost->save();
        }

        return response()->json($post, 201);
    }

    public function index($userId)
    {
        $posts = Post::where('user_id', $userId)->with(['textPost', 'audioPost'])->get();

        return response()->json($posts);
    }
}
