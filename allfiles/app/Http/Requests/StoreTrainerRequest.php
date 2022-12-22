<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrainerRequest extends FormRequest
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
            'description_ar' => 'nullable',
            'description_en' => 'nullable',
            'image' => 'nullable',
            'facebook' => 'nullable',
            'gmail' => 'nullable',
            'twitter' => 'nullable',
            'linkedin' => 'nullable',
        ];
    }
}
