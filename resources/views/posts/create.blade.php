<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Crea nuovo post</title>
  </head>
  <body>
    <div class="container mt-5">
      <h1>Crea un nuovo post</h1>
      <div class="mt-5">
        
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <form action="{{route('posts.store')}}" method="POST">
          @csrf
          @method('POST')
          <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci un Titolo">
          </div>
          <div class="form-group">
            <label for="date">Data</label>
            <input type="date" class="form-control" id="date" name="date">
          </div>
          <div class="form-group">
            <label for="content">Contenuto</label>
            <textarea class="form-control"  name="content" id="content" cols="30" rows="10" placeholder="Inserisci il Contenuto"></textarea>
          </div>
          <div class="form-group">
            <label for="image">Immagine</label>
            <input type="text" class="form-control" id="image" name="image" placeholder="Inserisci una immagine">
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="published" name="published">
            <label class="form-check-label" for="published">Pubblicato</label>
          </div>
          <div class="mt-3">
            <h5>Tags</h5>
            @foreach ($tags as $tag)
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{$tag->id}}" id="{{$tag->name}}" name="tags[]">
                <label class="form-check-label" for="{{$tag->name}}">
                  {{$tag->name}}
                </label>
              </div>
            @endforeach
          </div>
          <div class="mt-3">
            <button type="submit" class="btn btn-primary">Crea</button>
          </div>
        </form>

      </div>
    </div>
  </body>
</html>