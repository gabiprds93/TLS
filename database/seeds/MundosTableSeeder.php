<?php

use Illuminate\Database\Seeder;

class MundosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mundos')->insert([
            'nombre' => 'Interiores',
            'activo' => 'A',
            'created_at' => '2018-03-14 15:25:51',
            'updated_at' => '2018-03-14 15:25:51',
        ]);

        DB::table('mundos')->insert([
            'nombre' => 'Diseño',
            'activo' => 'A',
            'created_at' => '2018-03-14 15:25:51',
            'updated_at' => '2018-03-14 15:25:51',
        ]);

        DB::table('mundos')->insert([
            'nombre' => 'Comunicaciones',
            'activo' => 'A',
            'created_at' => '2018-03-14 15:25:51',
            'updated_at' => '2018-03-14 15:25:51',
        ]);

        DB::table('mundos')->insert([
            'nombre' => 'Moda',
            'activo' => 'A',
            'created_at' => '2018-03-14 15:25:51',
            'updated_at' => '2018-03-14 15:25:51',
        ]);

        DB::table('mundos')->insert([
            'nombre' => 'Digital',
            'activo' => 'A',
            'created_at' => '2018-03-14 15:25:51',
            'updated_at' => '2018-03-14 15:25:51',
        ]);

        DB::table('mundos')->insert([
            'nombre' => 'Publicidad y Marketing',
            'activo' => 'A',
            'created_at' => '2018-03-14 15:25:51',
            'updated_at' => '2018-03-14 15:25:51',
        ]);
    }
}
