<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\status;
use App\Models\group;
class workflow extends Model
{
    use HasFactory;

    public function to_status(){
        return $this->hasMany(status::class, 'id', 'transfer_status');
    }

    public function to_group(){
        return $this->hasMany(group::class, 'id', 'transfer_group');
    }

}
