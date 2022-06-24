<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\CommentUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = auth()->user()->comments;
        return view('personal.comments.index', compact('comments'));
    }

    public function edit()
    {
        # code...
    }

    public function update(CommentUpdateRequest $request, Comment $comment)
    {
        $comment->update($request->validated());

        return redirect()->route('personal.commets.index');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('personal.comments.index');
    }

}
