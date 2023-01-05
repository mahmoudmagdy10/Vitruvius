<?php

namespace Vitruvius\Customer\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name' => 'required|min:3|unique:customers,name|unique:contractors,name',
            'email' => 'required|unique:customers,email|unique:contractors,email',
            'password' => 'required|min:9',
            'address' => 'required',
            'phone' => 'required',
            'national_id' => 'required|min:14|max:14|unique:customers,national_id',
        ];
    }
}
