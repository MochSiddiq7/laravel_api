<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'tb_user'; // Your custom table name
    protected $primaryKey = 'id_user'; // Your custom primary key

    protected $fillable = [
        'nama',
        'email',
        'password',
        'alamat',
        'no_telp',
        'role',
    ];
    protected $hidden = [
        'password',
    ];

    /**
     * Check if the user has a specific role.
     *
     * @param string $role
     * @return bool
     */
    public function hasRole($role)
    {
        return $this->role === $role;
    }
}
