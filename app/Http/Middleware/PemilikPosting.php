<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemilikPosting
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $currentUser = Auth::user();
        $post = Post::findOrFail($request->id);

        if($post->author != $currentUser->id)
        {
            return response()->json(['message' => 'Anda tidak punya akses untuk Edit Post ini'],403);
        }
        return $next($request);
    }
}
