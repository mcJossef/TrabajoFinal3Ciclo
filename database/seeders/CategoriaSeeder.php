<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*$categoria = new Categoria();
        $categoria->nombre = 'Limpieza';
        $categoria->descripcion = 'Nuestros Aromas Despiertan Tus Sentidos y Te Conectan con Momentos Especiales de tu Vida.';
        $categoria->save();*/

        $categoria1 = new Categoria();
        $categoria1->nombre = 'Electrónicos';
        $categoria1->descripcion = 'Descubre la última tecnología en dispositivos electrónicos para hacer tu vida más fácil.';
        $categoria1->save();

        $categoria2 = new Categoria();
        $categoria2->nombre = 'Moda';
        $categoria2->descripcion = 'Encuentra las últimas tendencias de moda para destacar en cualquier ocasión.';
        $categoria2->save();

        $categoria3 = new Categoria();
        $categoria3->nombre = 'Hogar y Jardín';
        $categoria3->descripcion = 'Transforma tu hogar con decoraciones y accesorios que reflejen tu estilo personal.';
        $categoria3->save();

        // $categoria4 = new Categoria();
        // $categoria4->nombre = 'Libros y Literatura';
        // $categoria4->descripcion = 'Explora mundos imaginarios y descubre historias cautivadoras con nuestra colección de libros.';
        // $categoria4->save();

        // $categoria5 = new Categoria();
        // $categoria5->nombre = 'Salud y Bienestar';
        // $categoria5->descripcion = 'Cuida de tu cuerpo y mente con productos que promueven la salud y el bienestar.';
        // $categoria5->save();

        // $categoria6 = new Categoria();
        // $categoria6->nombre = 'Deportes y Fitness';
        // $categoria6->descripcion = 'Equípate para alcanzar tus metas de fitness y disfruta de tu actividad deportiva favorita.';
        // $categoria6->save();

        // $categoria7 = new Categoria();
        // $categoria7->nombre = 'Juguetes y Juegos';
        // $categoria7->descripcion = 'Diversión garantizada para todas las edades con nuestra selección de juguetes y juegos.';
        // $categoria7->save();

        // $categoria8 = new Categoria();
        // $categoria8->nombre = 'Alimentación Gourmet';
        // $categoria8->descripcion = 'Explora deliciosos sabores y ingredientes únicos con nuestra oferta de alimentos gourmet.';
        // $categoria8->save();

        // $categoria9 = new Categoria();
        // $categoria9->nombre = 'Arte y Artesanía';
        // $categoria9->descripcion = 'Inspírate y expresa tu creatividad con nuestra selección de arte y artículos artesanales.';
        // $categoria9->save();

        // $categoria10 = new Categoria();
        // $categoria10->nombre = 'Viajes y Aventuras';
        // $categoria10->descripcion = 'Prepárate para la próxima aventura con nuestros productos para viajeros y amantes de la exploración.';
        // $categoria10->save();

    }
}
