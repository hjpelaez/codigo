<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relación 1 a muchos inversa entre los modelos Course y Section
    // Una sección le pertenece a muchos cursos
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    // Relación 1 a muchos entre los modelos Section y Lesson
    // Una section tiene muchas lecciones
    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson');
    }

}
