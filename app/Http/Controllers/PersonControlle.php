<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PersonControlle extends Controller
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
}
