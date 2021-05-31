<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        dd($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validazione dei dati
        $request->validate([
            'title' => 'required|string|max:150|unique:posts',
            'date' => 'required|date',
            'content' => 'required|string',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg,bmp|max:2048'
        ]);

        $data = $request->all();

        // verifico se la checkbox è selezionata
        $data['published'] = isset($data['published']) ? 1 : 0;

        // imposto lo slug
        $data['slug'] = Str::slug($data['title'], '-');

        // upload immagine
        if ( isset($data['image']) ) {
            $data['image'] = Storage::disk('public')->put('images', $data['image']);
        }

        // creo variabile e salvo nel db
        $newPost = Post::create($data);

        // aggiungo i tag selezionati
        $newPost->tags()->attach($data['tags']);
        
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        dd($post);
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
