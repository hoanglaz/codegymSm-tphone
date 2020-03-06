<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class PageValidator.
 *
 * @package namespace App\Validators;
 */
class PageValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'image' => 'required',
            'title' => 'required',
            'content' => 'required',
            'url' => 'required|unique:pages,url',
            'des' => 'required|max:255',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'image' => 'required',
            'title' => 'required',
            'content' => 'required',
            'url' => 'required',
            'des' => 'required|max:255',
        ],
    ];
}
