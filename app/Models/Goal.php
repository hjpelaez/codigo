<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relación 1 a muchos inversa entre los modelos Course y Goal
    // Una meta le pertenece a muchos cursos
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
}
