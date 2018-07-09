<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Roles Table
     *
     * @var string
     */
    private $table = 'roles';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->insertGetId([
            'name' => 'Administrador',
        ]);

        DB::table($this->table)->insertGetId([
            'name' => 'Usuario',
        ]);
    }
}