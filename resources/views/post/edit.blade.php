@extends('layouts.main', [
    'title' => 'Редактировать пост | '.$post->short_title,
    'metaKeywords' => '',
    'metaDescription' => ''
])
@section('content')
<form class="create-edit" action="{{ route('post.update', [$post]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('patch')
    @include('post.parts.form')
</form>
@endsection