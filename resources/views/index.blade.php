@extends('layouts.main', [
    'title' => 'Главная',
    'metaKeywords' => '',
    'metaDescription' => ''
])
@section('nav')
    <a href="/auto">Автомобили</a>
    <a class="selected" href="/trevel">Путешествия</a>
    <a href="/story">Истории</a><a href="/programming">Программирование</a>
    <a href="/business">Бизнес</a><a href="/cooking">Кулинария</a>
    <a href="/technologies">Технологии</a>
@endsection