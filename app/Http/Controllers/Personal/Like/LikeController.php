<?php

namespace App\Http\Controllers\Personal\Like;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class LikeController extends Controller
{
    public function index()
    {
        $posts = auth()->user()->likedPosts;
        return view('personal.likes.index', compact('posts'));
    }
    
    public function destroy(Post $post)
    {
        auth()->user()->likedPosts()->detach($post->id);

        return redirect()->route('personal.likes.index');
    }
}
