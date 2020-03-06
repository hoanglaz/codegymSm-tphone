<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class TagValidator.
 *
 * @package namespace App\Validators;
 */
class TagValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|max:56|min:3',
            'url' => 'required|max:120|min:3|unique:tags,url',
            'des' => 'required|max:255|min:3',
            'title' => 'required|max:255|min:3',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required|max:56|min:3',
//            'url' => 'required|max:120|min:3',
            'des' => 'required|max:255|min:3',
            'title' => 'required|max:255|min:3',
        ],
    ];
}
