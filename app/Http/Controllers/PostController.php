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

        $request->validate([
            'type' => 'required|in:text,audio',
            'title' => 'required',
            'author' => 'required',
            "published_at" => 'required',
            "lead" => 'required',
            'text' => 'required_if:type,text',
            'audio_length' => 'required_if:type,audio',
            'audio_url' => 'required_if:type,audio',
        ]);


        $user = $request->user();

        $post = new Post();
        $post->user_id = $user->id;
        $post->type = $request->type;
        $post->title = $request->title;
        $post->author = $request->author;
        $post->published_at = $request->published_at;
        $post->lead = $request->lead;
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
        $posts = Post::where('user_id', $userId)
        ->with(['textPost', 'audioPost'])
        ->orderBy('published_at', 'desc') // or 'asc' for ascending order
        ->get();

        return response()->json($posts);
    }
}
