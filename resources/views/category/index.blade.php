@extends('layouts.main', [
    'title' => 'Категории',
    'metaKeywords' => '',
    'metaDescription' => ''
])

@section('content')
    <a href="{{ route('category.create') }}">Создать категорию</a>
    <section class="list">
        <div class="list__list">
            @foreach ($categories as $category)
                <div class="list__item">
                    <h4>{{ $category->title }}</h4>
                    <div class="stat">
                        <span>
                            <span>Постов:</span>
                            <span class="count">{{ $category->posts_count }}</span>
                        </span>
                    </div>
                    <div class="actions">
                        <a href="{{ route('category.edit', $category) }}">Изменить</a>
                        <form action="{{ route('category.delete', $category) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="danger">Удалить</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{ $categories->links('layouts.parts.pagination') }}
@endsection