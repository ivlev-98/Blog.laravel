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
                        <span class="action"> 
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor" width="1em" height="1em">
                              <path d="M279.6 160.4C282.4 160.1 285.2 160 288 160C341 160 384 202.1 384 256C384 309 341 352 288 352C234.1 352 192 309 192 256C192 253.2 192.1 250.4 192.4 247.6C201.7 252.1 212.5 256 224 256C259.3 256 288 227.3 288 192C288 180.5 284.1 169.7 279.6 160.4zM480.6 112.6C527.4 156 558.7 207.1 573.5 243.7C576.8 251.6 576.8 260.4 573.5 268.3C558.7 304 527.4 355.1 480.6 399.4C433.5 443.2 368.8 480 288 480C207.2 480 142.5 443.2 95.42 399.4C48.62 355.1 17.34 304 2.461 268.3C-.8205 260.4-.8205 251.6 2.461 243.7C17.34 207.1 48.62 156 95.42 112.6C142.5 68.84 207.2 32 288 32C368.8 32 433.5 68.84 480.6 112.6V112.6zM288 112C208.5 112 144 176.5 144 256C144 335.5 208.5 400 288 400C367.5 400 432 335.5 432 256C432 176.5 367.5 112 288 112z"></path>
                            </svg>
                            {{ $post->views }}
                        </span>
                        @cannot('like', $post)
                            <span class="action">
                        @endcannot
                        @can('like', $post)
                            <a href="{{ route('post.like', $post) }}" class="action @if($post->likedBy(auth()->user()->id)) selected @endif">
                        @endcan
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em">
                                <path d="M0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L256 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 .0003 232.4 .0003 190.9L0 190.9z"></path>
                            </svg>{{ $post->likes_count }}</span>
                        @cannot('like', $post)</span>@endcannot
                        @can('like', $post)</a>@endcan
                        <a href="{{ route('post.show', $post) }}#comments">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em">
                                <path d="M256 32C114.6 32 .0272 125.1 .0272 240c0 49.63 21.35 94.98 56.97 130.7c-12.5 50.37-54.27 95.27-54.77 95.77c-2.25 2.25-2.875 5.734-1.5 8.734C1.979 478.2 4.75 480 8 480c66.25 0 115.1-31.76 140.6-51.39C181.2 440.9 217.6 448 256 448c141.4 0 255.1-93.13 255.1-208S397.4 32 256 32z"></path>
                            </svg>{{ $post->comments_count }}</a>
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