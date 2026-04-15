<?php

namespace App\Http\Requests\tickets;

use Illuminate\Foundation\Http\FormRequest;

class update_tickets extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /** 
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $cheque_number_rules= '';
        if(request()->input("transaction_type") == 3 ){
            $cheque_number_rules = "required|numeric";
        }
		return [
				'group_id' => ['required', 'numeric'],
				'status_id' => ['required', 'numeric'],
				'rejection_reason_id'=> 'required_if:status_id,==,4',
				'rejection_reason_comment'=> 'required_if:rejection_reason_id,==,4',
			];
		/* if(request()->status_id == 4)
		{
			return [
				'account' => 'required|numeric',
				'customer_name' => 'required|string',
				'cheque_number' =>  $cheque_number_rules,
				'group_id' => ['required', 'numeric'],
				'customer_type_id' => 'required|numeric',
				'market_segment_id' => 'required|numeric',
				'status_id' => ['required', 'numeric'],
				'transaction_type_id' => 'required|numeric',
				'transaction_amount' => 'required|numeric',
				'receiver_bank_id' => 'required|numeric',
				'bank_transaction_date' => 'required|date',
				'file_input.*' => 'mimes:png,pdf,docx',
			
			]; 
			
			return [
				'group_id' => ['required', 'numeric'],
				'status_id' => ['required', 'numeric'],
			];
		}
		else
		{
			return [
				'group_id' => ['required', 'numeric'],
				'status_id' => ['required', 'numeric'],
			];
		} */
        
    }
}
