<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeticionRequest;
use App\Peticion;
use App\Responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PeticionController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $peticiones = Peticion::where('user_id', '=', Auth::user()->id)->paginate(15);

        $responsables = Responsable::pluck('name', 'id')->all();

        return view('/peticion/index', compact('responsables', 'peticiones'));
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
    public function store(PeticionRequest $request)
    {
        $user = Auth::user();

        $user->peticion()->create([ 'responsable_id'=>$request['responsable_id'],
            'ug'=>$request['ug'], 'producto'=>$request['producto'],
            'id_grupo'=>$request['id_grupo'], 'id_cliente'=>$request['id_cliente'], 'nb_cliente'=>$request['nb_cliente'],
            'tarifa'=>$request['tarifa'], 'rentabilidad'=>$request['rentabilidad'],
            'reciprocidad'=>$request['reciprocidad'], 'reciprocidad_num'=>$request['reciprocidad_num'],
            'argumento'=>$request['argumento']]);

        Session::flash('create_peticion', 'La peticion fue creada');

        $peticion = Peticion::orderBy('id', 'desc')->first();

        $to_name = Auth::user()->name;
        $to_email = Auth::user()->email;
        $cc_responsable = $peticion->responsable->email;

        switch ($peticion->status) {
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

        $datos = ["Grupo: " . $request['id_grupo'] ,
                "Cliente: " . $request['id_cliente'] ,
                "Nombre del cliente: " . $request['nb_cliente'] ,
                "Producto: " . $request['producto'] ,
                "Tarifa: " . $request['tarifa'] ,
                "Rentabilidad: " . $request['rentabilidad'] ,
                "Reciprocidad: " . $request['reciprocidad'] ,
                "Numero de reciprocidad: " . $request['reciprocidad_num'] ,
                "Argumento: " . $request['argumento']];

        $comentario = NULL;

        $data = array('name'=>Auth::user()->name, 'body' => $body, 'datos'=>$datos, 'comentario' => $comentario);

        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email, $data, $cc_responsable) {
            $message->to($to_email, $to_name)->subject('Petición');
            $message->cc($cc_responsable);
            $message->from('galindo.hayashi@gmail.com','BEyG');
        });


        return redirect('/peticion');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        $responsables = Responsable::pluck('name', 'id')->all();

        return view('peticion.edit', compact('peticion', 'responsables'));
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

        $peticion->update($request->all());

        return redirect('/peticion');
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
