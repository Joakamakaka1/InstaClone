<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Los atributos que pueden ser asignados masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'banned', 
    ];

    /**
     * Los atributos que deberían estar ocultos para los arreglos.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'banned' => 'boolean',  // Asegúrate de que 'banned' se trate como un booleano
    ];
}
