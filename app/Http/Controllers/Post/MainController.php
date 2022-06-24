<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;


class MainController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(9);
        $randomPosts = Post::get()->random(4);
        $popularPosts = Post::withCount('likes')->orderBy('likes_count','DESC')->get()->take(4);

        return view('posts.index', compact('posts', 'randomPosts', 'popularPosts'));
    }

    public function show(Post $post)
    {
        $relatedPosts = Post::where('category_id', $post->category_id)->where('id', '!=', $post->id)->get()->take(3);
        return view('posts.show', compact('post', 'relatedPosts'));
    }
}
