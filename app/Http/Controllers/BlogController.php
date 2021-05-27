<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {

        $posts = Post::where('published', 1)->orderBy('date', 'asc')->get();

        return view('index', compact('posts'));
    }

    public function show($slug) {

        $post = Post::where('slug', $slug)->first();

        return view('show', compact('post'));
    }
}
