<?php

use Illuminate\Database\Seeder;

class SeccionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('secciones')->insert([
            'nombre' => 'Portada',
            'orden' => '1',
            'activo' => 'A',
            'created_at' => '2018-03-14 15:25:51',
            'updated_at' => '2018-03-14 15:25:51',
        ]);

        DB::table('secciones')->insert([
            'nombre' => 'Por qué TLS',
            'orden' => '2',
            'activo' => 'A',
            'created_at' => '2018-03-14 15:25:51',
            'updated_at' => '2018-03-14 15:25:51',
        ]);

        DB::table('secciones')->insert([
            'nombre' => 'Admisión',
            'orden' => '3',
            'activo' => 'A',
            'created_at' => '2018-03-14 15:25:51',
            'updated_at' => '2018-03-14 15:25:51',
        ]);

        DB::table('secciones')->insert([
            'nombre' => 'Toulouse Lab',
            'orden' => '4',
            'activo' => 'A',
            'created_at' => '2018-03-14 15:25:51',
            'updated_at' => '2018-03-14 15:25:51',
        ]);    

        DB::table('secciones')->insert([
            'nombre' => 'Empresas',
            'orden' => '5',
            'activo' => 'A',
            'created_at' => '2018-03-14 15:25:51',
            'updated_at' => '2018-03-14 15:25:51',
        ]);

        DB::table('secciones')->insert([
            'nombre' => 'Incubadora',
            'orden' => '6',
            'activo' => 'A',
            'created_at' => '2018-03-14 15:25:51',
            'updated_at' => '2018-03-14 15:25:51',
        ]);

        DB::table('secciones')->insert([
            'nombre' => 'Programas Cortos',
            'orden' => '7',
            'activo' => 'A',
            'created_at' => '2018-03-14 15:25:51',
            'updated_at' => '2018-03-14 15:25:51',
        ]);

        DB::table('secciones')->insert([
            'nombre' => 'Campus y Sedes',
            'orden' => '8',
            'activo' => 'A',
            'created_at' => '2018-03-14 15:25:51',
            'updated_at' => '2018-03-14 15:25:51',
        ]);

        DB::table('secciones')->insert([
            'nombre' => 'Carreras Profesionales',
            'orden' => '9',
            'activo' => 'A',
            'created_at' => '2018-03-14 15:25:51',
            'updated_at' => '2018-03-14 15:25:51',
        ]);

    }
}
