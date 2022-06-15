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
            'accounts' => 'required|numeric',
            'customer_name' => 'required|string',
            'cheque_number' =>  $cheque_number_rules,
            'group' => ['required', 'numeric'],
            'customer_type' => 'required|numeric',
            'market_segment' => 'required|numeric',
            'status' => ['required', 'numeric'],
            'transaction_type' => 'required|numeric',
            'transaction_amount' => 'required|numeric',
            'reciver_banck' => 'required|numeric',
            'banck_transaction_date' => 'required|date',
            'file_input.*' => 'mimes:png,pdf,docx'
        ];
    }
}
