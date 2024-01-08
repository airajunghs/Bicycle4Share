<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bicycle extends Model
{
    use HasFactory;
    protected $fillable = [
        'bicycleID',
        'bicycleImage',
        'brand',
        'model',
        'matricid',
        'color',
        'status',
        'bicycleBorrowDate',
        'bicycleReturnDate',
    ];
}
