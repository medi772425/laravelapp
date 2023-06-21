<?php

use App\Http\Controllers\BoardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\PersonController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// test comment
// test comment2
// NOTE 直接無名関数に渡す場合 ?をつければ任意パラメータ。なければ必須パラメータ。 引数の$msgはパラメータ名と同じでなくても良い
// Route::get('hello/{msg?}', function ($msg = "no massage") {

//     $html = <<<EOF
//     <html>
//     <head>
//     <title>Hello</title>
//     <style>
//     body {font-size:16pt; color:#999; }
//     h1 { font-size:100pt; text-align:right; color:#eee;
//        margin:-40px 0px -50px 0px; }
//     </style>
//     </head>
//     <body>
//        <h1>Hello</h1>
//        <p>{$msg}</p>
//        <p>これは、サンプルで作ったページです。</p>
//     </body>
//     </html>
//     EOF;

//     return $html;
// });

// Route::get('hello/{id?}/{pass?}', [HelloController::class, 'index']);

// Route::get('hello/', [HelloController::class, 'index']);
// Route::get('hello/other', [HelloController::class, 'other']);

// NOTE リスト2-14
// NOTE シングルアクションコントローラー 第二引数は配列ではない。また、メソッド名を指定しない。__invokeメソッドが呼び出される。Laravelの機能ではなく,PHPのマジックメソッド
// Route::get('hello', HelloController::class);

// NOTE リスト2-16
Route::get('hello', [HelloController::class, 'index'])->name('hello.index');

// NOTE リスト3-16
Route::post('hello', [HelloController::class, 'post']);

// NOTE リスト4-3 テキストとは、Laravel のバージョンが違う、かつ呼び出し方法を登録した名前にしている. middleware('hello');ではなく、middleware(HelloMiddleware::class) などの場合は、kernel.phpに登録しなくても良いっぽい
// Route::get('hello', [HelloController::class, 'index'])->middleware('hello');
// NOTE リスト4-10
// Route::get('hello', [HelloController::class, 'index']);
// NOTE リスト4-13
// Route::get('hello', [HelloController::class, 'index'])->middleware('hello');

// リスト5-10
Route::get('hello/add', [HelloController::class, 'add']);
Route::post('hello/add', [HelloController::class, 'create']);

Route::get('hello/edit', [HelloController::class, 'edit']);
Route::post('hello/edit', [HelloController::class, 'update']);

Route::get('hello/del', [HelloController::class, 'del']);
Route::post('hello/del', [HelloController::class, 'remove']);

// リスト6-4
Route::get('person', [PersonController::class, 'index']);

// リスト6-9
Route::get('person/find', [PersonController::class, 'find']);
Route::post('person/find', [PersonController::class, 'search']);

// リスト6-21
Route::get('person/add', [PersonController::class, 'add']);
Route::post('person/add', [PersonController::class, 'create']);

// リスト6-24
Route::get('person/edit', [PersonController::class, 'edit']);
Route::post('person/edit', [PersonController::class, 'update']);

// リスト6-27
Route::get('person/del', [PersonController::class, 'delete']);
Route::post('person/del', [PersonController::class, 'remove']);

// リスト6-34
Route::get('board', [BoardController::class, 'index'])->name('board.index');
Route::get('board/add', [BoardController::class, 'add']);
Route::post('board/add', [BoardController::class, 'create']);
