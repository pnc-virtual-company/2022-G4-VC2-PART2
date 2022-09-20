<?php

namespace App\Http\Controllers;

use App\Models\BgColor;
use Illuminate\Http\Request;

class BgColorController extends Controller
{

    public function index()
    {
        return BgColor::all();
    }

    public function store(Request $request)
    {
        $bg_colors = new BgColor();
        $bg_colors->bg_colors = $request->bg_colors;
        $bg_colors->follow_up_id = $request->follow_up_id;
        $bg_colors->save();
        return response()->json(['msg' => 'Successfully']);
    }


    public function show( $id)
    {
        return BgColor::findOrfail($id);
    }

       public function update(Request $request, $id)
    {
        $bg_colors = BgColor::findOrfail($id);
        $bg_colors->bg_colors = $request->bg_colors;
        // $bg_colors->follow_up_id = $request->follow_up_id;
        $bg_colors->update();
        return response()->json(['msg' => 'Successfully']);
    }


    public function destroy( $id)
    {
        return BgColor::destroy($id);
    }
}
