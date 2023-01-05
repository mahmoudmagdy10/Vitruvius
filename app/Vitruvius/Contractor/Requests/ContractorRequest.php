<?php

namespace Vitruvius\Contractor\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractorRequest extends FormRequest
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
            'name' => 'required|min:3|unique:contractors,name|unique:customers,name',
            'email' => 'required|unique:contractors,email|unique:customers,email',
            'password' => 'required|min:9',
            'address' => 'required',
            'phone' => 'required',
            'tax_record' => 'required|unique:contractors,tax_record',
        ];
    }

    public function messages()
    {
        return [
            'address.required'     => __('address required'),
            'name.required'        => __('name required'),
            'name.max'             => __('max num of string is 20 chars'),
            'phone.required'       => __('phone required'),
            'password.required'    => __('password required'),
            'password_confirmation.required'    => __('password confirmation required'),
            'password_confirmation.same'    => __('password confirmation not as Password'),

        ];
    }
}
