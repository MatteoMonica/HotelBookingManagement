<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusReservation extends Model
{
    use SoftDeletes;

    public $table = 'statusreservation';
    protected $primaryKey = 'idstatusreservation';

    protected $fillable = [
        'descriptionbookingstatus'
    ];
}
