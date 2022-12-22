<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubscriptionRequest extends FormRequest
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
            'name' => 'required',
            'id_number' => 'required',
            'birth_date' => 'required',
            'gender' => 'required',
            'blood_type' => 'required',
            'location' => 'required',
            'telephone' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'subscription_type' => 'required',
            'training_days' => 'required',
            'status' => 'required',
        ];
    }
}
