<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleUpdateRequest extends FormRequest
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
            'slug' => ['required',Rule::unique('roles')->ignore($this->slug,'slug')],
            'name' => ['required',Rule::unique('roles')->ignore($this->name,'name')],
//            'slug' => 'required|unique:roles,slug',
        ];
    }
}
