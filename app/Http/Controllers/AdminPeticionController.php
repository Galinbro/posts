<?php

namespace App\Http\Controllers;

use App\Peticion;
use App\User;
use App\Responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AdminPeticionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $peticiones = Peticion::cr($request->get('cr'))->responsable($request->get('resposable'))->emisor($request->get('emisor'))->cliente($request->get('cliente'))->status($request->all('pendientes', 'proceso', 'finalizadas', 'correcciones'))->paginate(25);

        $cr = Peticion::pluck('ug', 'ug')->all();

        $responsables = Responsable::pluck('name', 'id')->all();

        $emisor = Peticion::with('user')->get()->pluck('user.name', 'user_id')->all();

        $cliente = Peticion::pluck('nb_cliente', 'nb_cliente')->all();

        return view('admin.peticiones.index', compact('peticiones', 'cr', 'responsables', 'emisor', 'cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peticion = Peticion::findOrFail($id);
        $responsables = Responsable::pluck('name', 'id')->all();

        return view('admin.peticiones.show', compact('peticion', 'responsables'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peticion = Peticion::findOrFail($id);

        return view('admin.peticiones.edit', compact('peticion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $peticion = Peticion::findOrFail($id);

        $input = $request->all();

        $previa = $peticion->status;

        switch ($previa) {
            case 0:
                $previa = "Pendiente";
                break;
            case 1:
                $previa = "Atendida";
                break;
            case 2:
                $previa = "Finalizada";
                break;
        }

        $peticion->status = (integer)$input['status'];
        $peticion->comentario = $input['comentario'];

        //return $peticion;

        $peticion->save();

        Session::flash('update_peticion', 'La peticion fue actualizada');


        $to_name =$peticion->user->name;
        $to_email = $peticion->user->email;
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
            case 3:
                $estado = "Correcciones";
                break;
        }

        $body = "Su peticion con numero de seguimiento " . $peticion->id .
                 ", ha cambiado de estado de " . $previa . " a " . $estado . ".";
        $comentario = $input['comentario'];
        $datos = [];

        $data = array('name'=>Auth::user()->name, 'body' => $body, 'datos' => $datos ,'comentario' => $comentario);

        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email, $data) {
            $message->to($to_email, $to_name)->subject('Petición');
            $message->from('galindo.hayashi@gmail.com','BEyG');
        });



        return redirect('admin/peticiones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
