<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    //
    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }
}

/*
hasMany(モデル名（名前空間も含む）,関連するテーブルが持つ外部キーカラム名,外部キーに紐づけられたカラムの名前) =
https://www.sejuku.net/blog/63335
*/


