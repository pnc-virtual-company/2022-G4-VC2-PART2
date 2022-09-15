<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        return User::with(['student'])->get();
    }


    public function store(Request $request)
    {
        //
    }


    public function show( $id)
    {
        return User::with(['student'])->where('id',$id)->get();

    }


    public function update(Request $request, Student $student)
    {
        //
    }


    public function destroy(Student $student)
    {
        //
    }

    public function filterStudentByBatch($batch)
    {
        return Student::with(['User'])->where('year',$batch)->get();
    }

    public function filterStudentByClass($class)
    {
        return Student::with(['User'])->where('class', strtoupper($class))->get();
    }

    public function filterStudentByMajor($major)
    {
        return Student::with(['User'])->where('class', 'LIKE', '%' . $major . '%')->get();
    }

    public function setFollowUp(Request $request,$id)
    {
        $student = Student::findOrfail($id);
        $student->if_follow_up = $request->if_follow_up;
        $student->update();
        return response()->json(['message' => 'student set to follow up']);
    }

    


}
