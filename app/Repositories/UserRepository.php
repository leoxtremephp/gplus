<?php
/**
 * Created by PhpStorm.
 * User: roman-kozin
 * Date: 10.07.18
 * Time: 20:00
 */

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository
{

    /**
     * @param array $opts
     * @param bool $one
     * @return User|Builder
     */
    public function find($opts = [], $one = false)
    {
        /** @var Builder $users */
        $users = new User();

        foreach ($opts as $field => $value) {
            $users = $users->where($field, $value);
        }

        return $one ? $users->first() : $users;
    }

    /**
     * @param array $opts
     * @param bool $checkExistence
     * @return bool|User
     */
    public function create($opts = [], $checkExistence = false)
    {
        if ($checkExistence) {
            if ($this->find($opts, true)) {
                return false;
            }
        }

        return User::create($opts);
    }
}