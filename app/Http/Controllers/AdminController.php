<?php

namespace App\Http\Controllers;

use App\Category;
use App\Peticion;
use App\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{



    public function index(){

        //$postCount = Post::count();
        //$categoriesCount = Category::count();

        $pendientes = Peticion::where('status','=',0)->count();
        $proceso = Peticion::where('status','=',1)->count();
        $finalizadas = Peticion::where('status','=',2)->count();

        return view('admin/index', compact('pendientes', 'proceso', 'finalizadas'));
    }
}
