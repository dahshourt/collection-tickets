<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Status;
use App\Models\group;
class workflow extends Model
{
    use HasFactory;
	
	protected $fillable = [

        'previous_group',
        'current_group',
        'current_status',
        'transfer_group',
        'transfer_status',
        'category_id',
        'active',
        'creator_group_id',
		'transaction_type_id'
    ];

    public function to_status(){
        return $this->hasMany(Status::class, 'id', 'transfer_status');
    }

    public function to_group(){
        return $this->hasMany(group::class, 'id', 'transfer_group');
    }
	
	
	public function status(){
        return $this->belongsTo(Status::class, 'transfer_status');
    }

    public function group(){
        return $this->belongsTo(group::class, 'transfer_group');
    }
	
	public function from_status(){
        return $this->belongsTo(Status::class, 'current_status');
    }

    public function from_group(){
        return $this->belongsTo(group::class, 'current_group');
    }
	
	public function creator_group(){
        return $this->belongsTo(group::class, 'creator_group_id');
    }
	
	public function previousGroup(){
        return $this->belongsTo(group::class, 'previous_group');
    }
	
	public function transactionType(){
        return $this->belongsTo(transaction_type::class, 'transaction_type_id');
    }

}
