<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticket_log_entry extends Model
{
    use HasFactory;
    protected $table='ticket_log_entries';

    protected $fillable = [

        'ticket_id',
        'user_id',
        'comment',
    ];
}
