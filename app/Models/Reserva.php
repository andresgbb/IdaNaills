<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = ['fecha', 'user_id', 'servicio_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }
}

