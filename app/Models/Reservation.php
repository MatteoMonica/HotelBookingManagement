<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use SoftDeletes;

    public $table = 'reservations';
    protected $primaryKey = 'idreservation';

    protected $fillable = [
        'descriptionbookingstatus','checkin','checkout','totalnights','contacts','treatment',
        'bookingstatus','adultsnumber','kidsnumber','newbornnumber','editabledata','notes'
    ];
}
