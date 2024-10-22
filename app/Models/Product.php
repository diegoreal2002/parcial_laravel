<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Añade aquí los campos que pueden ser asignados masivamente
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'is_available',
        'expiration_date',
        'category_id',
        'sku',
    ];
    protected $table = 'product';

    // Relación con Category (Muchos a uno)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

