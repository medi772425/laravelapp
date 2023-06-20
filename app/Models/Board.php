<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $guarded = array('id');

    public static $rules = [
        'person_id' => 'required',
        'title' => 'required',
        'message' => 'required'
    ];

    public function person()
    {
        // sqlを確認する方法
        // $userBuilder = $this->belongsTo(Person::class);
        // dd($userBuilder->toSql(), $userBuilder->getBindings());

        // NOTE BoardControllerのindexで、all()しているか、withを使っているかで、ここでSQL文を発行？しているかどうかが変わる。withの場合は、何もsqlが出力されない
        // \DB::enableQueryLog();      // sql 確認用
        // $this->belongsTo(Person::class);
        // dump(\DB::getQueryLog());      // sql 確認用

        return $this->belongsTo(Person::class);
    }

    public function getData()
    {
        // return $this->id . ":" . $this->title;
        return $this->id . ":" . $this->title . ' (' . $this->person->name . ')';
    }
}
