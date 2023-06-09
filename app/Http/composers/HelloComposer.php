<?php

namespace App\Http\Composers;

use Illuminate\View\View;

class HelloComposer
{
    // ビューコンポーザーから呼び出される。composeメソッドは、ルールで名前が決まっているみたい
    public function compose(View $view)
    {
        $view->with('view_message', 'this view is "'
            . $view->getName() . '"!!');
    }
}
