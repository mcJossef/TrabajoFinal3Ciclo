<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Producto;
use App\Models\Rol;
use App\Models\User;
use Database\Factories\ProductoFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolSeeder::class);
        // User::factory(1)->create();
        $this->call(UserSeeder::class);
        $this->call(EstadoProductoSeeder::class);
        $this->call(CategoriaSeeder::class);
        // $this->call(ProductoSeeder::class);
        /*Producto::factory(20)->create();*/
    }
}
