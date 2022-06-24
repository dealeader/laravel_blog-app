<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\CommentUpdateRequest;
use App\Http\Requests\Post\CommentStoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Comment;

class LikeController extends Controller
{
    public function store(Post $post)
    {
        auth()->user()->likedPosts()->toggle($post->id);

        return redirect()->back();
    }
}
