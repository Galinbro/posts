<?php

namespace App\Http\Controllers;

use App\Responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminResponsableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responsables = Responsable::paginate(10);

        return view('admin.responsable.index', compact('responsables'));
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
        Responsable::create($request->all());

        Session::flash('create_resp', 'El responsable fue creado');

        return redirect('/admin/responsable');
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
        $responsable = Responsable::findOrFail($id);

        return view('admin.responsable.edit', compact('responsable'));
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
        $responsable = Responsable::findOrFail($id);

        $responsable->update($request->all());

        Session::flash('update_resp', 'El responsable fue actualizado');

        return redirect('/admin/responsable');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Responsable::findOrFail($id);


        $user->delete();

        Session::flash('deleted_resp', 'El responsable fue borrado');

        return redirect('/admin/responsable');
    }
}
