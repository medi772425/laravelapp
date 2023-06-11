<?php

namespace App\Http\Validators;

use Illuminate\Validation\Validator;

class HelloValidator extends Validator
{
    // validateHelloというメソッド名にすることで、hello という名前のルールが定義できる
    public function validateHello($attribute, $value, $parameters)
    {
        return $value % 2 == 0;
    }
}
