@extends('layouts.main', [
    'title' => 'Авторизация',
    'metaKeywords' => '',
    'metaDescription' => ''
])
@section('content')
    <form class="auth-reg" action="{{ route('login') }}" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input @error('email') class="error" @enderror type="email" id="email" name="email" placeholder="example@domain.ru">
        <label for="password">Пароль:</label>
        <input @error('password') class="error" @enderror type="password" id="password" name="password" placeholder="***********">
        <label for="remember">Запомнить меня</label>
        <input type="checkbox" name="remember" id="remember">
        <input type="submit" value="Войти">
    </form>
@endsection

@section('nav')
    <x-menu.categories></x-menu.categories>
@endsection