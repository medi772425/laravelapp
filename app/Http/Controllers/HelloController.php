<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

// リスト4-15
class HelloController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->id)) {
            $param = ['id' => $request->id];
            $items = DB::select('select* from people where id = :id', $param);  // パラメータ結合
        } else {
            $items = DB::select('select* from people');
        }

        return view('hello.index', ['items' => $items]);
    }

    public function post(Request $request)
    {
        $validate_rule = [
            'msg' => 'required',
        ];
        $this->validate($request, $validate_rule);
        $msg = $request->msg;
        $response = response()->view(
            'hello.index',
            ['msg' => '「' . $msg .
                '」をクッキーに保存しました。']
        );
        $response->cookie('msg', $msg, 100);
        return $response; // cookieメソッドで保存処理をしたresponseを返すことで、クライアント側にクッキーが保存される。
    }

    // リスト5-9
    public function add(Request $request)
    {
        return view('hello.add');
    }

    public function create(Request $request)
    {
        $param = [
            "name" => $request->name,
            "mail" => $request->mail,
            "age" => $request->age,
        ];

        DB::insert('insert into people (name, mail, age) values(:name, :mail, :age)', $param);

        // return redirect('/hello');
        return redirect()->route('hello.index');
    }

    public function edit(Request $request)
    {
        $param = ['id' => $request->id];

        $item = DB::select('select * from people where id = :id', $param);

        return view('hello.edit', ["form" => $item[0]]);
    }

    public function update(Request $request)
    {
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];

        DB::update('update people set name = :name, mail= :mail, age = :age where id = :id', $param);

        return redirect()->route('hello.index');
    }

    public function del(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from people where id = :id', $param);

        return view('hello.del', ['form' => $item[0]]);
    }

    public function remove(Request $request)
    {
        $param = ['id' => $request->id];

        DB::delete('delete from people where id = :id', $param);

        return redirect()->route('hello.index');
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

    // // リスト4-27
    // public function post(Request $request)
    // {
    //     $rules = [
    //         'name' => 'required',
    //         'mail' => 'email',
    //         'age' => 'numeric',
    //     ];
    //     $messages = [
    //         'name.required' => '名前は必ず入力して下さい。',
    //         'mail.email'  => 'メールアドレスが必要です。',
    //         'age.numeric' => '年齢は整数で記入下さい。',
    //         'age.min' => '年齢はゼロ歳以上で記入下さい。',
    //         'age.max' => '年齢は200歳以下で記入下さい。',
    //     ];

    //     // バリデータ(varidator) 独自のバリデーションの処理(リダイレクト以外の動きができる)
    //     $validator = Validator::make($request->all(), $rules, $messages);

    //     // 条件に応じて、ルールを追加できる
    //     // この場合、age が整数の場合、min,maxの条件を追加している
    //     $validator->sometimes('age', 'min:0', function ($input) {
    //         // falseの場合は条件を追加するので、整数の場合にfalseを返す

    //         // TODO ageのバリデーションをsometimesで追加されているか確認している
    //         \Log::debug("!input->age :" . $input->age);
    //         \Log::debug("!is_int(input->age) :" . !is_int($input->age));

    //         return is_int($input->age);
    //     });
    //     $validator->sometimes('age', 'max:200', function ($input) {
    //         return !is_int($input->age);
    //     });

    //     if ($validator->fails()) {
    //         return redirect('/hello')
    //             ->withErrors($validator)
    //             ->withInput();
    //     }
    //     return view('hello.index', ['msg' => '正しく入力されました！']);
    // }



    //    リスト4-31
    //     public function post(HelloRequest $request)
    //     {
    //         return view('hello.index', ['msg' => '正しく入力されました！']);
    //     }
}
