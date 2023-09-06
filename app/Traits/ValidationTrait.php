<?php


namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

trait ValidationTrait
{
    use ResponseTrait;

    protected function failedValidation(Validator $validator)
    {
//        throw new ValidationException($validator, $validator->errors());
    }

}
