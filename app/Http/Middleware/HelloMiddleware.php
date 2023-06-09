<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HelloMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    // NOTE リスト4-2
    // NOTE コントローラでのアクション(コントローラで実行される関数)の前処理だけをミドルウェアで行う場合
    // public function handle(Request $request, Closure $next): Response
    // {
    //     $data = [
    //         ['name' => 'taro', 'mail' => 'taro@yamada'],
    //         ['name' => 'hanako', 'mail' => 'hanako@flower'],
    //         ['name' => 'sachiko', 'mail' => 'sachico@happy'],
    //     ];
    //     $request->merge(['data' => $data]);
    //     return $next($request);
    // }

    // NOTE リスト4-6
    // NOTE ミドルウェアでの後処理を行う場合
    // NOTE $nextには、コントーラのアクション HellowController の indexメソッドが入ってくると思われる
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $content = $response->content();

        $pattern = '/<middleware>(.*)<\/middleware>/i';
        $replace = '<a href="http://$1">$1</a>';
        $content = preg_replace($pattern, $replace, $content);

        $response->setContent($content);
        return $response;
    }
}
