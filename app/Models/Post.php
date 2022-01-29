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


}
