<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HelloRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // リスト4-21
        if ($this->path() ==  'hello') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        // リスト4-21
        return [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ];
    }

    // NOTE リスト4-23
    // NOTE FormRequestのmessagesメソッドをオーバーライドしている
    public function messages()
    {
        return [
            'name.required' => '名前は必ず入力して下さい。',
            'mail.email'  => 'メールアドレスが必要です。',
            'age.numeric' => '年齢を整数で記入下さい。',
            'age.between' => '年齢は０～150の間で入力下さい。',
        ];
    }
}
