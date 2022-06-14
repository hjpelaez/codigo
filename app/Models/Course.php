<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'status'];

    const DRAFT = 1;
    const REVISION = 2;
    const PUBLISHED = 3;

    // Relación 1 a muchos con el modelo Review
    // Un curso tienen muchos reviews
    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    // Cursos dictados (profesor)
    // Relación 1 a muchos inversa con el modelo User
    // Un curso le pertenece a muchos usuarios
    public function teacher()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    // Cursos matriculados (alumnos)
    // Relación muchos a muchos inversa con el modelo Course
    // Muchos cursos le pertenecen a muchos estudiantes
    public function students()
    {
        return $this->belongsToMany('App\Models\User');
    }

    // Relación 1 a muchos inversa con el modelo Level
    // Un curso le pertenece a un nivel
    public function level()
    {
        return $this->belongsTo('App\Models\Level');
    }

    // Relación 1 a muchos inversa con el modelo Category
    // Un curso le pertenece a una categoría
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    // Relación 1 a muchos inversa con el modelo Level
    // Un curso le pertenece a un precio
    public function price()
    {
        return $this->belongsTo('App\Models\Price');
    }

    // Relación 1 a muchos entre los modelos Course y Requirement
    // Un curso tiene muchos requisitos
    public function requirements()
    {
        return $this->hasMany('App\Models\Requirement');
    }

    // Relación 1 a muchos entre los modelos Course y Goal
    // Un curso tiene muchas metas
    public function goals()
    {
        return $this->hasMany('App\Models\Goal');
    }

    // Relación 1 a muchos entre los modelos Course y Section
    // Un curso tiene muchas secciones
    public function sections()
    {
        return $this->hasMany('App\Models\Section');
    }

    // Relación 1 a muchos entre los modelos Course y Audience
    // Un curso tiene muchas audiemcias
    public function audiences()
    {
        return $this->hasMany('App\Models\Audience');
    }

    // Relación 1 a 1 polimórfica entre los modelos Course e Image
    // Un curso tiene una imagen
    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    // relación entre Course y Lesson mediante Section
    public function lessons()
    {
        return $this->hasManyThrough('App\Models\Lesson', 'App\Models\Section');
    }

}
