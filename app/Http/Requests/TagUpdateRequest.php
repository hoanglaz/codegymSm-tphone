<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TagUpdateRequest extends FormRequest
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
//            'url' => ['required', Rule::unique('tags')->ignore($this->id,'url')]
//            'url' => 'required|unique:tags,url,'.$this->id
            'url' => ['required', Rule::unique('tags')->ignore($this->url,'url')]
        ];
    }
}
