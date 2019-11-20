<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeticionRequest;
use App\Peticion;
use App\Responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PeticionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $peticiones = Peticion::where('user_id', '=', $user->id)->paginate(15);

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
        $input = $request->all();

        $user = Auth::user();

        $user->peticion()->create([ 'responsable_id'=>$request['responsable_id'],
            'ug'=>$request['ug'], 'producto'=>$request['producto'],
            'id_grupo'=>$request['id_grupo'], 'id_cliente'=>$request['id_cliente'],
            'tarifa'=>$request['tarifa'], 'rentabilidad'=>$request['rentabilidad'],
            'reciprocidad'=>$request['reciprocidad'], 'reciprocidad_num'=>$request['reciprocidad_num'],
            'argumento'=>$request['argumento']]);

        Session::flash('create_peticion', 'La peticion fue creada');

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
        //
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
        //
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
