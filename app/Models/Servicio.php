<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reserva;

class Servicio extends Model
{
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
    public function getPrecioFormattedAttribute()
    {
        return number_format($this->precio, 2); // Formatear el precio con 2 decimales
    }
    public function getDuracionFormattedAttribute()
    {
        $horas = floor($this->duracion / 60); // Obtener las horas
        $minutos = $this->duracion % 60; // Obtener los minutos restantes
        return sprintf('%02d:%02d', $horas, $minutos); // Formatear como HH:MM
    }

}
