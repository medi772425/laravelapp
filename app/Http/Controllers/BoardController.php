<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;

class BoardController extends Controller
{
    // public function index()
    // {
    //     $items = Board::all();
    //     return view('board.index', ["items" => $items]);
    // }

    // リスト6-42
    public function index(Request $request)
    {
        // \DB::enableQueryLog();      // sql 確認用

        $items = Board::with('person')->get();;

        // dump(\DB::getQueryLog());      // sql 確認用

        return view('board.index', ["items" => $items]);
    }

    public function add(Request $request)
    {
        return view('board.add');
    }

    public function create(Request $request)
    {
        $this->validate($request, Board::$rules);

        $board = new Board;

        $form = $request->all();
        unset($form["_token"]);

        $board->fill($form)->save();

        return redirect()->route("board.index");
    }
}
