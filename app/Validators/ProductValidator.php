<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ProductValidator.
 *
 * @package namespace App\Validators;
 */
class ProductValidator extends LaravelValidator
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
            'url' => 'required|unique:products,url',
            'des' => 'required|max:255',
            'price_pre' =>'required',
            'price' =>'required',
            'deal' =>'required',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'image' => 'required',
            'title' => 'required',
            'content' => 'required',
//            'url' => 'required',
            'des' => 'required|max:255',
            'price_pre' =>'required',
        ],
    ];
}
