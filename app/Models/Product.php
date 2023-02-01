<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'image'
    ];

    public function getImagePathAttribute()
    {
        return asset('uploads/' . $this->image);
    }

}
