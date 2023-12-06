<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Check permission user
     *
     * @param string $route_name
     * @return bool
     * */
    public function hasPermissionTo(string $route_name): bool
    {
        $array_role = [];
        try{
            $roles = Role::find($this->role_id)->list_route_admin;
            $roles = json_decode($roles, true);
            $array_role = array_unique($roles, SORT_REGULAR);
        }catch (\Exception $e){
            $array_role = [];
        }

        return in_array($route_name, $array_role);
    }
}
