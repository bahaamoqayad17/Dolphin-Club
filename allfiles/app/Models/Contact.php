<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function createRules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'number' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ];
    }
}
