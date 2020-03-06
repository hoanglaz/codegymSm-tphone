<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class EnventValidator.
 *
 * @package namespace App\Validators;
 */
class EnventValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [

            'title' => 'required|max:255|min:10',
            'content' => 'required',
            'url' => 'required|unique:envents,url',
            'des' => 'required|max:255',
        ],
        ValidatorInterface::RULE_UPDATE => [

            'title' => 'required|max:255|min:10',
            'content' => 'required',
            'des' => 'required|max:255',
        ],
    ];
}
