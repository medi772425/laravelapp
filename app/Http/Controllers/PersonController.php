<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    public function index()
    {
        $items = Person::all();
        return view('person.index', ["items" => $items]);
    }

    public function find()
    {
        return view('person.find', ['input' => '']);
    }

    public function search(Request $request)
    {
        // リスト6-10
        // $item = Person::where('name', $request->input)->first();

        // リスト6-12 スコープを使う Person.php の scopeNameEqualメソッドで定義したスコープ？を呼び出し
        // 先頭のscopeが呼び出し時は不要
        // 第一引数の$queryも不要
        // $item = Person::nameEqual($request->input)->first();

        // リスト6-14
        $min = $request->input;
        $max = $min + 10;
        $item = Person::ageGreaterThan($min)->ageLessThan($max)->first();

        return view('person.find', ['input' => $request->input, 'item' => $item]);
    }

    public function add(Request $request)
    {
        return view('person.add');
    }

    public function create(Request $request)
    {
        // バリデーション Personクラスの$rulesを使用する
        $this->validate($request, Person::$rules);

        $person = new Person;

        $form = $request->all();
        unset($form['_token']); // テーブルにはないフィールドなので、あらかじめ削除する
        $person->fill($form)->save();   // fill()で、モデルのプロパティに$formを代入している

        return redirect('/person');
    }

    public function edit(Request $request)
    {
        $person = Person::find($request->id);

        return view('person.edit', ['form' => $person]);
    }

    public function update(Request $request)
    {
        // $thisからvalidateメソッドを呼べるのは、コントローラークラスで、ValidatesRequestsをuseしているから
        $this->validate($request, Person::$rules);

        $person = Person::find($request->id);

        $form = $request->all();
        unset($form['_token']);

        $person->fill($form)->save();

        return redirect('/person');
    }

    public function delete(Request $request)
    {
        $person = Person::find($request->id);

        return view('person.del', ["form" => $person]);
    }

    public function remove(Request $request)
    {
        $person = Person::find($request->id);

        $person->delete();

        return redirect('person');
    }
}
