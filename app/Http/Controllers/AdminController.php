<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{



    public function index(){

        $postCount = Post::count();
        $categoriesCount = Category::count();

        return view('admin/index', compact('postCount', 'categoriesCount'));
    }
}
