@extends('layouts.main', [
    'title' => 'Создать пост',
    'metaKeywords' => '',
    'metaDescription' => ''
])
@section('content')
<form class="create-edit" action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('post.parts.form')
</form>
@endsection