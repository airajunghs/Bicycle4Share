<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaints extends Model
{
    use HasFactory;

    protected $fillable = [
        'StudentID',
        'PenaltyID',
        'bicycleID',
        'userID',
        'complaintID',
        'currentDate',
        'currentTime',
        'phoneNum',
        'complaint',
        'status',
        'remarks',
    ];

    public function penalties() {
        return $this->belongsTo(Penalties::class);
    }
}
