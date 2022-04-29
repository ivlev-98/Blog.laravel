<header class="site-header">
    <div class="site-header__wrap"><a class="site-header__logo" href="{{ route('index') }}">
        <h1>Blog.template</h1></a>
        <form action="/search">
            <input name="search" placeholder="Поиск" type="text">
        </form>
    </div>
    <div class="site-header__controls">
        @auth
            @if(Auth::user()->img)
                <img src="{{ asset(Auth::user()->img)}}" alt="avatar" loading="lazy">
            @else
                <img src="/assets/img/avatar.f02c3bf297bebec8b37b.jpg" alt="avatar" loading="lazy">
            @endif
            <span>{{ Auth::user()->name }} {{ Auth::user()->surname }}</span>
        @endauth
        @guest <span>Вход/Регистрация</span> @endguest
    </div>
    <svg id="menuTrigger" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="1em" height="1em" fill="currentColor">
        <path d="M0 96C0 78.33 14.33 64 32 64H416C433.7 64 448 78.33 448 96C448 113.7 433.7 128 416 128H32C14.33 128 0 113.7 0 96zM0 256C0 238.3 14.33 224 32 224H416C433.7 224 448 238.3 448 256C448 273.7 433.7 288 416 288H32C14.33 288 0 273.7 0 256zM416 448H32C14.33 448 0 433.7 0 416C0 398.3 14.33 384 32 384H416C433.7 384 448 398.3 448 416C448 433.7 433.7 448 416 448z"></path>
    </svg>
    <nav class="site-header__nav">
        @auth
            <a href="/home.html">Личный кабинет</a>
            <a href="{{ route('post.create') }}">Создать пост</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button>Выйти</button>
            </form>
        @endauth
        @guest
            <a href="{{ route('login') }}">Авторизация</a>
            <a href="{{ route('register') }}">Регистрация</a>
        @endguest
    </nav>
</header>
