<?php

namespace App\Rules\tickets;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;

class check_aggregate_of_transaction_amount implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $values)
    {
     
        

        $transaction_amount = request()->input("transaction_amount");
        $aggregate = 0;
        foreach((array) $values as $value)
        {
            $aggregate =  $aggregate + $value ;
        } 
        
         if($aggregate  > $transaction_amount ) 
         {
             return false;
         }elseif($aggregate  < $transaction_amount)
         {
             return false;
         }elseif($aggregate  = $transaction_amount)
         {
             return true;
         }
          
   
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please check The Aggregate Settlement Must equal The Transaction Amount.';
    }
}
