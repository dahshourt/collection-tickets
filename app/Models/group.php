<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel;


class group extends BaseModel
{
    use HasFactory;
	
	 protected $fillable = [

        'name',
        'description',
        'group_email',
		'active'
        
    ];
}