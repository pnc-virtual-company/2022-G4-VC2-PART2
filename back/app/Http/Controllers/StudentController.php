<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Models\Follow_up;
use App\Models\Batch;
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
        $user = new User();
        $validate = $request->validate([
            'email' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'password' => 'required',
            'class' => 'required',
            'year' => 'required',
            'province' => 'required',
            'NGO' => 'required',
            'batch' => 'required',
        ]);

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
        $user->role = 'student';
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        $student = new Student();
        $batchs = new Batch();
            $validate = $request->validate([
                'class' => 'required',
                'year' => 'required',
                'province' => 'required',
                'NGO' => 'required',
                'batch' => 'required',
            ]);
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


    public function show($id)
    {
        return Student::with(['user'])->where('id', $id)->get();

    }


    public function update(Request $request,$id)
    {
        {
            $student =  Student::findOrfail($id);
            $batchs =  Batch::findOrfail($id);
            $validate = $request->validate([
                'email' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
                'password' => 'required',
                'class' => 'required',
                'year' => 'required',
                'province' => 'required',
                'NGO' => 'required',
                'batch' => 'required',
            ]);

            $student->first_name = $request->first_name;
            $student->last_name = $request->last_name;
            $student->gender = $request->gender;
            if ($request->img != null) {
                $path = public_path('images');
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
                $file = $request->file('img');
                $fileName = uniqid() . '_' . trim($file->getClientOriginalName());
                $file->move($path, $fileName);
                $student->img = asset('images/' . $fileName);
            }
            $student->role = $request->role;
            $student->email = $request->email;
            $student->password = bcrypt($request->password);
            $id = User::latest()->first();
            $student->user_id = $id['id'];
            $student->batch_id = $id['id'];
            $student->if_follow_up = 'No';
            $student->province = $request->province;
            $student->NGO = $request->NGO;
            $student->class = $request->class;
            $student->year = $request->year;
            $batchs->batch = $request->year;
            $student->save();
            $batchs->save();
            $student->save();


        }
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

    public function getChat($id)
    {
        return Student::with(['followUp', 'comment', 'replyMsg'])->where('id', $id)->get();
    }
}
