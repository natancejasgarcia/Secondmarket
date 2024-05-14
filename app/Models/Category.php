<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Indica los atributos que pueden ser asignados masivamente
    protected $fillable = ['name'];

    // Relación con Productos
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
