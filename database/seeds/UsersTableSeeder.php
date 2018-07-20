<?php

use App\Models\RoleUser;
use App\Repositories\UserRepository;
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
     * @param UserRepository $userRepository
     * @return void
     */
    public function run(UserRepository $userRepository)
    {
        $users = config('extra.users');

        array_map(function ($userArray) use ($userRepository) {
            $roleId = $userArray['role_id'];
            unset($userArray['role_id']);

            $user = $userRepository->create($userArray, true);
            RoleUser::create(['role_id' => $roleId, 'user_id' => $user->id]);

        }, $users);
    }
}
