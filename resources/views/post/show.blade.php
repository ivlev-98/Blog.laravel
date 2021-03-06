@extends('layouts.main', [
    'title' => $post->short_title,
    'metaKeywords' => '',
    'metaDescription' => $post->short_content
])
@section('content')
    <article class="post">
        <span>
            <h3>{{ $post->title }}</h3>
            <img src="{{ asset($post->img) }}" loading="lazy" alt="image">
            <p>{!! Str::markdown($post->content, ['html_input' => 'strip']) !!}</p>
        </span>
        <div class="post__controls">
            <div>
                <span> 
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor" width="1em" height="1em">
                      <path d="M279.6 160.4C282.4 160.1 285.2 160 288 160C341 160 384 202.1 384 256C384 309 341 352 288 352C234.1 352 192 309 192 256C192 253.2 192.1 250.4 192.4 247.6C201.7 252.1 212.5 256 224 256C259.3 256 288 227.3 288 192C288 180.5 284.1 169.7 279.6 160.4zM480.6 112.6C527.4 156 558.7 207.1 573.5 243.7C576.8 251.6 576.8 260.4 573.5 268.3C558.7 304 527.4 355.1 480.6 399.4C433.5 443.2 368.8 480 288 480C207.2 480 142.5 443.2 95.42 399.4C48.62 355.1 17.34 304 2.461 268.3C-.8205 260.4-.8205 251.6 2.461 243.7C17.34 207.1 48.62 156 95.42 112.6C142.5 68.84 207.2 32 288 32C368.8 32 433.5 68.84 480.6 112.6V112.6zM288 112C208.5 112 144 176.5 144 256C144 335.5 208.5 400 288 400C367.5 400 432 335.5 432 256C432 176.5 367.5 112 288 112z"></path>
                    </svg>
                    {{ $post->views }}
                </span>
                @cannot('like', $post)
                    <span class="action">
                @endcannot
                @can('like', $post)
                    <a href="{{ route('post.like', $post) }}" class="@if($post->isLiked) selected @endif">
                @endcan
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em">
                        <path d="M0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L256 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 .0003 232.4 .0003 190.9L0 190.9z"></path>
                    </svg>{{ $post->likes_count }}</span>
                @cannot('like', $post)</span>@endcannot
                @can('like', $post)</a>@endcan
                <a href="#comments">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em">
                    <path d="M256 32C114.6 32 .0272 125.1 .0272 240c0 49.63 21.35 94.98 56.97 130.7c-12.5 50.37-54.27 95.27-54.77 95.77c-2.25 2.25-2.875 5.734-1.5 8.734C1.979 478.2 4.75 480 8 480c66.25 0 115.1-31.76 140.6-51.39C181.2 440.9 217.6 448 256 448c141.4 0 255.1-93.13 255.1-208S397.4 32 256 32z"></path>
                </svg>{{ $post->comments_count }}</a>
            </div>
            <div>
                @can('update', $post)
                    <span class="action">
                        <a href="{{ route('post.edit', ['post' => $post]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" height="1em" fill="currentColor">
                                <path d="M362.7 19.32C387.7-5.678 428.3-5.678 453.3 19.32L492.7 58.75C517.7 83.74 517.7 124.3 492.7 149.3L444.3 197.7L314.3 67.72L362.7 19.32zM421.7 220.3L188.5 453.4C178.1 463.8 165.2 471.5 151.1 475.6L30.77 511C22.35 513.5 13.24 511.2 7.03 504.1C.8198 498.8-1.502 489.7 .976 481.2L36.37 360.9C40.53 346.8 48.16 333.9 58.57 323.5L291.7 90.34L421.7 220.3z"/>
                            </svg>
                        </a>
                    </span>
                @endcan
                @can('delete', $post)
                    <form method="POST" action="{{ route('post.destroy', [$post]) }}">
                        @csrf
                        @method('delete')
                        <button class="danger">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="1em" height="1em" fill="currentColor">
                                <path d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM31.1 128H416V448C416 483.3 387.3 512 352 512H95.1C60.65 512 31.1 483.3 31.1 448V128zM111.1 208V432C111.1 440.8 119.2 448 127.1 448C136.8 448 143.1 440.8 143.1 432V208C143.1 199.2 136.8 192 127.1 192C119.2 192 111.1 199.2 111.1 208zM207.1 208V432C207.1 440.8 215.2 448 223.1 448C232.8 448 240 440.8 240 432V208C240 199.2 232.8 192 223.1 192C215.2 192 207.1 199.2 207.1 208zM304 208V432C304 440.8 311.2 448 320 448C328.8 448 336 440.8 336 432V208C336 199.2 328.8 192 320 192C311.2 192 304 199.2 304 208z"/>
                            </svg>                            
                        </button>
                    </form>
                @endcan
                @can('bookmark', $post)
                    <a href="{{ route('post.bookmark', $post) }}" class="@if($post->isBookmarked) selected @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" fill="currentColor" width="1em" height="1em">
                            <path d="M384 48V512l-192-112L0 512V48C0 21.5 21.5 0 48 0h288C362.5 0 384 21.5 384 48z"></path>
                        </svg>
                    </a>
                @endcan
            </div>
        </div>
    </article>
    <section id="comments">
        @can('create', App\Model\Comment::class)
            <form class="post__comments-form" method="POST" action="{{ route('post.comment', $post) }}">
                @csrf
                <label>
                    <h4>??????????????????????</h4>
                    <textarea name="content" placeholder="???????????????? ???????? ??????????????????????"></textarea>
                </label>
                <div>
                    <input type="submit" value="??????????????????">
                </div>
            </form>
        @endcan
        <div class="post__comments-list">
            <h4>??????????????????????</h4>
            @foreach ($post->comments as $comment)
                <article class="comment">
                    <header class="comment__head">
                        <div>
                            @if($comment->user->img)
                                <img src="{{ asset($comment->user->img) }}" loading="lazy" alt="*">
                            @else
                                <img src="/assets/img/avatar.f02c3bf297bebec8b37b.jpg" loading="lazy" alt="*">
                            @endif
                            <span>{{ $comment->user->name }} {{ $comment->user->surname }}</span>
                        </div>
                        <div><span class="light">{{ $comment->created_at }}</span></div>
                        <div class="light">
                            @cannot('like', $comment)
                                <span class="action">
                            @endcannot
                            @can('like', $post)
                                <a href="{{ route('comment.like', $comment) }}" class="action @if($comment->isLiked) selected @endif">
                            @endcan
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" width="1em" height="1em">
                                    <path d="M0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L256 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 .0003 232.4 .0003 190.9L0 190.9z"></path>
                                </svg>{{ $comment->likes_count }}</span>
                            @cannot('like', $comment)</span>@endcannot
                            @can('like', $comment)</a>@endcan
                            @can('delete', $comment)
                                <span class="action">
                                    <form action="{{ route('comment.delete', $comment) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="1em" height="1em" fill="#da504b">
                                                <path d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM31.1 128H416V448C416 483.3 387.3 512 352 512H95.1C60.65 512 31.1 483.3 31.1 448V128zM111.1 208V432C111.1 440.8 119.2 448 127.1 448C136.8 448 143.1 440.8 143.1 432V208C143.1 199.2 136.8 192 127.1 192C119.2 192 111.1 199.2 111.1 208zM207.1 208V432C207.1 440.8 215.2 448 223.1 448C232.8 448 240 440.8 240 432V208C240 199.2 232.8 192 223.1 192C215.2 192 207.1 199.2 207.1 208zM304 208V432C304 440.8 311.2 448 320 448C328.8 448 336 440.8 336 432V208C336 199.2 328.8 192 320 192C311.2 192 304 199.2 304 208z"/>
                                            </svg>     
                                        </button>
                                    </form>                               
                                </span>
                            @endcan
                        </div>
                    </header>
                    <p>{{ $comment->content }}</p>
                </article>
            @endforeach
            {{ $post->comments->links('layouts.parts.pagination') }}
        </div>
@endsection

@section('nav')
    <x-menu.categories></x-menu.categories>
@endsection