<nav class="right-nav">
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
            <a href="/home.html">Личный кабинет</a>
            <a href="create-post.html">Создать пост</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button>Выйти</button>
            </form>
            <hr>
        </div>
    @endauth
    @guest
        <div class="right-nav__mobile-links">
            <a href="{{ route('login') }}">Авторизация</a>
            <a href="{{ route('register') }}">Регистрация</a>
            <hr>
        </div>
    @endguest
    {{ $slot }}
</nav>