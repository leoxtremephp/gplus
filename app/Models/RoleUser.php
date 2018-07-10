<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RoleUser
 * @package App\Models
 * @property int id
 * @property int role_id
 * @property int user_id
 * @property User user
 * @property Role role
 *
 */
class RoleUser extends Model
{
    protected $table = 'role_user';

    protected $guarded = [
        'id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne|User
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne|Role
     */
    public function role()
    {
        return $this->hasOne(Role::class);
    }

}
