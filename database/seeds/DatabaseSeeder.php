<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(SeccionesTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(ContenidoTableSeeder::class);
        $this->call(ContenidoLinksTableSeeder::class);
        $this->call(ContenidoDetalleTableSeeder::class);
        $this->call(MundosTableSeeder::class);
        $this->call(SedesTableSeeder::class);
        $this->call(CarrerasTableSeeder::class);
    }
}
