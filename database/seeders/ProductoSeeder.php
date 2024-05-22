<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $producto = new Producto();
        $producto->nombre = fake()->text(45);
        $producto->descripcion = fake()->text(100);
        $producto->precio = fake()->randomFloat(2, 10, 100);
        $producto->fecha_publicacion = fake()->date();
        $producto->puntuacion = fake()->numberBetween(1, 5);
        $producto->id_categoria = fake()->numberBetween(1, 11);
        $producto->id_estado_producto = fake()->numberBetween(1, 2);
        $producto->id_user = 2;
        $producto->save();
        
        $product1 = new Producto();
        $product1->nombre = fake()->text(45);
        $product1->descripcion = fake()->text(100);
        $product1->precio = fake()->randomFloat(2, 10, 100);
        $product1->fecha_publicacion = fake()->date();
        $product1->puntuacion = fake()->numberBetween(1, 5);
        $product1->id_categoria = fake()->numberBetween(1, 11);
        $product1->id_estado_producto = fake()->numberBetween(1, 2);
        $product1->id_user = 3;
        $product1->save();

        $product2 = new Producto();
        $product2->nombre = fake()->text(45);
        $product2->descripcion = fake()->text(100);
        $product2->precio = fake()->randomFloat(2, 10, 100);
        $product2->fecha_publicacion = fake()->date();
        $product2->puntuacion = fake()->numberBetween(1, 5);
        $product2->id_categoria = fake()->numberBetween(1, 11);
        $product2->id_estado_producto = fake()->numberBetween(1, 2);
        $product2->id_user = 3;
        $product2->save();

        $producto3 = new Producto();
        $producto3->nombre = fake()->text(45);
        $producto3->descripcion = fake()->text(100);
        $producto3->precio = fake()->randomFloat(2, 10, 100);
        $producto3->fecha_publicacion = fake()->date();
        $producto3->puntuacion = fake()->numberBetween(1, 5);
        $producto3->id_categoria = fake()->numberBetween(1, 11);
        $producto3->id_estado_producto = fake()->numberBetween(1, 2);
        $producto3->id_user = 3;
        $producto3->save();

        $producto4 = new Producto();
        $producto4->nombre = fake()->text(45);
        $producto4->descripcion = fake()->text(100);
        $producto4->precio = fake()->randomFloat(2, 10, 100);
        $producto4->fecha_publicacion = fake()->date();
        $producto4->puntuacion = fake()->numberBetween(1, 5);
        $producto4->id_categoria = fake()->numberBetween(1, 11);
        $producto4->id_estado_producto = fake()->numberBetween(1, 2);
        $producto4->id_user = 3;
        $producto4->save();

        $producto5 = new Producto();
        $producto5->nombre = fake()->text(45);
        $producto5->descripcion = fake()->text(100);
        $producto5->precio = fake()->randomFloat(2, 10, 100);
        $producto5->fecha_publicacion = fake()->date();
        $producto5->puntuacion = fake()->numberBetween(1, 5);
        $producto5->id_categoria = fake()->numberBetween(1, 11);
        $producto5->id_estado_producto = fake()->numberBetween(1, 2);
        $producto5->id_user = 2;
        $producto5->save();

        $producto6 = new Producto();
        $producto6->nombre = fake()->text(45);
        $producto6->descripcion = fake()->text(100);
        $producto6->precio = fake()->randomFloat(2, 10, 100);
        $producto6->fecha_publicacion = fake()->date();
        $producto6->puntuacion = fake()->numberBetween(1, 5);
        $producto6->id_categoria = fake()->numberBetween(1, 11);
        $producto6->id_estado_producto = fake()->numberBetween(1, 2);
        $producto6->id_user = 2;
        $producto6->save();

        $producto7 = new Producto();
        $producto7->nombre = fake()->text(45);
        $producto7->descripcion = fake()->text(100);
        $producto7->precio = fake()->randomFloat(2, 10, 100);
        $producto7->fecha_publicacion = fake()->date();
        $producto7->puntuacion = fake()->numberBetween(1, 5);
        $producto7->id_categoria = fake()->numberBetween(1, 11);
        $producto7->id_estado_producto = fake()->numberBetween(1, 2);
        $producto7->id_user = 2;
        $producto7->save();

        $producto8 = new Producto();
        $producto8->nombre = fake()->text(45);
        $producto8->descripcion = fake()->text(100);
        $producto8->precio = fake()->randomFloat(2, 10, 100);
        $producto8->fecha_publicacion = fake()->date();
        $producto8->puntuacion = fake()->numberBetween(1, 5);
        $producto8->id_categoria = fake()->numberBetween(1, 11);
        $producto8->id_estado_producto = fake()->numberBetween(1, 2);
        $producto8->id_user = 2;
        $producto8->save();

        $producto9 = new Producto();
        $producto9->nombre = fake()->text(45);
        $producto9->descripcion = fake()->text(100);
        $producto9->precio = fake()->randomFloat(2, 10, 100);
        $producto9->fecha_publicacion = fake()->date();
        $producto9->puntuacion = fake()->numberBetween(1, 5);
        $producto9->id_categoria = fake()->numberBetween(1, 11);
        $producto9->id_estado_producto = fake()->numberBetween(1, 2);
        $producto9->id_user = 2;
        $producto9->save();

        $producto10 = new Producto();
        $producto10->nombre = fake()->text(45);
        $producto10->descripcion = fake()->text(100);
        $producto10->precio = fake()->randomFloat(2, 10, 100);
        $producto10->fecha_publicacion = fake()->date();
        $producto10->puntuacion = fake()->numberBetween(1, 5);
        $producto10->id_categoria = fake()->numberBetween(1, 11);
        $producto10->id_estado_producto = fake()->numberBetween(1, 2);
        $producto10->id_user = 4;
        $producto10->save();

        $producto11 = new Producto();
        $producto11->nombre = fake()->text(45);
        $producto11->descripcion = fake()->text(100);
        $producto11->precio = fake()->randomFloat(2, 10, 100);
        $producto11->fecha_publicacion = fake()->date();
        $producto11->puntuacion = fake()->numberBetween(1, 5);
        $producto11->id_categoria = fake()->numberBetween(1, 11);
        $producto11->id_estado_producto = fake()->numberBetween(1, 2);
        $producto11->id_user = 4;
        $producto11->save();
    }
}
