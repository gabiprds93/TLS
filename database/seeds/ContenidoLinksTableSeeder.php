<?php

use Illuminate\Database\Seeder;

class ContenidoLinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contenido_links')->insert([
        	'id' => '1',
            'nombre' => 'TLS Thinking',
            'url' => '#',
            'id_contenido' => '2',
            'activo' => 'A',
            'created_at' => '2018-03-14 15:25:51',
            'updated_at' => '2018-03-14 15:25:51',
        ]);

        DB::table('contenido_links')->insert([
        	'id' => '2',
            'nombre' => 'StartUp',
            'url' => '#',
            'id_contenido' => '2',
            'activo' => 'A',
            'created_at' => '2018-03-14 15:25:51',
            'updated_at' => '2018-03-14 15:25:51',
        ]);

        DB::table('contenido_links')->insert([
        	'id' => '3',
            'nombre' => 'Liderazgo y Emprendimiento',
            'url' => '#',
            'id_contenido' => '2',
            'activo' => 'A',
            'created_at' => '2018-03-14 15:25:51',
            'updated_at' => '2018-03-14 15:25:51',
        ]);

        DB::table('contenido_links')->insert([
        	'id' => '4',
            'nombre' => 'TLS LAB',
            'url' => '#',
            'id_contenido' => '2',
            'activo' => 'A',
            'created_at' => '2018-03-14 15:25:51',
            'updated_at' => '2018-03-14 15:25:51',
        ]);
    }
}
