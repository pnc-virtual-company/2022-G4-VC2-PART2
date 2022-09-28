<?php

namespace App\Http\Controllers;

use App\Models\Follow_up;
use App\Models\Student;
use Illuminate\Http\Request;

class FollowUpController extends Controller
{

    public function index()
    {
        return Follow_up::all();
    }


    public function store(Request $request)
    {
        $follow_up = new Follow_up();
        $follow_up->user_id = $request->user_id;
        $follow_up->student_id = $request->student_id;
        $follow_up->save();
        $user =  Student::findOrfail($request->student_id);
        $user->if_follow_up = 'Yes';
        $user->save();

    }


    public function show($id)
    {
        return Follow_up::with(['student','comment','replyMsg'])->where('student_id', $id)->get();

    }


    public function update(Request $request, $id)
    {
        $follow_up = Follow_up::findOrfail($request->fuId);
        $user = Student::findOrfail($id);
        $user->if_follow_up = 'No';
        $follow_up->closed = "Yes";
        $user->update();
        $follow_up->update();
    }


    public function destroy( $id)
    {
        return Follow_up::destroy($id);
    }

    public function getNumberFollowUp($id)
    {
        return Follow_up::where('student_id', $id)->count();
    }

    public function getCmtByFUID($id)
    {
        return Follow_up::with(['comment'])->where('id', $id)->get();
    }
}
