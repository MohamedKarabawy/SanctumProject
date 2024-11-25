<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'slug', 
        'description',
        'price'
    ];
    /*protected $table = 'products';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;*/
}
