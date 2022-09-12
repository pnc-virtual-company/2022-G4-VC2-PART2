<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Batch;
use App\Models\Student;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return User::with(['student'])->get();
    }


    public function store(Request $request)
    {
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->img = $request->file('img')->store('public/images');
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        $token = $user->createToken('myTOken')->plainTextToken;
        if ($request->role == 'student') {
            $student = new Student();
            $batchs = new Batch();
            $id = User::latest()->first();
            $student->user_id = $id['id'];
            $student->batch_id = $id['id'];
            $student->if_follow_up = 'No';
            $student->province = $request->province;
            $student->NGO = $request->NGO;
            $student->student_class = $request->student_class;
            $student->year = $request->year;
            $batchs->batch = $request->year;
            $batchs->save();
            $student->save();
        }
        return response()->json(['message' => "Created successfully"]);
    }


    public function show($id)
    {
        return User::with(['student'])->where('id', $id)->get();
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if($user){
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->gender = $request->gender;
            $user->img = $request->file('img')->store('public/images');
            $user->role = $request->role;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $token = $user->createToken('myTOken')->plainTextToken;
            if ($request->role == 'student') {
                $student = new Student();
                $batchs = new Batch();
                $id = User::latest()->first();
                $student->batch_id = $id;
                $student->user_id =$id;
                $student->if_follow_up = $request->if_follow_up;
                $student->province = $request->province;
                $student->NGO = $request->NGO;
                $student->student_class = $request->student_class;
                $student->year = $request->year;
                $batchs->batch = $student->year;
                $batchs->save();
                $student->update();
            }
            $user->update();
            return response()->json(['message' => "Updated successfully"]);
        }
        return response()->json(['message' => "Update failed"]);

    }


    public function destroy($id)
    {
        if (User::destroy($id)) {
            Batch::destroy($id);
            return "removed successfully!";
        }
    }

    public function getUserBy($role)
    {
        return User::where('role','=', $role)->get();
    }

    public function getTeacherBy($id)
    {
        return User::where([['id',$id],['role','teacher']])->get();
    }
}
