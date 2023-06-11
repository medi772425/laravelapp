<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Illuminate\Support\Facades\Validator;

// リスト4-15
class HelloController extends Controller
{

    public function index(Request $request)
    {
        // リスト4-25 urlのgetパラメータに、idとpassがあるか必須チェックしている
        // この場合第一引数には、クエリ(urlのgetパラメータ)の連想配列が入っている。連想配列なら、別のものでも問題ない
        $validator = Validator::make($request->query(), [
            'id' => 'required',
            'pass' => 'required',
        ]);

        if ($validator->fails()) {
            $msg = 'クエリーに問題があります';
        } else {
            $msg = 'ID/PASSを受け付けました。フォームを入力ください';
        }

        return view('hello.index', ['msg' => $msg]);
    }


    // public function post(Request $request)
    // {
    //     $validate_rule = [
    //         'name' => 'required|alpha|between:4,10',
    //         'mail' => 'email',
    //         'age' => 'numeric|between:0,150',
    //     ];
    //     $this->validate($request, $validate_rule);
    //     return view('hello.index', ['msg' => '正しく入力されました！']);
    // }

    // リスト4-22
    public function post(Request $request)
    {
        // リスト4-24 バリデータ(varidator) 独自のバリデーションの処理(リダイレクト以外の動きができる)
        // リスト4-27
        $rules = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ];

        $messages = [
            'name.required' => '名前は必ず入力して下さい!!!',
            'mail.email'  => 'メールアドレスが必要です。',
            'age.numeric' => '年齢を整数で記入下さい。',
            'age.between' => '年齢は０～150の間で入力下さい。',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            // バリデーションチェックに失敗した場合
            return redirect('/hello')
                ->withErrors($validator)    // エラーメッセージも一緒にridirect
                ->withInput();              // フォームの入力情報も一緒にridirect
        }

        return view('hello.index', ['msg' => '正しく入力されました！']);
    }
}
