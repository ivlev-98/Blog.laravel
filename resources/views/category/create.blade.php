@extends('layouts.main', [
    'title' => 'Создать категорию',
    'metaKeywords' => '',
    'metaDescription' => ''
])
@section('content')
<form class="create-edit" action="{{ route('category.store') }}" method="POST">
    @csrf
    @include('category.parts.form')
</form>
@endsection