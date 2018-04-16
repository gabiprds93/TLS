<?php

use Illuminate\Database\Seeder;

class ContenidoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contenido')->delete();
        
        \DB::table('contenido')->insert(array (
            0 => 
            array (
                'id' => 1,
                'titulo' => 'Portada',
                'subtitulo' => 'Portada',
                'color_contenido' => 'CFE046',
                'posicion_links' => 'A',
                'slide_lab' => 'N',
                'pie_contenido' => NULL,
                'video' => NULL,
                'id_seccion' => 1,
                'slug' => 'portada',
                'orden' => 1,
                'activo' => 'A',
                'created_at' => '2018-03-14 15:25:51',
                'updated_at' => '2018-03-14 15:25:51',
            ),
            1 => 
            array (
                'id' => 2,
                'titulo' => 'Modelo Educativo',
                'subtitulo' => 'Formamos profesionales creativos con alta demanda laboral',
                'color_contenido' => 'CFE046',
                'posicion_links' => 'A',
                'slide_lab' => 'N',
                'pie_contenido' => NULL,
                'video' => 'https://www.youtube.com/watch?v=u70GcNMx1yI&feature=youtu.be',
                'id_seccion' => 2,
                'slug' => 'modelo-educativo',
                'orden' => 1,
                'activo' => 'A',
                'created_at' => '2018-03-14 15:25:51',
                'updated_at' => '2018-03-14 15:25:51',
            ),
            2 => 
            array (
                'id' => 3,
                'titulo' => 'Convenios',
                'subtitulo' => '¡Obtén tu licenciatura universitaria internacional!',
                'color_contenido' => 'C23CC6',
                'posicion_links' => 'A',
                'slide_lab' => 'N',
                'pie_contenido' => NULL,
                'video' => 'https://www.youtube.com/watch?v=Wr6rZ4j2G6M&feature=youtu.be',
                'id_seccion' => 2,
                'slug' => 'convenios',
                'orden' => 2,
                'activo' => 'A',
                'created_at' => '2018-03-14 15:25:51',
                'updated_at' => '2018-03-14 15:25:51',
            ),
            3 => 
            array (
                'id' => 4,
                'titulo' => 'Talentos',
                'subtitulo' => 'Es temporada de talentos, en TLS buscamos jóvenes creativos y talentosos como tú.',
                'color_contenido' => 'FF9700',
                'posicion_links' => 'A',
                'slide_lab' => 'N',
                'pie_contenido' => NULL,
                'video' => 'https://www.youtube.com/watch?v=Wr6rZ4j2G6M&feature=youtu.be',
                'id_seccion' => 3,
                'slug' => 'talentos',
                'orden' => 1,
                'activo' => 'A',
                'created_at' => '2018-03-15 19:56:50',
                'updated_at' => '2018-03-15 19:56:50',
            ),
            4 => 
            array (
                'id' => 5,
                'titulo' => 'Proyectos',
                'subtitulo' => 'Más que un espacio de creatividad, somos una cultura de innovación con sed de conocimiento',
                'color_contenido' => 'FF9700',
                'posicion_links' => 'A',
                'slide_lab' => 'N',
                'pie_contenido' => NULL,
                'video' => 'https://www.youtube.com/watch?v=004XsstptZM&feature=youtu.be',
                'id_seccion' => 4,
                'slug' => 'proyectos',
                'orden' => 1,
                'activo' => 'A',
                'created_at' => '2018-03-15 20:17:20',
                'updated_at' => '2018-03-15 20:17:20',
            ),
            5 => 
            array (
                'id' => 6,
                'titulo' => 'Soluciones',
                'subtitulo' => 'Brindamos soluciones creativas que garantizan el crecimiento de tu organización',
                'color_contenido' => 'CFE046',
                'posicion_links' => 'A',
                'slide_lab' => 'N',
                'pie_contenido' => NULL,
                'video' => 'https://www.youtube.com/watch?v=ctJX2q5OGvQ&feature=youtu.be',
                'id_seccion' => 5,
                'slug' => 'soluciones',
                'orden' => 1,
                'activo' => 'A',
                'created_at' => '2018-03-15 20:27:51',
                'updated_at' => '2018-03-15 20:27:51',
            ),
            6 => 
            array (
                'id' => 8,
                'titulo' => 'Experiencia',
                'subtitulo' => 'Vive una experiencia creativa en Toulouse',
                'color_contenido' => 'C23CC6',
                'posicion_links' => 'A',
                'slide_lab' => 'N',
                'pie_contenido' => NULL,
                'video' => NULL,
                'id_seccion' => 6,
                'slug' => 'experiencia',
                'orden' => 1,
                'activo' => 'A',
                'created_at' => '2018-03-15 21:25:10',
                'updated_at' => '2018-03-15 21:25:10',
            ),
            7 => 
            array (
                'id' => 9,
                'titulo' => 'Educación Continua',
                'subtitulo' => 'Tenemos los programas de especialización y actualización más creativos del Perú',
                'color_contenido' => '30B8D4',
                'posicion_links' => 'A',
                'slide_lab' => 'N',
                'pie_contenido' => NULL,
                'video' => 'https://www.youtube.com/watch?v=ctJX2q5OGvQ&feature=youtu.be',
                'id_seccion' => 7,
                'slug' => 'educacion-continua',
                'orden' => 1,
                'activo' => 'A',
                'created_at' => '2018-03-15 21:29:13',
                'updated_at' => '2018-03-15 21:29:13',
            ),
            8 => 
            array (
                'id' => 10,
                'titulo' => 'Modalidades de Titulación',
                'subtitulo' => 'Modalidades de Titulación',
                'color_contenido' => '30B8D4',
                'posicion_links' => 'A',
                'slide_lab' => 'N',
                'pie_contenido' => NULL,
                'video' => 'https://www.youtube.com/watch?v=W2wmZgcrCco&feature=youtu.be',
                'id_seccion' => 9,
                'slug' => 'carreras-profesionales',
                'orden' => 1,
                'activo' => 'A',
                'created_at' => '2018-03-15 21:29:13',
                'updated_at' => '2018-03-15 21:29:13',
            ),
            9 => 
            array (
                'id' => 11,
                'titulo' => 'Startup',
                'subtitulo' => 'startUpTab - 10 a 12 semanas',
                'color_contenido' => '30B8D4',
                'posicion_links' => 'A',
                'slide_lab' => 'N',
                'pie_contenido' => NULL,
                'video' => 'https://www.youtube.com/watch?v=W2wmZgcrCco&feature=youtu.be',
                'id_seccion' => 9,
                'slug' => 'startup',
                'orden' => 2,
                'activo' => 'A',
                'created_at' => '2018-03-15 21:29:13',
                'updated_at' => '2018-03-15 21:29:13',
            ),
            10 => 
            array (
                'id' => 12,
                'titulo' => 'Trayectoria',
                'subtitulo' => 'Trayectoria profesinal - 3 meses',
                'color_contenido' => '30B8D4',
                'posicion_links' => 'A',
                'slide_lab' => 'N',
                'pie_contenido' => NULL,
                'video' => 'https://www.youtube.com/watch?v=W2wmZgcrCco&feature=youtu.be',
                'id_seccion' => 9,
                'slug' => 'trayectoria',
                'orden' => 3,
                'activo' => 'A',
                'created_at' => '2018-03-15 21:29:13',
                'updated_at' => '2018-03-15 21:29:13',
            ),
            11 => 
            array (
                'id' => 13,
                'titulo' => 'Diploma',
                'subtitulo' => 'Diploma de especialización - 7 a 8 meses',
                'color_contenido' => '30B8D4',
                'posicion_links' => 'A',
                'slide_lab' => 'N',
                'pie_contenido' => NULL,
                'video' => 'https://www.youtube.com/watch?v=W2wmZgcrCco&feature=youtu.be',
                'id_seccion' => 9,
                'slug' => 'diploma',
                'orden' => 4,
                'activo' => 'A',
                'created_at' => '2018-03-15 21:29:13',
                'updated_at' => '2018-03-15 21:29:13',
            ),
        ));
        
        
    }
}