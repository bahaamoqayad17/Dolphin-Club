<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestimonialsRequest extends FormRequest
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
            'name_ar' => 'nullable',
            'name_en' => 'nullable',
            'field_ar' => 'nullable',
            'field_en' => 'nullable',
            'content_ar' => 'nullable',
            'content_en' => 'nullable',
            'image' => 'nullable',
        ];
    }
}
