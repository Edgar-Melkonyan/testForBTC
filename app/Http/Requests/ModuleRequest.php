<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ModuleRequest extends FormRequest
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
        $rules = [
            'modules' => 'required',
        ];

        if(!empty($this->modules) && in_array('User picked' ,$this->modules)){
           $rules = [
            'products'  => 'required',
            ];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'modules.required'   => 'At least one Module must be checked !',
            'products.required'  => 'At least one Product must be checked !',
        ];
    }
}