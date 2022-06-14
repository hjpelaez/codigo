<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audience extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relación 1 a muchos inversa entre los modelos Course y Audience
    // Una audiencia le pertenece a muchos cursos
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
}
