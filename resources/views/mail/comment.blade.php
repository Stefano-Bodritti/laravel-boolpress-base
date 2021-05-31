<h1>E' stato aggiunto un nuovo commento.</h1>
<h5>Il post commentato è <a href="{{ route('guest.show', ['slug' => $post->slug]) }}">{{ $post->title }}</a></h5>
<div>Commento aggiunto da {{ $post->comments->last()->name }}:</div>
<div>{{ $post->comments->last()->content }}</div>