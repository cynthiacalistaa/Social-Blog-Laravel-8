<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\comment;
use App\Models\post;
use App\Models\user;

class CommentController extends Controller
{   
    public function index()
    {
        $user = Auth::user();
        $comment = collect();
        optional($user->post)->each(function ($post) use (&$comment) {
            $comment = $comment->merge($post->comment);
        });
    
        return view('comment.index', compact('comment'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'body' => 'required|string',
        ]);

        $post = Post::findOrFail($id);
        $comment = new comment([
            'usersid' => Auth::user()->id,
            'postsid' => $post->id,
            'body' => $request->body,
        ]);

        $comment->save();

        return redirect()->back()->with('success', 'your comment was sent!');
    }

    public function destroy($id)
    {
        comment::where('id', $id)->delete();
        return redirect()->route('comment.index')->with('success', 'comment deleted');
    }
}
