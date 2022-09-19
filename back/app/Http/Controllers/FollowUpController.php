<?php

namespace App\Http\Controllers;

use App\Models\Follow_up;
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
    }


    public function show( $id)
    {
        return Follow_up::findOrfail($id);
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
