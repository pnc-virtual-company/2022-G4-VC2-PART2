<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index()
    {
        return Comment::all();
    }


    public function store(Request $request)
    {
        $validate = $request->validate([
            'student_id' => 'required',
            'user_id' => 'required',
            'topic' => 'required',
        ]);
        $comment = new Comment();
        $comment->student_id = $request->student_id;
        $comment->user_id = $request->user_id;
        $comment->status = $request->status;
        $comment->topic = $request->topic;
        $comment->content = $request->content;
        $comment->save();
        return response()->json(['msg' => 'successfully']);

    }

    public function show( $id)
    {
        return Comment::findOrfail($id);
    }


    public function update(Request $request,  $id)
    {
        $comment = Comment::findOrfail($id);
        $validate = $request->validate([
            'topic' => 'required',
            'content' => 'required',

        ]);
        $comment->status = $request->status;
        $comment->topic = $request->topic;
        $comment->content = $request->content;
        $comment->update();
        return response()->json(['msg' => 'successfully']);
    }


    public function destroy( $id)
    {
        return Comment::destroy($id);
    }
}
