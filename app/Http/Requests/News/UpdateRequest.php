<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title'       => ['required', 'string', 'min:5', 'max:200'],
            'author'      => ['required', 'string', 'min:2', 'max:50'],
            'categories'  => ['required', 'array'],
            'status'      => ['required', 'string', 'min:4', 'max:8'],
            'isImage'     => ['nullable', 'boolean'],
            'image'       => ['nullable', 'string'],
            'description' => ['nullable', 'string']
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Необходимо заполнить поле :attribute'
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'заголовок'
        ];
    }
}
