<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relación 1 a 1 inversa con el modelo User
    // Un perfil le pertenece a un usuario
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
