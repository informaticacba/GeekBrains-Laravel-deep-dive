<?php

namespace App\Http\Requests\OrderToReceiveDataUpload;

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
            'name'  => ['required', 'string', 'min:2', 'max:50'],
            'phone' => ['required', 'string', 'regex:/(^8-[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}$)/u'],
            'email' => ['required', 'email'],
            'info'  => ['nullable', 'string']
        ];
    }
}
