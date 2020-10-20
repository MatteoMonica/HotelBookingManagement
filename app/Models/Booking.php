<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;

    public $table = 'booking';
    protected $primaryKey = 'idbooking';

    protected $fillable = [
        'reservation','room'
    ];
}
