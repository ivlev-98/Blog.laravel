<nav class="right-nav @if(!strlen($slot)) empty @endif">
    @auth
        <header class="right-nav__header">
            @if(Auth::user()->img)
                <img src="{{ asset(Auth::user()->img)}}" alt="avatar" loading="lazy">
            @else
                <img src="/assets/img/avatar.f02c3bf297bebec8b37b.jpg" alt="avatar" loading="lazy">
            @endif
            <span>{{ Auth::user()->name }} {{ Auth::user()->surname }}</span>
        </header>
        <div class="right-nav__mobile-links">
            <a href="{{ route('home.index') }}">Личный кабинет</a>
            <a href="create-post.html">Создать пост</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button>Выйти</button>
            </form>
            @if(strlen($slot))
                <hr>
            @endif
        </div>
    @endauth
    @guest
        <div class="right-nav__mobile-links">
            <a href="{{ route('login') }}">Авторизация</a>
            <a href="{{ route('register') }}">Регистрация</a>
            @if(strlen($slot))
                <hr>
            @endif
        </div>
    @endguest
    {{ $slot }}
</nav>