<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CommentResource;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'comments_content' => 'required'
        ]); 

        $request['user_id'] = auth()->user()->id;
        $store = Comment::create($request->all());

        return new CommentResource($store->loadMissing(['komentator:id,name']));
    
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'comments_content' => 'required'
        ]);

        $comment = Comment::findOrFail($id);
        $comment->update($request->only('comments_content'));

        return new CommentResource($comment->loadMissing('komentator:id,name'));
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return new CommentResource($comment->loadMissing('komentator:id,name'));
    }
}
