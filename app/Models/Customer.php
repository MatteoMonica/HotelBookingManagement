<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    public $table = 'customers';
    protected $primaryKey = 'idcustomer';

    protected $fillable = [
        'customername','customersurname','customergender','customerbirthdate','customerfiscalcode',
        'customerbirthplace','customerbirthcity','customerbirthprovince','customercitizenship',
        'customerdocumentType','customerdocumentnumber','customerdocumentplaceofissue',
        'customerdocumentcityofissue','customerdocumentprovinceofissue','reservation'
    ];
}
