<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function index()
    {
        $replies = Reply::latest()->paginate(10);
        return view('admin.comments.replies.index', ['replies' => $replies]);
    }
    public function reply(Request $request)
    {
        $user = Auth::user();
        $data = [
            'author' => $user->name,
            'email' => $user->email,
            'body' => $request->body,
            'fileUser' => isset($user->image) ? $user->image->file : null,
            'comment_id' => $request->comment_id,
        ];

        Reply::create($data);

        return back();
    }

    public function show($id)
    {
        $replies  = Reply::where('comment_id', $id)
            ->with('comment')
            ->latest()
            ->paginate(5);

        return view('admin.comments.replies.show', ['replies' => $replies]);
    }

    public function update(Request $request, $id)
    {
        Reply::findOrFail($id)->update($request->all());
        return back();
    }

    public function destroy($id)
    {
        Reply::findOrFail($id)->delete();
        return back();
    }
}
