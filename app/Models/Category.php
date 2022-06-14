<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relación 1 a muchos con el modelo Course
    // Una categoría tiene muchos cursos
    public function courses()
    {
        return $this->hasMany('App\Models\Course');
    }
}
