<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Person extends Model
{
    use HasFactory; // TODO これなに？


    protected static function boot()
    {
        // 親のbootメソッドを実行
        parent::boot();

        // NOTEここのstatic:: の意味は、実行されるときのクラスを指しているらしい。グローバルスコープを設定するので、このクラスのグローバル的な感じか？
        // NOTE Builderは、エロクアントのwhereを使うためのものっぽい
        // ageの値が20以上の場合
        static::addGlobalScope('age', function (Builder $builder) {
            $builder->where('age', '>=', 20);
        });
    }

    public function getData()
    {
        return $this->id . ': ' . $this->name . ' (' . $this->age . ')';
    }

    public function scopeNameEqual($query, $str)
    {
        return $query->where('name', $str);
    }

    public function scopeAgeGreaterThan($query, $n)
    {
        return $query->where('age', '>=', $n);
    }

    public function scopeAgeLessThan($query, $n)
    {
        return $query->where('age', '<=', $n);
    }
}
