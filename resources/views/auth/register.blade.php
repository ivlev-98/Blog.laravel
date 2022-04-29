@extends('layouts.main', [
    'title' => 'Регистрация',
    'metaKeywords' => '',
    'metaDescription' => ''
])
@section('content')
    <form class="auth-reg" action="{{ route('register') }}" method="POST">
        @csrf
        <label for="name">Имя:</label>
        <input
            type="text"
            @error('name') class="error" @enderror
            id="name"
            name="name"
            placeholder="Иван"
            value="{{ old('name') ?? '' }}">
        <label for="surname">Фамилия:</label>
        <input
            type="text"
            @error('surname') class="error" @enderror
            id="surname"
            name="surname"
            placeholder="Иванов"
            value="{{ old('surname') ?? '' }}">
        <label>Пол:</label>
        <span>
            <span>
                <input type="radio" id="male" name="gender" value="0">
                <label for="male">Мужской</label>
            </span>
            <span>
                <input type="radio" id="female" name="gender" value="1">
                <label for="female">Женский</label>
            </span>
        </span>
        <label for="email">Email:</label>
        <input
            type="email"
            @error('email') class="error" @enderror
            id="email"
            name="email"
            placeholder="example@domain.ru"
            value="{{ old('email') ?? '' }}">
        <label for="password">Пароль:</label>
        <input
            type="password"
            @error('password') class="error" @enderror
            id="password"
            name="password"
            placeholder="***********">
        <label for="password_confirmation">Пароль еще разок:</label>
        <input
            type="password"
            @error('password_confirmation') class="error" @enderror
            id="password_confirmation"
            name="password_confirmation"
            placeholder="***********">
        <input type="submit" value="Регистрация">
    </form>
@endsection
