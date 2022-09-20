<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Batch;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;

class UserController extends Controller
{

    public function index()
    {
        return User::with(['student'])->get();
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
        ]);

            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->gender = $request->gender;
            if($request->img != null)
            {
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
            if ($request->role == 'student') {
                $validate = $request->validate([
                    'class' => 'required',
                    'year' => 'required',
                    'province' => 'required',
                    'NGO' => 'required',
                ]);
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
                if(!$student->save() or !$batchs->save()) {
                    User::destroy($id['id']);
                    Student::destroy($id['id']);
                    Batch::destroy($id['id']);
                    return response()->json(['msg'=>'error']);
                }
            return response()->json(['msg' => 'success']);

        }
    }


    public function show($id)
    {
        return User::with(['student'])->where('id', $id)->get();
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrfail($id);
        $validate = $request->validate([
            'email' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
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
            if($request->role != null){
                $user->role = $request->role;
            }
            $user->email = $request->email;
            if ($request->password != null) {
            $user->password = bcrypt($request->password);
        }
            if ($request->role == 'student') {
                $student = Student::findOrfail($id);
                $batchs = Batch::findOrfail($student->batch_id);
                $student->if_follow_up = $request->if_follow_up;
                if($request->province != null){
                    $student->province = $request->province;
                }else{
                    $student->province = $student->province;
                }
                $student->NGO = $request->NGO;
                $student->class = $request->class;
                $batchs->batch = $request->batch;
                $student->year = $request->year;
                $batchs->update();
                $student->update();
            }
            $user->update();
            return response()->json(['message'=>'update successfully']);

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
            return User::with('student')->where('role', $role)->get();
        }
        return User::where('role', $role)->get();
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

    /********************************** User Log In ************************************* */
    public function login(Request $request) {
        if(Auth::attempt($request->only('email', 'password'))){
            $user = Auth::user();
            $token = $user->createToken('mytoken')->plainTextToken;
            $cookie = cookie('jwt', $token, 60*24);
            return response()->json(['mas'=> 'success','token'=>$token], 200)->withCookie($cookie);
        }
        return response()->json(['mas'=>"Invalid"]);
    }

/************************************ Log out ****************************************/
    public function logout() {
        $cookie = Cookie::forget('jwt');
        return response()->json(['mes'=>'Logged out Successfully'])->withCookie($cookie);
    }
}
