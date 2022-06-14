<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    // Relación 1 a 1 con el modelo Profile
    // Un usuario tiene un perfil
    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }

    // Cursos dictados (profesor)
    // Relación 1 a muchos con el modelo Course
    // Un profesor tiene muchos cursos
    public function courses_dictated()
    {
        return $this->hasMany('App\Models\Course');
    }

    // Cursos matriculados (alumnos)
    // Relación muchos a muchos con el modelo Course
    // Muchos alumnos le pertenecen a muchos cursos
    public function courses_enrolled()
    {
        return $this->belongsToMany('App\Models\Course');
    }

    // Relación 1 a muchos con el modelo Review
    // Un usuario tienen muchos reviews
    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    // Relación muchos a muchos entre los modelos Lesson y User
    // Muchos usuarios pertenecen a muchoas lecciones
    public function lessons()
    {
        return $this->belongsToMany('App\Models\User');
    }

    // Relación 1 a muchos con el modelo Comment
    // Un usuario tiene muchos comentarios
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    // Relación 1 a muchos con el modelo Reaction
    // Un usuario tiene muchas reacciones
    public function reactions()
    {
        return $this->hasMany('App\Models\Reaction');
    }

}
