<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

/**
 * Class RolesTableSeeder
 */
class RolesTableSeeder extends Seeder
{

    /**
     * Roles list
     *
     * @var array
     */
    private $roles = [
        'Administrador',
        'Usuario'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        array_map(function ($role) {
            Role::create(['name' => $role]);
        }, $this->roles);
    }
}