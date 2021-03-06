<?php

namespace App\Http\Controllers;

use App\Archivo;
use App\Category;
use App\Http\Requests\PostsCreateRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::name($request->get('title'))->category($request->get('category'))->emisor($request->get('emisor'))->paginate(10);


        $emisor = Post::with('user')->get()->pluck('user.name', 'user_id')->all();

        $categories = Category::pluck('name', 'id')->all();

        if (trim($request->get('category')) != "")
            $selected1 = ($request->get('category'));
        else
            $selected1 = '';

        if (trim($request->get('emisor')) != "")
            $selected2 = ($request->get('emisor'));
        else
            $selected2 = '';

        return view('admin.posts.index', compact('posts', 'categories', 'emisor', 'selected1', 'selected2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        $input = $request->all();

        $user = Auth::user();

        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;

        }

        if($fileA = $request['archivo_id']){

            $load = Archivo::create(['file'=>$fileA]);

            $input['archivo_id'] = $load->id;

        }

        $user->posts()->create($input);

        Session::flash('create_blog', 'El blog fue creado');

        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $categories = Category::pluck('name', 'id')->all();

        $url = Archivo::findOrFail($post->archivo_id);

        $url = $url->file;

        return view('admin.posts.edit', compact('post', 'categories', 'url'));
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
        $input = $request->all();

        if($file = $request->file('photo_id')){
        $name = time() . $file->getClientOriginalName();

        $file->move('images', $name);

        $photo = Photo::create(['file'=>$name]);

        $input['photo_id'] = $photo->id;

        }
        $postToChange = Post::findOrFail($id );

        $postToChange = $postToChange->archivo_id;

        $url = Archivo::findOrFail($postToChange);

        $url['file'] = $input['archivo_id'];

        $input['archivo_id'] = $url['id'];

        $url->save();

        Auth::user()->posts()->whereId($id)->first()->update($input);

        Session::flash('update_blog', 'El blog fue actualizado');

        return redirect('/admin/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);


        if ($post->photo_id){

            $image_path = $post->photo->file;

            $parse = explode("/", $image_path);

            unlink('images/' . end($parse));

            $photo = Photo::findOrFail($post->photo_id);

            $photo->delete();
        }

        Session::flash('deleted_blog', 'El blog fue borrado');


        $post->delete();

        return redirect('/admin/posts');

    }

    public function post($id){

        $post = Post::findOrFail($id);

        return view('post', compact('post'));
    }
}
