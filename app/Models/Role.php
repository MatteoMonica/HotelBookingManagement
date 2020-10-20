<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    public $table = 'roles';
    protected $primaryKey = 'idrole';

    protected $fillable = [
        'descriptionrole'
    ];
}
