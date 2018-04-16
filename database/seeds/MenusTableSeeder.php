<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu')->insert([
            'nombre' => 'Por qué TLS',
            'url' => '#porquetls',
            'orden' => '1',
            'id_seccion' => '2',
            'activo' => 'A',
            'created_at' => '2018-03-14 15:25:51',
            'updated_at' => '2018-03-14 15:25:51',
        ]);

        DB::table('menu')->insert([
            'nombre' => 'Admisión',
            'url' => '#admision',
            'orden' => '2',
            'id_seccion' => '3',
            'activo' => 'A',
            'created_at' => '2018-03-14 15:25:51',
            'updated_at' => '2018-03-14 15:25:51',
        ]);

        DB::table('menu')->insert([
            'nombre' => 'Campus y Sedes',
            'url' => '#campusysedes',
            'orden' => '3',
            'id_seccion' => '4',
            'activo' => 'A',
            'created_at' => '2018-03-14 15:25:51',
            'updated_at' => '2018-03-14 15:25:51',
        ]);

        DB::table('menu')->insert([
            'nombre' => 'Alumnos',
            'url' => '#alumnos',
            'sublink_1' => 'Intranet de Estudiantes',
            'url_1' => '#intranet',
            'sublink_2' => 'Bolsa de Trabajo',
            'url_2' => '#bolsatrabajo',
            'sublink_3' => 'Campus Evolution',
            'url_3' => '#campusevolution',
            'sublink_4' => 'Google Store',
            'url_4' => '#googlestore',
            'sublink_5' => 'Apple Store',
            'url_5' => '#applestore',
            'orden' => '4',
            'id_seccion' => '1',
            'activo' => 'A',
            'created_at' => '2018-03-14 15:25:51',
            'updated_at' => '2018-03-14 15:25:51',
        ]);

        DB::table('menu')->insert([
            'nombre' => 'Radar TLS',
            'url' => 'blog',
            'orden' => '5',
            'id_seccion' => '1',
            'activo' => 'A',
            'created_at' => '2018-03-14 15:25:51',
            'updated_at' => '2018-03-14 15:25:51',
        ]);
    }
}
