<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostDetailResource;

class PostController extends Controller
{
    public function index()
    {
        $data = Post::all();
        // return response()->json(['data'=>$data]);
        return PostResource::collection($data);
    }

    public function show($id)
    {
        $post = Post::with('writer:id,name')->findOrFail($id);
        return new PostDetailResource($post);
    }

    public function show2($id)
    {
        $post = Post::findOrFail($id);
        return new PostDetailResource($post);
    }
}
