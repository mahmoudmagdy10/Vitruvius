<?php

namespace Vitruvius\User\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|min:3|unique:users,name',
            // 'email' => 'required|unique:users,email|unique:users,email',
            'password' => 'required|min:9',
            'address' => 'required',
            'phone' => 'required',
            'national_id' => 'min:14|max:14',
            'tax_record' => 'min:14|max:14',
        ];
    }
}
