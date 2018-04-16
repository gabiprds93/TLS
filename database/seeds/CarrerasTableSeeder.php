<?php

use Illuminate\Database\Seeder;

class CarrerasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('carreras')->delete();
        
        \DB::table('carreras')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Animación Digital',
                'variacion_tiempo' => '6 Meses',
                'tiempo_total' => '3 Módulos',
                'orden' => 1,
                'id_mundo' => 1,
                'slug' => 'animacion-digital',
                'activo' => 'A',
                'created_at' => '2018-03-14 15:25:51',
                'updated_at' => '2018-03-14 15:25:51',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Arquitectura de Interiores',
                'variacion_tiempo' => '6 Meses',
                'tiempo_total' => '3 Módulos',
                'orden' => 2,
                'id_mundo' => 1,
                'slug' => 'arquitectura-interiores',
                'activo' => 'A',
                'created_at' => '2018-03-14 15:25:51',
                'updated_at' => '2018-03-14 15:25:51',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Comunicación Audiovisual Multimedia',
                'variacion_tiempo' => '6 Meses',
                'tiempo_total' => '3 Módulos',
                'orden' => 3,
                'id_mundo' => 1,
                'slug' => 'comunicacion-audiovisual-multimedia',
                'activo' => 'A',
                'created_at' => '2018-03-14 15:25:51',
                'updated_at' => '2018-03-14 15:25:51',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Comunicación Audiovisual',
                'variacion_tiempo' => '6 Meses',
                'tiempo_total' => '3 Módulos',
                'orden' => 4,
                'id_mundo' => 1,
                'slug' => 'comunicacion-audiovisual',
                'activo' => 'A',
                'created_at' => '2018-03-14 15:25:51',
                'updated_at' => '2018-03-14 15:25:51',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Dirección y Diseño Gráfico',
                'variacion_tiempo' => '6 Meses',
                'tiempo_total' => '3 Módulos',
                'orden' => 5,
                'id_mundo' => 1,
                'slug' => 'direccion-diseno-grafico',
                'activo' => 'A',
                'created_at' => '2018-03-14 15:25:51',
                'updated_at' => '2018-03-14 15:25:51',
            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'Dirección y Diseño Publicitario',
                'variacion_tiempo' => '6 Meses',
                'tiempo_total' => '3 Módulos',
                'orden' => 6,
                'id_mundo' => 1,
                'slug' => 'direccion-diseno-publicitario',
                'activo' => 'A',
                'created_at' => '2018-03-14 15:25:51',
                'updated_at' => '2018-03-14 15:25:51',
            ),
            6 => 
            array (
                'id' => 7,
                'nombre' => 'Diseño de Interiores',
                'variacion_tiempo' => '6 Meses',
                'tiempo_total' => '3 Módulos',
                'orden' => 7,
                'id_mundo' => 1,
                'slug' => 'diseno-interiores',
                'activo' => 'A',
                'created_at' => '2018-03-14 15:25:51',
                'updated_at' => '2018-03-14 15:25:51',
            ),
            7 => 
            array (
                'id' => 8,
                'nombre' => 'Diseño de Producto',
                'variacion_tiempo' => '6 Meses',
                'tiempo_total' => '3 Módulos',
                'orden' => 8,
                'id_mundo' => 1,
                'slug' => 'diseno-producto',
                'activo' => 'A',
                'created_at' => '2018-03-14 15:25:51',
                'updated_at' => '2018-03-14 15:25:51',
            ),
        ));
    }
}
