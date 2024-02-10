<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_user = Role::where('name', 'user')->first();

        //Creamos el usuario
        $user = new User;
        $user->name = "Angabe";
        $user->email = "angabe@gmail.com";
        $user->password = Hash::make('1234');
        $user->save();

        $user2 = new User;
        $user2->name = "marc";
        $user2->email = "marc@gmail.com";
        $user2->password = Hash::make('1234');
        $user2->save();

        // Asignar roles a los usuarios
        $user->roles()->attach($role_admin);
        $user2->roles()->attach($role_user);
    }
}

