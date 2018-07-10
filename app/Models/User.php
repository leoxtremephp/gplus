<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package App\Models
 * @property int id
 * @property string first_name
 * @property string last_name
 * @property string email
 * @property string password
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property Carbon deleted_at
 */
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * Users Table
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    protected $casts = [
        'active' => 'bool'
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Password encryption on create/update the User
     *
     * @param null|string $password
     */
    public function setPasswordAttribute($password = null)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * Many to Many Users and Roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function roles()
    {
        return $this->hasManyThrough(Role::class, RoleUser::class);
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

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($value)
    {
        return;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return;
    }
}
