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

        return $this->belongsTo(Person::class);
    }

    public function getData()
    {
        // return $this->id . ":" . $this->title;
        return $this->id . ":" . $this->title . ' (' . $this->person->name . ')';
    }
}
