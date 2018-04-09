<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        if($this->method()  == "POST"){
            $rules = [
                'name' => 'required',
                'image_name' => 'required|image',
            ];
        }
        elseif($this->method()  == "PUT"){
            $rules = [
                'name' => 'required',
                'image_name' => 'image',
            ];   
        }

        return $rules;

    }

    public function messages()
    {
        return [
            'image_name.required'  => 'Image is required !',
            'image_name.image'     => 'Image must have valid image format !',
        ];
    }
}