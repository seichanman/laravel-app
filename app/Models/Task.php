<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    /**
     * 状態定義
     */
    const STATUS = [
        1 => [ 'label' => '未着手', 'class' => 'pageBlock__table-label--danger' ],
        2 => [ 'label' => '着手中', 'class' => 'pageBlock__table-label--info' ],
        3 => [ 'label' => '完了', 'class' => '' ],
    ];
    /**
     * 状態のラベル
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        // 状態値
        $status = $this->attributes['status'];

        // 定義されていなければ空文字を返す
        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['label'];
    }
    /**	
    * 状態を表すHTMLクラス	
    * @return string	
    */	
    public function getStatusClassAttribute()	
    {	
        // 状態値	
        $status = $this->attributes['status'];
        // 定義されていなければ空文字を返す	
        if (!isset(self::STATUS[$status])) {	
        return '';	
        }	
        return self::STATUS[$status]['class'];	
    }

    /**	//
    * 整形した期限日	
    * @return string	
    */
    //
    public function getFormattedDueDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['due_date'])
        ->format('Y/m/d');
    }
}

/*
アクセサ
= モデルクラスが本来持つデータを加工した値を、さもモデルクラスのプロパティであるかのように参照できる Laravel の機能

記述法↓
get○○○Attribute

get○○○Attribute の ○○○ の部分が（擬似的な）プロパティになる。ただしアクセサメソッドはキャメルケース（文字の区切りが大文字）ですがプロパティとして参照するときはスネークケース（文字の区切りがアンダースコア）になる

*/