<?php

namespace App\Rules\tickets;
use App\Factories\Tickets\TicketsFactory;
use Illuminate\Contracts\Validation\Rule;

class check_right_group_create_ticket implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $model;

    public function __construct()
    {
         $this->model = TicketsFactory::index();
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
        $group_ids = $this->model->get_group_of_create_ticket();
        $ids = [];
        foreach($group_ids as $value)
        {
            $ids[] = $value->id;
        }
         //dd($values); 
        return in_array($values, $ids)   ;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please check the Right Group';
    }
}
