<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel;


class category extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        'name',
        'active',
    ];
}
