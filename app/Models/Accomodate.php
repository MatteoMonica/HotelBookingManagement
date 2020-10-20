<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accomodate extends Model
{
    use SoftDeletes;

    public $table = 'accomodate';
    protected $primaryKey = 'idaccomodate';

    protected $fillable = [
        'customer','room'
    ];
}
