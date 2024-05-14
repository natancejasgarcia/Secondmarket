<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Asegúrate de que estos son los únicos campos que pueden ser asignados masivamente.
    protected $fillable = ['category_id', 'name', 'description', 'price', 'image', 'user_id'];

    // Define la relación con la tabla de usuarios
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Si necesitas alguna relación con otra tabla, por ejemplo con 'categories'
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
