<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Blog</title>
  </head>
  <body>
    <div class="container mt-5">
      <header class="blog-header py-3">
			  <div class="row flex-nowrap justify-content-between align-items-center">
				<div class="col-4 pt-1">
				  <a class="text-muted" href="#">Subscribe</a>
				</div>
				<h1 class="col-4 text-center">
				  <a class="blog-header-logo text-dark" href="{{route('guest.index')}}">Boolpress</a>
				</h1>
				<div class="col-4 d-flex justify-content-end align-items-center">
				  <a class="text-muted" href="#">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
				  </a>
				  <a class="btn btn-sm btn-outline-secondary" href="#">Sign up</a>
				</div>
			  </div>
			</header>

      <div class="nav-scroller py-1 mb-2">
			  <nav class="nav d-flex justify-content-between">
				<a class="p-2 text-muted" href="#">World</a>
				<a class="p-2 text-muted" href="#">U.S.</a>
				<a class="p-2 text-muted" href="#">Technology</a>
				<a class="p-2 text-muted" href="#">Design</a>
				<a class="p-2 text-muted" href="#">Culture</a>
				<a class="p-2 text-muted" href="#">Business</a>
				<a class="p-2 text-muted" href="#">Politics</a>
				<a class="p-2 text-muted" href="#">Opinion</a>
				<a class="p-2 text-muted" href="#">Science</a>
				<a class="p-2 text-muted" href="#">Health</a>
				<a class="p-2 text-muted" href="#">Style</a>
				<a class="p-2 text-muted" href="#">Travel</a>
			  </nav>
			</div>

      <div class="mt-5">

        <div class="mt-3 mb-3">
          <h1>{{$post->title}}</h1>
            @foreach ($post->tags as $tag)
              <span class="badge badge-primary">{{$tag->name}}</span>
            @endforeach
          <h4>{{$post->date}}</h4>
          <p>{{$post->content}}</p>

          <div class="mt-5">
            <h3>Commenti</h3>
            @if ($post->comments->isNotEmpty())
            <ul>
              @foreach ($post->comments as $comment)
                <li>
                  <h5>{{$comment->name}}</h5>
                  <p>{{$comment->content}}</p>
                </li>
              @endforeach
            </ul>
            @else 
            <p>Nessun commento</p>
            @endif
            
          </div>

          <h3>Aggiungi Commento</h3>
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <form action="{{route('guest.add-comment', ['post' => $post->id])}}" method="post">
            @csrf
            @method('POST')
            <div class="form-group">
              <label for="title">Nome</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Nome">
            </div>
            <div class="form-group">
              <label for="content">Commento</label>
              <textarea class="form-control"  name="content" id="content" cols="30" rows="4" placeholder="Commento"></textarea>
            </div>
            <div class="mt-3">
              <button type="submit" class="btn btn-primary">Inserisci commento</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </body>
</html>