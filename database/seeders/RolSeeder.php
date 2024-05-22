<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = new Rol();
        $role->nombre = 'user';
        $role->save();

        $role = new Rol();
        $role->nombre = 'admin';
        $role->save();
    }
}
