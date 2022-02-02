<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'source_id'   => ['required', 'int'],
            'status'      => ['required', 'string', 'min:4', 'max:8'],
            'isImage'     => ['nullable', 'boolean'],
            'image'       => ['nullable', 'string'],
            'description' => ['nullable', 'string']
        ];
    }
}
