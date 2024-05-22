<?php

namespace Database\Seeders;

use App\Models\EstadoProducto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estadoProducto = new EstadoProducto();
        $estadoProducto->estado = 'Nuevo';
        $estadoProducto->save();
        
        
        $estadoProducto2 = new EstadoProducto();
        $estadoProducto2->estado = 'Usado';
        $estadoProducto2->save();
        
        $estadoProducto3 = new EstadoProducto();
        $estadoProducto3->estado = 'Vendido';
        $estadoProducto3->save();
    }
}
