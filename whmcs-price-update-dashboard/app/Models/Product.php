<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'tblproducts';
    protected $fillable = [
        'id', 'type', 'name'
    ];

    //disable created at and updated at timestamps
    public $timestamps = false;
}
