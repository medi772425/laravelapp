<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Scopes\ScopePerson;

class Person extends Model
{
    // リスト6-19
    // 値がnullでもエラーを出さない。値を用意しておかない項目として設定
    protected $guarded = array('id');

    // バリデーションのルール
    public static $rules = array(
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer|min:0|max:150'
    );

    public function getData()
    {
        return $this->id . ': ' . $this->name . ' (' . $this->age . ')';
    }


    // // リレーション 1対1
    // public function board()
    // {
    //     // Boardクラスは、Personクラスと名前空間が同じなので呼び出せる(App\Model\Board と書かなくて良い)
    //     return $this->hasOne(Board::class);
    // }

    // リレーション 1対多(多はBoardクラスの方)
    public function boards()
    {

        // sqlを確認する方法
        // $userBuilder = $this->hasMany(Board::class);
        // dd($userBuilder->toSql(), $userBuilder->getBindings());

        return $this->hasMany(Board::class);
    }
}
