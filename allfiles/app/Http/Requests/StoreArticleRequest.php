<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
            'title_ar' => 'nullable',
            'title_en' => 'nullable',
            'content_ar' => 'nullable',
            'content_en' => 'nullable',
            'field_ar' => 'nullable',
            'field_en' => 'nullable',
            'summary_ar' => 'nullable',
            'summary_en' => 'nullable',
            'enabled' => 'nullable',
            'flag' => 'nullable',
            'image' => 'nullable',
        ];
    }
}
