@extends('layouts.main', [
    'title' => 'Регистрация',
    'metaKeywords' => '',
    'metaDescription' => ''
])
@section('content')
    <form class="auth-reg" action="{{ route('register') }}" method="POST">
        @csrf
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name" placeholder="Иван">
        <label for="surname">Фамилия:</label>
        <input type="text" id="surname" name="surname" placeholder="Иванов">
        <label for="gender">Пол:</label>
        <span><input type="radio" id="gender" name="gender" value="0"> Мужской</span>
        <span><input type="radio" id="gender" name="gender" value="1"> Женский</span>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="example@domain.ru">
        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" placeholder="***********">
        <label for="password2">Пароль еще разок:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="***********">
        <input type="submit" value="Регистрация">
    </form>
@endsection

@section('nav')
    <x-menu.categories></x-menu.categories>
@endsection