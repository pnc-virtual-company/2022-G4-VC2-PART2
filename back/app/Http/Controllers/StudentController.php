<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        //
    }


    public function store(Request $request)
    {
        
    }


    public function show( $id)
    {
        return User::with(['student'])->where('id',$id)->get();

    }


    public function update(Request $request, Student $student)
    {
        
    }


    public function destroy(Student $student)
    {
        //
    }
}
