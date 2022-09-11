<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;

class BatchController extends Controller
{

    public function index()
    {
        return Batch::get();
    }


    public function store(Request $request)
    {
        $batch = new Batch();
        $batch -> batch = $request -> batch;
        $batch -> save();
        return response()->json($batch);
    }


    public function show(Batch $batch)
    {
        return Batch::find($batch);
    }


    public function update(Request $request,  $batch)
    {
        $batch =  Batch::findOrfail($batch);
        $batch -> batch = $request -> batch;
        $batch -> save();
        return response()->json($batch);
    }

   
    public function destroy( $batch)
    {
        return Batch::destroy($batch);
    }
}
