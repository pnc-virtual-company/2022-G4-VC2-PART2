<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\sendMail;
use App\Mail\followUp;

class MailController extends Controller
{
    public function sendCodeResetPSW(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();
        $username = $user['first_name'] . ' ' . $user['last_name'];
        $email = $user['email'];
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHI!@#$JKLMNOP$!QRSTUVWXYZ';
        $psw = '';
        for ($i = 0; $i < 10; $i++) {
            $psw .= $characters[rand(0, strlen($characters) - 1)];
        }
        $body = [
            'username' => $username,
            'code' => $psw
        ];
        Mail::to($email)->send(new sendMail($body)); //file in Mail folder
        if ($user) {
            return response()->json(['message' => 'success', 'code' => $psw]);
        }
        else {
            return response()->json(['message' => 'email not found!']);
        }

    }
    public function informFolowUpToStudent(Request $request)
    {
        $student = User::where('id', '=', $request->id)->first();
        $username = $student['first_name'] . ' ' . $student['last_name'];
        $email = $student['email'];
        $body = [
            'username' => $username,
        ];
        Mail::to($email)->send(new followUp($body)); //file in Mail folder
        if ($student) {
            return response()->json(['message' => 'success']);
        }
        else {
            return response()->json(['message' => 'email not found!']);
        }

    }

}
