<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    //model kena sama dengan migration
    protected $fillable = [
        'NotifID',
        'StaffID',
        'StudentID',
        'NotifMessage',
        'NotifDate',
        'NotifTime',
    ];

    public function messages()
    {
        return $this->hasMany(NotificationMessage::class, 'NotifID', 'NotifID');
    }

}
