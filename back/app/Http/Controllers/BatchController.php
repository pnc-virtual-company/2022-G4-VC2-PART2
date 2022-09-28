<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;

class BatchController extends Controller
{

    public function index()
    {
        return Batch::distinct()->get(['batch']);
        // return Batch::all();
        // return Batch::get();
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


    public function update(Request $request,$id)
    {
        $batch =  Batch::findOrfail($id);
        $batch -> batch = $request -> batch;
        $batch -> save();
        return response()->json(['message' =>'updated']);
    }


    public function destroy( $batch)
    {
        if(Batch::destroy($batch)){
            return response()->json(['message'=>'deleted']);
        }
    }

    public function getUniqueBatch()
    {

    }
}
