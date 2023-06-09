<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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

        View::composer('hello.index', 'App\Http\Composers\HelloComposer');
    }
}
