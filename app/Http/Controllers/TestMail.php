<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestMail extends Controller
{

public function index(){
    //
    $to_name = "Emilio";
    $to_email = 'galindo9810@hotmail.com';
    $data = array('name'=>'Ogbonna Vitalis(sender_name)', 'body' => 'A test mail');

    Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)->subject('Laravel Test Mail');
        $message->from('galindo.hayashi@gmail.com','Test Mail');
    });

    $datas = "emilio";
    return view('emails/mail', compact('datas'));
}

}
