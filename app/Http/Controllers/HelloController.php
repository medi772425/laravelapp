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

    // リスト4-27
    public function post(Request $request)
    {
        $rules = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric',
        ];
        $messages = [
            'name.required' => '名前は必ず入力して下さい。',
            'mail.email'  => 'メールアドレスが必要です。',
            'age.numeric' => '年齢は整数で記入下さい。',
            'age.min' => '年齢はゼロ歳以上で記入下さい。',
            'age.max' => '年齢は200歳以下で記入下さい。',
        ];

        // バリデータ(varidator) 独自のバリデーションの処理(リダイレクト以外の動きができる)
        $validator = Validator::make($request->all(), $rules, $messages);

        // 条件に応じて、ルールを追加できる
        // この場合、age が整数の場合、min,maxの条件を追加している
        $validator->sometimes('age', 'min:0', function ($input) {
            // falseの場合は条件を追加するので、整数の場合にfalseを返す
            return !is_int($input->age);
        });
        $validator->sometimes('age', 'max:200', function ($input) {
            return !is_int($input->age);
        });

        if ($validator->fails()) {
            return redirect('/hello')
                ->withErrors($validator)
                ->withInput();
        }
        return view('hello.index', ['msg' => '正しく入力されました！']);
    }
}
