<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string|max:200',
            'image' => 'required|image',
            'link_github' => 'url|nullable',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'nullable|array|exists:technologies,id'
        ];
    }
}
