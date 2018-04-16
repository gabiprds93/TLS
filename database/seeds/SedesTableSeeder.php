<?php

use Illuminate\Database\Seeder;

class SedesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sedes')->insert([
            'nombre' => 'Chacarilla',
            'direccion' => 'Av. Primavera 970, Surco',
            'latitud' => '00.00',
            'longitud' => '00.00',
            'activo' => 'A',
            'created_at' => '2018-03-14 15:25:51',
            'updated_at' => '2018-03-14 15:25:51',
        ]);

        DB::table('sedes')->insert([
            'nombre' => 'Javier Prado',
            'direccion' => 'Av. Jv. Prado Oeste 980, Magdalena',
            'latitud' => '00.00',
            'longitud' => '00.00',
            'activo' => 'A',
            'created_at' => '2018-03-14 15:25:51',
            'updated_at' => '2018-03-14 15:25:51',
        ]);

        DB::table('sedes')->insert([
            'nombre' => 'Lima Norte',
            'direccion' => '3 piso CC. Plaza Norte, junto al teatroLima Sur',
            'latitud' => '00.00',
            'longitud' => '00.00',
            'activo' => 'A',
            'created_at' => '2018-03-14 15:25:51',
            'updated_at' => '2018-03-14 15:25:51',
        ]);

        DB::table('sedes')->insert([
            'nombre' => 'Lima Sur',
            'direccion' => '1er Nivel CC Plaza Sur, al costado de la zona entretenimiento',
            'latitud' => '00.00',
            'longitud' => '00.00',
            'activo' => 'A',
            'created_at' => '2018-03-14 15:25:51',
            'updated_at' => '2018-03-14 15:25:51',
        ]);

        DB::table('sedes')->insert([
            'nombre' => 'San Miguel',
            'direccion' => 'Distrito San Miguel',
            'latitud' => '00.00',
            'longitud' => '00.00',
            'activo' => 'A',
            'created_at' => '2018-03-14 15:25:51',
            'updated_at' => '2018-03-14 15:25:51',
        ]);
    }
}
