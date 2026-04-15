<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionWorkflow extends Model
{
    protected $table='transaction_workflow';
    protected $fillable = [
        'workflow_id ',
        'transaction_type_id',
		'creator_group_id',
       
    ];
    use HasFactory;
	
	
	public function transactionType(){
        return $this->belongsTo(transaction_type::class, 'transaction_type_id');
    }

    public function group(){
        return $this->belongsTo(group::class, 'creator_group_id');
    }
	
	public function workflow(){
        return $this->belongsTo(workflow::class, 'workflow_id');
    }

	
}
