<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'selling_price',
        'status',
        'popular',
        'image',
        'meta_title',
        'meta_descrip',
        'meta_keyword',
    ];
}
