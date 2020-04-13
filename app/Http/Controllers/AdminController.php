<?php

namespace App\Http\Controllers;

use App\Peticion;
use App\Responsable;
use Illuminate\Http\Request;
class AdminController extends Controller
{



    public function index(Request $request){

        $responsables = Responsable::pluck('name', 'id')->all();
        $pendientes = Peticion::emisor($request->get('status'))->responsable($request->get('responsable'))->where('status','=',0)->count();
        $proceso = Peticion::emisor($request->get('status'))->responsable($request->get('responsable'))->where('status','=',1)->count();
        $finalizadas = Peticion::emisor($request->get('status'))->responsable($request->get('responsable'))->where('status','=',2)->count();
        $correcciones = Peticion::emisor($request->get('status'))->responsable($request->get('responsable'))->where('status','=',3)->count();

        if (trim($request->get('responsable')) != "")
            $responsable = Responsable::findorFail($request->get('responsable'))->id;
        else
            $responsable = '';

        return view('admin/index', compact('pendientes', 'proceso', 'finalizadas', 'responsables', 'responsable', 'correcciones'));
    }
}
