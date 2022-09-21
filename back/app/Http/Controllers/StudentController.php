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
        return Student::with(['user'])->get();
    }


    public function store(Request $request)
    {
    //
    }


    public function show($id)
    {
        return Student::with(['user'])->where('id', $id)->get();

    }


    public function update(Request $request, Student $student)
    {
    //
    }


    public function destroy(Student $student)
    {
    //
    }

    public function getStudentByBatch($batch)
    {
        return Student::with(['User'])->where('year', $batch)->get();
    }

    public function getStudentByClass($class)
    {
        return Student::with(['User'])->where('class', strtoupper($class))->get();
    }

    public function getStudentByMajor($major)
    {
        return Student::with(['User'])->where('class', 'LIKE', '%' . $major . '%')->get();
    }

    public function setFollowUp(Request $request, $id)
    {
        $student = Student::findOrfail($id);
        $student->if_follow_up = $request->if_follow_up;
        $student->update();
        return response()->json(['message' => 'student set to follow up list']);
    }

    public function getAllStudentFolowUp()
    {
        return Student::with(['User','followUp'])->where('if_follow_up', 'Yes')->get();
    }

        // GET THE STUDENT FOLLOW UP IN EACH ONE
        public function getFollowUpOne($id)
        {
            return Student::with(['user'])->where('id', $id)->get();

        }
}
