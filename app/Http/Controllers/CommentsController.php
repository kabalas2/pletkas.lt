<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function post(Request $request)
    {
        $comment = new Comment();
        $comment->author_id = Auth::id();
        $comment->article_id = $request->post('article_id');
        $comment->message = $request->post('message');
        $comment->save();
    }
}
