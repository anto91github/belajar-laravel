<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\PostDetailResource;

class PostController extends Controller
{
    public function index()
    {
        // $data = Post::all();
        // return response()->json(['data'=>$data]);

        $data = Post::with(['writer:id,name', 'commentsUser:id,post_id,comments_content,user_id'])->get();
        return PostDetailResource::collection($data);
    }

    public function show($id)
    {
        $post = Post::with(['writer:id,name', 'commentsUser:id,post_id,comments_content,user_id'])->findOrFail($id);
        return new PostDetailResource($post);
    }

    public function show2($id)
    {
        $post = Post::findOrFail($id);
        return new PostDetailResource($post);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'max:255|required',
            'news_content' => 'required'
        ]);
        $request['author'] = Auth::user()->id;

        if($request->file)
        {
            //upload file
            $fileName = $this->generateRandomString();
            $extension = $request->file->extension();

            $path = Storage::putFileAs('image_post_folder', $request->file, $fileName.'.'.$extension);
            $request['image'] = $fileName.'.'.$extension;
        }
        
        $post = Post::create($request->all());

        return new PostDetailResource($post->loadMissing('writer:id,name'));
        
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'max:255|required',
            'news_content' => 'required'
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->all());

        return new PostDetailResource($post->loadMissing('writer:id,name'));
    
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return new PostDetailResource($post->loadMissing('writer:id,name'));
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
