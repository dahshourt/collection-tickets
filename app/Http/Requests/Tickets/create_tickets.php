<?php

namespace App\Http\Requests\Tickets;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\tickets\check_right_group_create_ticket;
use App\Rules\tickets\check_right_status_create_ticket;
use App\Rules\tickets\check_aggregate_of_transaction_amount;

class create_tickets extends FormRequest
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
            'account' => 'required|alpha_num',
            'customer_name' => 'required|string',
            'cheque_number' =>  $cheque_number_rules,
            //'group_id' => ['required', 'numeric', new check_right_group_create_ticket],
			'group_id' => ['required', 'numeric'],
            'customer_type_id' => 'required|numeric',
            'market_segment_id' => 'required|numeric',
            //'status_id' => ['required', 'numeric', new check_right_status_create_ticket],
			'status_id' => ['required', 'numeric'],
            'transaction_type_id' => 'required|numeric',
            'transaction_amount' => 'required|between:0,99.99',
            'receiver_bank_id' => 'required|numeric',
            'bank_transaction_date' => 'required|date',
            'file_input.*' => 'mimes:png,pdf,docx,doc,xlsx,xls,csv,txt'
        ];
    }
}
