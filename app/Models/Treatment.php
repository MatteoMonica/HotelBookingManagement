<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Treatment extends Model
{
    use SoftDeletes;

    public $table = 'treatments';
    protected $primaryKey = 'idtreatment';

    protected $fillable = [
        'descriptiontreatment'
    ];
}
