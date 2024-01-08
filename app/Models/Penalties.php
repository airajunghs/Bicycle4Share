<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penalties extends Model
{
    use HasFactory;

    protected $fillable = [
        'NotifID',
        'ComplaintID',
        'PenaltyID',
        'currentDate',
        'currentTime',
        'PenaltyAmount',
        'PenaltyDescription',
        'PenaltyStatus',
        'PenaltyAccount',
        'PenaltyReceiptFile',
        'StudentID',

    ];

    public function complaints() {
        return $this->belongsTo(Complaints::class,'PenaltyID', 'PenaltyID');
    }
}
