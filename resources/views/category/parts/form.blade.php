<label for="title">Заголовок:</label>
<input type="text" id="title" name="title" placeholder="Заголовок" value="{{ old('title') ?? $category->title ?? '' }}">
<input type="submit" value="Сохранить">