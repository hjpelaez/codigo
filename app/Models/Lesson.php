<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relación 1 a muchos inversa entre los modelos Section y Lesson
    // Una lección le pertenece a una sección
    public function section()
    {
        return $this->belongsTo('App\Models\Section');
    }

    // Relación 1 a muchos inversa entre los modelos Platform y Lessons
    // Una lección le pertenece a una plataforma
    public function platform()
    {
        return $this->belongsTo('App\Models\Platform');
    }

    // Relación 1 a 1 entre los modelos Lesson y Description
    // Un lección tine una descripción
    public function description()
    {
        return $this->hasOne('App\Models\Description');
    }

    // Relación muchos a muchos entre los modelos Lesson y User
    // Muchas lecciones pertenecen a muchos usuarios
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    // Relación 1 a 1 polimórfica con Resource
    // Una leción puede tener un recurso
    public function resource()
    {
        return $this->morphOne('App\Models\Resorce', 'resourceable');
    }

    // Relación 1 a muchos polimórfica con Comment
    // Una lección puede tener muchos comentarios
    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    // Relación 1 a muchos polimórfica con Reaction
    // Una lección puede tener muchas reacciones
    public function reactions()
    {
        return $this->morphMany('App\Models\Reaction', 'reactionable');
    }

}
