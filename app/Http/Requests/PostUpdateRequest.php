<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostUpdateRequest extends FormRequest
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
//            'url' => ['required', 'unique:posts,url,'.$this->id]
//            'url' => 'required|unique:posts,url,'.$this->id
            'url' => ['required', Rule::unique('posts')->ignore($this->url,'url')]

        ];
    }
}
