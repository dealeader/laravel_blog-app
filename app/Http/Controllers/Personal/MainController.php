<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $counts = [];
        $counts['commentsCount'] = auth()->user()->comments()->get()->count();
        $counts['likesCount'] = auth()->user()->likedPosts()->get()->count();

        return view('personal.main.index', compact('counts'));
    }
}
