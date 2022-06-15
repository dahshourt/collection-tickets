<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticket_multiple_settlement extends Model
{
    use HasFactory;
    protected $fillable = [
        'ticket_id',
        'user_id',
        'account',
        'amount' 
    ];
}
