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
        $item = Person::where('name', $request->input)->first();

        return view('person.find', ['input' => $request->input, 'item' => $item]);
    }
}
