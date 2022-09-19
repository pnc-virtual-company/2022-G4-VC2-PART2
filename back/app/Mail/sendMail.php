<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendMail extends Mailable
{
    use Queueable, SerializesModels;


    public function __construct($body)
    {
        foreach ($body as $x => $val) {
            $this->$x = $val;
        }
    }

    public function build()
    {
        return $this->from("slmspnc519@gmail.com")->subject("Verify Code")->view('reset-pasword.reset_password')
            ->with([
            'username' => $this->username,
            'code'=> $this->code,
        ]);
    }
}
