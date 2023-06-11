<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Myrule implements ValidationRule
{
    // TODO artisanコマンドで作成されなかったが、コンストラクタを追加した。問題ないか？
    private $num;
    public function __construct($n)
    {
        $this->num = $n;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value % $this->num !== 0) {
            $fail($this->num . 'で割り切れる値が必要です。');
        }
    }
}
