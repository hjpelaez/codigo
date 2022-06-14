<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relación 1 a muchos inversa con el modelo User
    // Un review le pertenece a un usuario
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    // Relación 1 a muchos inversa con el modelo Course
    // Un review le pertenece a un curso
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
}
