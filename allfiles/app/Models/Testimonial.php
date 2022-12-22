<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    protected $appends = ['image_url'];
    public function getImageUrlAttribute()
    {
        return env('APP_URL') . '/' . env('PUBLIC_PATH') . $this->image;
    }
}
