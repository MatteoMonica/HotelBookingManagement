<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;
    public $table = 'login';
    protected $primaryKey = 'idlogin';

    protected $fillable = [
        'username', 'password', 'role'
    ];

    protected $hidden = [
        'password'
    ];
}
