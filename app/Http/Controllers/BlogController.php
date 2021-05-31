<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\Mail\CommentMail;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BlogController extends Controller
{
    public function index() {

        $posts = Post::where('published', 1)->orderBy('date', 'asc')->get();

        return view('index', compact('posts'));
    }

    public function show($slug) {

        $post = Post::where('slug', $slug)->first();
        $tags = Tag::all();

        return view('show', compact('post', 'tags'));
    }

    public function addComment(Request $request, Post $post) {
        // validazione
        $request->validate([
            'name' => 'required|string|max:100',
            'content' => 'required|string'
        ]);

        // creo commento e salvo
        $newComment = new Comment();
        $newComment->name = $request->name;
        $newComment->content = $request->content;
        $newComment->post_id = $post->id;
        $newComment->save();

        // invio mail
        Mail::to('prova@mail.it')->send(new CommentMail());

        return back();
    }
}
