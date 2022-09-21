<?php

namespace App\Http\Controllers;

use App\Models\ReplyMessage;
use Illuminate\Http\Request;

class ReplyMessageController extends Controller
{

    public function index()
    {
        return ReplyMessage::get();
    }


    public function store(Request $request)
    {
        $validate = $request->validate([
            'student_id' => 'required',
            'comment_id' => 'required',
            'reply_msg' => 'required',
            'follow_up_id' => 'required',

        ]);
        $replyMessage = new ReplyMessage();
        $replyMessage->student_id = $request->student_id;
        $replyMessage->comment_id = $request->comment_id;
        $replyMessage->follow_up_id = $request->follow_up_id;
        $replyMessage->reply_msg = $request->reply_msg;
        $replyMessage->save();
        return response()->json(['msg' => 'success replied']);
    }


    public function update( Request $request,$id)
    {
        $replyMessage = ReplyMessage::findOrfail($id);
        $validate = $request->validate([
            'student_id' => 'required',
            'comment_id' => 'required',
            'reply_msg' => 'required',
            'follow_up_id' => 'required',

        ]);
        $replyMessage->student_id = $request->student_id;
        $replyMessage->comment_id = $request->comment_id;
        $replyMessage->reply_msg = $request->reply_msg;
        $replyMessage->follow_up_id = $request->follow_up_id;
        $replyMessage->update();
        return response()->json(['msg' => 'success updated']);
    }


    public function show( $id)
    {
        return ReplyMessage::findOrfail($id);
    }


    public function destroy( $id)
    {
        return ReplyMessage::destroy($id);
    }
}
