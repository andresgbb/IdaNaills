<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1= new Role;
        $role1->name='admin';
        $role1->save();

        $role2= new Role;
        $role2->name='user';
        $role2->save();
    }
}
