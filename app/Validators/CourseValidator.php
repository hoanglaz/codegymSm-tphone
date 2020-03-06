<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class CourseValidator.
 *
 * @package namespace App\Validators;
 */
class CourseValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'image' => 'required',

            'title' => 'required|max:255|min:10',
            'content' => 'required',
            'url' => 'required|unique:courses,url',
            'des' => 'required|max:255',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'image' => 'required',

            'title' => 'required|max:255|min:10',
            'content' => 'required',

            'des' => 'required|max:255',
        ],
    ];
}
