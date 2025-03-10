<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'publish_date',
        'image_path',
        'user_id'
    ];

    // Relación con el modelo User (Un post pertenece a un usuario)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el modelo Comment (Un post puede tener muchos comentarios)
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function index()
    {
        return view('posts.index');
    }
}
