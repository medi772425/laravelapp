<?php

namespace App\Providers;

use App\Http\Validators\HelloValidator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator; // TODO どうやって動いているか、よくわからない. 必要か不明

class HelloServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // NOTE　無名関数を使用する場合
        // View::composer(
        //     'hello.index',
        //     function ($view) {
        //         // view_messageという変数を渡す
        //         $view->with('view_message', 'composer message!');
        //     }
        // );
        // リスト3-40
        // View::composer('hello.index', 'App\Http\Composers\HelloComposer');

        // TODO どうやって動いているか、よくわからない
        // リスト4-29
        $validator = $this->app['validator'];
        $validator->resolver(function ($translator, $data, $rules, $messages) {
            return new HelloValidator($translator, $data, $rules, $messages);
        });
    }
}
