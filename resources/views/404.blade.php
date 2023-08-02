@extends('layouts.app')

@section('content')
 

  @if (! have_posts())
    <section class="bg-white py-full relative">
      <div class="container relative z-10 flex flex-col items-center justify-center">
        <div class="text-9xl heading mb-half">
          <h1>Nie znaleziono strony</h1>
        </div>
        <div ><a href="{{ site_url() }}" class="btn-primary">Powrót</a></div>
      </div>
    </section>

  @endif
@endsection