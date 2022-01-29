<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //constantes para el campo 'status' que es del tipo 'enum'
    const BORRADOR = 1;
    const PUBLICADO = 2;


    //relacion 1;n inversa, primero con user y luego con category
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    //para la relacion n:m de posts a post_tag
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    //relacion 1:n polimorfica
    public function images(){
        return $this->morphMany(Image::class, 'imageable');//recueperamos el modelo polimorfico y pasamos el modelo y el metodo
    }
}
