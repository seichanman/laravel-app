<?php

namespace App\Http\Controllers;
use App\Models\Folder;
use Illuminate\Http\Request;
use App\Http\Requests\CreateFolder;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    //
    public function index()
    {
        return view('folders/create');
    }
    public function create(CreateFolder $request)
    {
        // フォルダモデルのインスタンスを作成する
        $folder = new Folder();
        // タイトルに入力値を代入する
        $folder->title = $request->title;

        // ユーザーに紐づけて保存
        Auth::user()->folders()->save($folder);

        // インスタンスの状態をデータベースに書き込む
        $folder->save();

        return redirect()->route('tasks.index', [
            'id' => $folder->id,
        ]);
    }
}

/*

Object-Relational マッピング（ORM）
=アプリケーションからデータベースの操作をしやすくするためのプログラミング手法

Request =ブラウザを通してユーザーから送られる情報をすべて含んでいるオブジェクトのこと
参考
https://qiita.com/araoara/items/6f75a44f2d8297908779

モデルの永続化 = データベースに書き込む処理
1.モデルクラスのインスタンスを作成する。
2.インスタンスのプロパティに値を代入する。
3.save メソッドを呼び出す。

*/