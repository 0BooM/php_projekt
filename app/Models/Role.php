<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $primaryKey = 'role';
    public $incrementing = false;
    protected $keyType = 'string';

    // relationship to users
    public function users()
    {
        return $this->hasMany(User::class, 'role', 'role');
    }
}