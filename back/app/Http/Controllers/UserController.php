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
        if($request->img != null)
        {
            // $user->img = $request->file('img')->store('public/storage');
            $path = public_path('images');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file = $request->file('img');
            $fileName = uniqid() . '_' . trim($file->getClientOriginalName());
            $file->move($path, $fileName);
            $user->img = asset('images/' . $fileName);
        }
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
            $student->class = $request->class;
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
        $user = User::findOrfail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        if ($request->img != null) {
            $path = public_path('images');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file = $request->file('img');
            $fileName = uniqid() . '_' . trim($file->getClientOriginalName());
            $file->move($path, $fileName);
            $user->img = asset('images/' . $fileName);
        }
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $token = $user->createToken('myTOken')->plainTextToken;
        if ($request->role == 'student') {
            // $id = User::latest()->first();
            $student = Student::find($id);
            // $batchs = Batch::find($id);
            $student->if_follow_up = $request->if_follow_up;
            $student->province = $request->province;
            $student->NGO = $request->NGO;
            $student->class = $request->class;
            $student->year = $request->year;
            // $batchs->batch = $student->year;
            // $batchs->update();
            $student->update();
            // return response()->json(['message' => $user]);
        }
        $user->update();
        return response()->json(['message'=>'successfully']);

    }


    public function destroy($id)
    {
        if (User::destroy($id)) {
            Batch::destroy($id);
            return "removed successfully!";
        }
        return "Item not found";
    }

    public function getUserBy($role)
    {
        if(strtoupper($role) == 'STUDENT'){
            return User::with(['student'])->where('role','=', $role)->get();
        }else{
            return User::where('role','=', $role)->get();
        }
    }

    public function updateImage(Request $request, $id)
    {
        $student = User::find($id); {
            $path = public_path('images');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file = $request->file('image');
            $fileName = uniqid() . '_' . trim($file->getClientOriginalName());
            $file->move($path, $fileName);
            $student->image = asset('images/' . $fileName);
        }
        $student->save();
        return response()->json(["message" => "Image is saved successfully"]);
    }

    public function orderByFname()
    {
        return User::orderBy('first_name')->get();
    }
}
