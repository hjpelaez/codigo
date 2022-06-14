<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // relación polimórfica
    public function commentable()
    {
        return $this->morphTo();
    }

    // relación 1 a muchos inversa entre los modelos User y Comment
    // una comentario solo le pertenece a un usuario
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    // Relación 1 a muchos polimórfica
    // Los comentarios pueden ser comentados
    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    // Relación 1 a muchos polimórfica
    // Los comentarios pueden recibir reaciones
    public function reations()
    {
        return $this->morphMany('App\Models\Reaction', 'reationable');
    }

}
