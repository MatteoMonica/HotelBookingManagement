<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Login extends Authenticatable
{
    use HasFactory, Notifiable;

    public $table = 'login';
    protected $primaryKey = 'idlogin';

    protected $fillable = [
        'name', 'surname', 'username', 'password', 'role'
    ];

    protected $hidden = [
        'password'
    ];
}
