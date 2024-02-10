<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $fillable = ['importe', 'fecha', 'user_id'];

    /**
     * Obtener el usuario al que pertenece este pago.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
