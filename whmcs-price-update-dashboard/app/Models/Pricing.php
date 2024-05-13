<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;

    protected $table = 'tblpricing';
    protected $fillable = [
        'id',
        'type',
        'currency',
        'relid',
        'msetupfee',
        'qsetupfee',
        'ssetupfee',
        'asetupfee',
        'bsetupfee',
        'tsetupfee',
        'monthly',
        'quarterly',
        'semiannually',
        'annually',
        'biennially',
        'triennially',
    ];

    //disable created at and updated at timestamps
    public $timestamps = false;
}
