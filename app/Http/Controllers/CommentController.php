<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('post')->paginate(5);
        return view('admin.comments.index', ['comments' => $comments]);
    }

    public function store(Request $request)
    {
       $user = Auth::user();
        $data = [
            'author' => $user->name,
            'email' => $user->email,
            'body' => $request->body,
            'fileUser' => isset($user->image) ? $user->image->file : null,
            'post_id' => $request->post_id,
        ];

        Comment::create($data);

        return back();
    }

    public function show($id)
    {
        $comments  = Comment::where('post_id', $id)
                            ->with('post')
                            ->latest()
                            ->paginate(5);

        return view('admin.comments.show', ['comments' => $comments]);
    }

    public function update(Request $request, $id)
    {
        Comment::findOrFail($id)->update($request->all());
        return back();
    }

    public function destroy($id)
    {
        Comment::findOrFail($id)->delete();
        return back();
    }
}


