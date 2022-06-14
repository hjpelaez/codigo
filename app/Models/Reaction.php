<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const LIKE = 1;
    const DISLIKE = 2;

    // relación polimórfica
    public function reactionable()
    {
        return $this->morphTo();
    }

    // relación 1 a muchos inversa entre los modelos User y Reaction
    // una reación solo le pertenece a un usuario
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
