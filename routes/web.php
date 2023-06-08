<?php

use Illuminate\Support\Facades\Route;

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

Route::get('hello/{msg?}', function ($msg = "no massage") {

    $html = <<<EOF
    <html>
    <head>
    <title>Hello</title>
    <style>
    body {font-size:16pt; color:#999; }
    h1 { font-size:100pt; text-align:right; color:#eee;
       margin:-40px 0px -50px 0px; }
    </style>
    </head>
    <body>
       <h1>Hello</h1>
       <p>{$msg}</p>
       <p>これは、サンプルで作ったページです。</p>
    </body>
    </html>
    EOF;

    return $html;
});
