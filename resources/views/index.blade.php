@extends('layouts.main', [
    'title' => 'Главная',
    'metaKeywords' => '',
    'metaDescription' => ''
])
@section('content')
    <section class="posts">
        <div class="posts__list">
            @foreach($posts as $post)
                <article class="post">
                    <a href="{{ route('post.show', ['post' => $post]) }}">
                        <h3>{{ $post->short_title }}</h3>
                        <img src="{{ asset($post->img) }}" loading="lazy" alt="image">
                        <p>{{ $post->short_content }}</p>
                    </a>
                    <div class="post__controls">
                        <div>
                            <span class="action selected">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em">
                                    <path d="M0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L256 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 .0003 232.4 .0003 190.9L0 190.9z"></path>
                                </svg>8</span>
                            <a href="/post.html#comments">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em">
                                    <path d="M256 32C114.6 32 .0272 125.1 .0272 240c0 49.63 21.35 94.98 56.97 130.7c-12.5 50.37-54.27 95.27-54.77 95.77c-2.25 2.25-2.875 5.734-1.5 8.734C1.979 478.2 4.75 480 8 480c66.25 0 115.1-31.76 140.6-51.39C181.2 440.9 217.6 448 256 448c141.4 0 255.1-93.13 255.1-208S397.4 32 256 32z"></path>
                                </svg>14</a>
                        </div>
                        <div><span class="action"> 
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" fill="currentColor" width="1em" height="1em">
                              <path d="M384 48V512l-192-112L0 512V48C0 21.5 21.5 0 48 0h288C362.5 0 384 21.5 384 48z"></path>
                            </svg>0</span>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    {{ $posts->links('layouts.parts.pagination') }}
@endsection
@section('nav')
    <x-menu.categories></x-menu.categories>
@endsection