<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    function roles(){
        return $this->belongsToMany(Role::class);
    }
    public function hasRole(){
        $user = Auth::user(); // Obtener el usuario autenticado
        $userId= $user->id;
        $role = DB::table('role_user')
                ->where('user_id', $userId)
                ->pluck('role_id') //sirve solo obtener la columna especificada
                ->first();
       return $role;
    }
    public function pagos(){
        return $this->hasMany(Pago::class);
    }
    public function reservas(){
        return $this->hasMany(Reserva::class);
    }
}
