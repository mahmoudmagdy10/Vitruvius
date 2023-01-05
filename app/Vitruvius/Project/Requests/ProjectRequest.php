<?php

namespace Vitruvius\Project\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'arch' => "in:Italian,UK,American,spanish,german",
            'three' => 'mimes:png,jpge,jpg',
            'two' => 'required|mimes:png,jpge,jpg',
            'csv' => "required",
        ];
    }
}
