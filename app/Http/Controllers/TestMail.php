<?php

namespace App\Http\Controllers;

use App\Peticion;
use App\Responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TestMail extends Controller
{

public function index(){
    //
    $to_name = "Emilio";
    $to_email = 'galindo9810@hotmail.com';

    $peticion = Peticion::orderBy('id', 'desc')->first();

    $status = $peticion->status;

    switch ($status) {
        case 0:
            $estado = "Pendiente";
            break;
        case 1:
            $estado = "Atendida";
            break;
        case 2:
            $estado = "Finalizada";
            break;
    }

    $body = "El numero de seguimiento de su peticion es " . $peticion->id . ", el responsable es " .
        Responsable::findOrFail($peticion->responsable_id)->name . ", el estado de su peticion es " .
        $estado . ".";


    $data = array('name'=>Auth::user(), 'body' => $body);

    Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email, $data) {
        $message->to($to_email, $to_name)->subject('Petición');
        $message->from('galindo.hayashi@gmail.com','BEyG');
    });

    return view('emails.mail');
}

}
