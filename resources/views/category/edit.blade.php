@extends('layouts.main', [
    'title' => 'Редактировать категорию | '.$category->title,
    'metaKeywords' => '',
    'metaDescription' => ''
])
@section('content')
<form class="create-edit" action="{{ route('category.update', $category) }}" method="POST">
    @csrf
    @method('patch')
    @include('category.parts.form')
</form>
@endsection