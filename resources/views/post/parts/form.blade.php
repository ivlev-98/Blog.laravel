<label for="title">Название:</label>
<input type="text" id="title" name="title" placeholder="Заголовок" value="{{ old('title') ?? $post->title ?? '' }}">
<label for="img" id="imgLabel">
    <div class="control">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="1em" height="1em" fill="currentColor">
            <path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z"></path>
        </svg>
        <span>Обложка</span>
    </div>
    <div class="img"></div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="1em" height="1em" fill="currentColor">
        <path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z"></path>
    </svg>
</label>
<input type="file" name="img" id="img">
<label for="content">Контент:</label>
<textarea id="content" name="content">{{ old('content') ?? $post->content ?? '' }}</textarea>
<label for="category">Категория:</label>
<select id="category" name="category">
    @foreach ($categories as $category)
        @if(old('category'))
            <option
                {{ $category->id === old('category') ? 'selected' : ''}}
                value="{{ $category->id }}"
            >{{ $category->title }}</option>
        @elseif(isset($post->category_id))
        <option {{ $category->id === $post->category_id ? 'selected' : '' }}
            value="{{ $category->id }}">{{ $category->title }}</option>
        @else
            @if($loop->first)
                <option selected value="{{ $category->id }}">{{ $category->title }}</option>
            @else
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endif
        @endif
    @endforeach
</select>
<input type="submit" value="Сохранить">