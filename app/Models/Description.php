<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relación 1 a 1 le pertenece a una lección
    public function lesson()
    {
        return $this->belongsTo('App\Models\Lesson');
    }
}
