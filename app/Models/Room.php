<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use SoftDeletes;

    public $table = 'rooms';
    protected $primaryKey = 'idroom';

    protected $fillable = [
        'roomname','roomcapacity','roomcostpernight'
    ];
}
