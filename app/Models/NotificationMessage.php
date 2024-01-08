<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationMessage extends Model
{
    use HasFactory;
    protected $table = 'notifications_messages';
    protected $fillable = [
        'NotifID',
        'StaffID',
        'StudentID',
        'NotifMessage',
    ];
}
