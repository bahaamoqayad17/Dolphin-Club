<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function createRules()
    {
        return [
            'id_number' => 'required|size:9',
            'name' => 'required',
            'birth_date' => 'required|before:today',
            'gender' => 'required',
            'blood_type' => 'required|in:A,AB,B,O',
            'location' => 'nullable',
            'telephone' => 'nullable',
            'phone_number' => 'required|max:14',
            'email' => 'nullable',
            'course_id' => 'required|exists:courses,id',
            'training_days' => 'required',
        ];
    }

    public function course()
    {
        return $this->belongsTo(Course::class)->withDefault();
    }
}
