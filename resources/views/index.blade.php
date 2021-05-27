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
				  <a class="blog-header-logo text-dark" href="#">Boolpress</a>
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

        <div class="row">
          <div class="col-md-8 blog-main">

          @foreach ($posts as $post)
          <div class="blog-post mt-5">
            <h2 class="blog-post-title">{{$post->title}}</h2>
            <p class="blog-post-meta">{{$post->date}}</p>
            <p>
              {{$post->content}}
            </p>
            <div>
              <a href="{{route('guest.show', ['slug' => $post->slug])}}">Leggi di più</a>
            </div>
          </div><!-- /.blog-post -->
          @endforeach


          </div><!-- /.blog-main -->

          <aside class="col-md-4 blog-sidebar">
          <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">About</h4>
            <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>

          <div class="p-3">
            <h4 class="font-italic">Archives</h4>
            <ol class="list-unstyled mb-0">
            <li><a href="#">March 2014</a></li>
            <li><a href="#">February 2014</a></li>
            <li><a href="#">January 2014</a></li>
            <li><a href="#">December 2013</a></li>
          </div>
          </aside><!-- /.blog-sidebar -->

        </div><!-- /.row -->

      </div>
    </div>
  </body>
</html>