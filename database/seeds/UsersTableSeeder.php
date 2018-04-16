<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Julio Blanco',
            'email' => 'julio@eureka.com',
            'password' => bcrypt('julio3004005'),
        ]);

        DB::table('users')->insert([
            'name' => 'Jorge García',
            'email' => 'jorge@eurekacrew.com',
            'password' => bcrypt('admin2016'),
        ]);

        DB::table('users')->insert([
            'name' => 'TLS Admin',
            'email' => 'administrador@tls.edu.pe',
            'password' => bcrypt('Xz.5346Pl.44'),
        ]);
    }
}
