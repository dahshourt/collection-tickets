<?php

namespace App\Http\Requests\groups;

use Illuminate\Foundation\Http\FormRequest;

class updateRequest extends FormRequest
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
        return [
            'name' => 'required|unique:groups,name,'.$this->group->id,
            'group_email' => 'required|unique:groups,group_email,'.$this->group->id,
        ];
    }
}
