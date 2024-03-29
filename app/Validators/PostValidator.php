<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class PostValidator.
 *
 * @package namespace App\Validators;
 */
class PostValidator extends LaravelValidator
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
            'cate' => 'required',
            'url' => 'required|unique:posts,url',
            'des' => 'required|max:255',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'image' => 'required',
            'title' => 'required|max:255|min:10',
            'content' => 'required',
            'cate' => 'required',
//            'url' => 'required',
            'des' => 'required|max:255',
        ],
    ];
}
