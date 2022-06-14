<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // Relación 1 a muchos entre los modelos Platform y Lessons
    // Una plataforma tiene muchas lecciones
    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson');
    }
}
