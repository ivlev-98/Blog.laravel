<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:128'],
            'short_content' => ['required', 'string', 'min:10', 'max:512'],
            'content' => ['required', 'string','min:20', 'max:4096'],
            'img' => ['required', 'image', 'mimes:png,jpg,webp,jpeg,gif', 'max:20480']
        ];
    }

    public function attributes(): array
    {
        return [
            'img' => 'Обложка',
            'title' => 'Заголовок',
            'short_content' => 'Краткое содержание',
            'content' => 'Контент'
        ];
    }

    public function messages(): array
    {
        return [
            'mimes' => ':attribute должна быть следующих типов: :values.'
        ];
    }
}
