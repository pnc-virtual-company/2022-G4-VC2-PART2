<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\sendMail;

class MailController extends Controller
{
    public function sendCodeResetPSW(Request $request)
    {
        $teacher = User::where('email', '=', $request->email)->first();
        $username = $teacher['first_name'] . ' ' . $teacher['last_name'];
        $email = $teacher['email'];
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
        if ($teacher) {
            return response()->json(['message' => 'success', 'code' => $psw]);
        }
        else {
            return response()->json(['message' => 'email not found!']);
        }

    }

}
