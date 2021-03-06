<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'description' => 'required',
        ];
    }

    /**
     * Retornan los mensajes de error.
     *
     * @return array
     */

    public function messages()
    {
        return [
            'title.required' => 'El campo título es requerido.',
            'description.required' => 'El campo descripción es requerido.',
        ];
    }
}
