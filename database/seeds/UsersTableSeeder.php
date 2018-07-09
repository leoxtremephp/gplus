<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Users Table
     *
     * @var string
     */
    private $table = 'users';

    /**
     * Role User Pivot Table
     *
     * @var string
     */
    private $pivot = 'role_user';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->insertGetId([
            'email'      => 'developer@cusobu.com',
            'password'   => bcrypt('ascent'),
            'first_name' => 'CUSOBU',
            'last_name'  => 'Developer',
            'created_at' => Carbon::now()
        ]);

        DB::table($this->pivot)->insertGetId([
            'role_id' => 1,
            'user_id' => 1
        ]);
    }
}
