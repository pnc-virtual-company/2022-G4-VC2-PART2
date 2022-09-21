<?php

namespace App\Http\Controllers;

use App\Models\Follow_up;
use App\Models\Student;
use App\Models\User;
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
        $user->update();

    }


    public function show($id)
    {
        return Follow_up::with(['student'])->where('student_id', $id)->get();
        // return Follow_up::find($id);
    }


    public function update(Request $request,  $id)
    {
        $follow_up = Follow_up::findOrfail($id);
        $follow_up->user_id = $request->user_id;
        $follow_up->student_id = $request->student_id;
        $follow_up->save();
    }


    public function destroy( $id)
    {
        return Follow_up::destroy($id);
    }
}
