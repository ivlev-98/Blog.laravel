@foreach ($categories as $category)
    <a
        @if($category->selected) class="selected" @endif
        href="{{ route('category.show', ['category' => $category->id]) }}"
    >{{ $category->title }}</a>
@endforeach