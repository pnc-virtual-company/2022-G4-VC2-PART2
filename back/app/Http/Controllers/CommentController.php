<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Follow_up;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;


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
        $date = Carbon::now();
        $date->toRfc850String();
        $comment = new Comment();
        $comment->student_id = $request->student_id;
        $comment->follow_up_id = $request->follow_up_id;
        $comment->user_id = $request->user_id;
        $comment->topic = $request->topic;
        $comment->content = $request->content;
        if($request->action != null){
            $comment->action = $request->action;
        }
        $comment->created_at = now()->toTimeString();
        $comment->updated_at = now()->toTimeString();
        $comment->save();
        return response()->json(['msg' => 'successfully']);

    }

    public function show($id)
    {
        return Comment::with(['followUp', 'user','replyMsg'])->where('follow_up_id', $id)->get();
    }

    public function getSpecificComment($id)
    {
        return Comment::where('id', $id)->get();
    }


    public function update(Request $request, $id)
    {
        $comment = Comment::findOrfail($id);
        $validate = $request->validate([
            'content' => 'required',
        ]);
        $comment->content = $request->content;
        $comment->update();
        return response()->json(['msg' => 'successfully']);
    }


    public function destroy($id)
    {
        return Comment::destroy($id);
    }

    public function getCommentBy($topic)
    {
        return Comment::where('topic', $topic)->get();
    }

    public function getAllTopic()
    {
        return Comment::select('topic')->distinct()->get();
    }

}
