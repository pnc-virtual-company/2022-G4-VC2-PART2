<?php

namespace App\Http\Controllers;

use App\Models\NumberOfFollowUp;
use Illuminate\Http\Request;

class NumberOfFollowUpController extends Controller
{

    public function index()
    {
        return NumberOfFollowUp::where('student_id', $id)->count();
    }


    public function store(Request $request)
    {
        //
    }

    public function show( $id)
    {
        return NumberOfFollowUp::where('[student_id]', $id)->count();

    }


    public function update(Request $request, NumberOfFollowUp $numberOfFollowUp)
    {
        //
    }

   
    public function destroy(NumberOfFollowUp $numberOfFollowUp)
    {
        //
    }
}
