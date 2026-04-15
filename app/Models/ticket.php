<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel;
use App\Models\ticket_attachment;
use App\Models\ticket_multiple_settlement;
use App\Models\ticket_log_entry;
use App\Models\group;
use App\Models\Status;

class ticket extends BaseModel
{
use HasFactory;
    protected $fillable = [
        'customer_name',
        'account',
        'creator_id',
        'user_action_id',
        'status_id',
        'group_id',
        'customer_type_id',
        'market_segment_id',
        'transaction_type_id',
        'receiver_bank_id',
        'bank_transaction_date',
        'transaction_amount',
        'description',
        'cheque_number',
		'previous_user_id',
		'previous_status_id',
		'previous_group_id',
		'add_on_oracle',
		'add_on_oracle_date',
		'rejection_reason_id',
		'rejection_reason_comment',
		'creator_group_id',
    ];
	
	/*public function setBankTransactionDateAttribute($value) {
      $this->attributes['bank_transaction_date'] = date('Y-m-d', strtotime($value) );
	}*/

    public function attachments(){
        return $this->hasMany(ticket_attachment::class, 'ticket_id');
    }

    public function ticket_multiple_settlements(){
        return $this->hasMany(ticket_multiple_settlement::class, 'ticket_id');
    }

    public function ticket_log_entries(){
        return $this->hasMany(ticket_log_entry::class, 'ticket_id');
    }
    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');

    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');

    }
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');

    }
	
	
    public function customer_type()
    {
        return $this->belongsTo(customer_type::class, 'customer_type_id');

    }
    public function market_segment()
    {
        return $this->belongsTo(market_segment::class, 'market_segment_id');

    }

    public function transaction_type()
    {
        return $this->belongsTo(transaction_type::class, 'transaction_type_id');

    }
	public function bank()
	{
		return $this->belongsTo(receiver_bank::class, 'receiver_bank_id');


	}


    public function current_group(){
        return $this->hasMany(group::class, 'id', 'group_id');
    }


    public function current_status(){
        return $this->hasMany(Status::class, 'id', 'status_id');
    }
	
	
	public function creator_group()
    {
        return $this->belongsTo(group::class, 'creator_group_id');

    }


}
