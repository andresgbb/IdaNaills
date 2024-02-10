<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    //esto indica los que son requeridos y los que tendra que poner los usarios
    protected $fillable=[
        'name'
    ];
    function users(){
        return $this->belongsToMany(User::class); //devuelve una coleccion de datos de user

    }
}
