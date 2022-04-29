@extends('layouts.main',[
    'title' => Auth::user()->name.' '.Auth::user()->surname,
    'metaKeywords' => Auth::user()->name.' '.Auth::user()->surname,
    'metaDescription' => Auth::user()->name.' '.Auth::user()->surname
])

@section('content')
<div class="home">
    <figure class="home__avatar">
        @if(Auth::user()->img)
            <img loading="lazy" alt="avatar" src="{{ Auth::user()->img }}">
        @else
            <img loading="lazy" alt="avatar" src="/assets/img/avatar.f02c3bf297bebec8b37b.jpg">
        @endif
        <figcaption>{{ Auth::user()->name }} {{ Auth::user()->surname }}</figcaption>
    </figure>
    <div class="home__stat">
      <div class="home__row">
        <div class="home__col home__col-small"><span class="home__count home__green">15</span><span>Постов</span></div>
        <div class="home__col home__col-small"><span class="home__count home__green">85</span><span>Комментариев</span></div>
      </div>
      <div class="home__row">
        <div class="home__col"><span>Город:</span><span>День рождения:</span></div>
        <div class="home__col"><span class="home__green">Воронеж</span><span class="home__green">29.05.1998</span></div>
      </div>
    </div>
</div>
@endsection

@section('nav')
    <a class="selected" href="{{ route('home.index') }}">Личный кабинет</a>
@endsection