<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Users Table
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Many to Many Users and Roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role)
    {
        return $this->roles()->where(['name' => $role])->first() ? true : false;
    }

    public function hasAnyRole($roles): bool
    {
        switch (gettype($roles)) {

            case 'array':
                foreach ($roles as $role) {
                    if ($this->hasRole($role)) {
                        return true;
                    }
                }
                break;

            case 'string':
                if ($this->hasRole($roles)) {
                    return true;
                }
                break;

            default:
                return false;
        }
    }
}
