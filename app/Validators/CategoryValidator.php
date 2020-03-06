<?php

namespace App\Validators;

use App\Role;
use GuzzleHttp\Psr7\Request;
use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;
use Illuminate\Validation\Rule;

/**
 * Class CategoryValidator.
 *
 * @package namespace App\Validators;
 */
class CategoryValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|max:200|min:3',
            'title' => 'required|max:255|min:3',
            'url' => 'required|unique:categories,url|max:156|min:3',
            'des' => 'required|max:255|min:3',
        ],[
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|max:40|min:3',
            'title' => 'required|max:255|min:3',
//            "url" => [
//                'required',
//                Rule::unique('users')->ignore($user->id),
//            ],
//            'url' => ['required', Rule::unique('users')->ignore($user->id),],
            'des' => 'required|max:255|min:3',
        ],
    ];
}
