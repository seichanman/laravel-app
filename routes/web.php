<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//トップ・フォルダー追加
Route::group(['prefix'=>'folders','middleware'=>'auth'],function(){
    Route::get('{id}/task', 'TaskController@index')->name('tasks.index');
    Route::get('create', 'FolderController@index')->name('folders.create');
    Route::post('create', 'FolderController@create');
    

    //タスク追加
    Route::group(['prefix'=>'{id}/tasks'],function(){
        Route::get('create', 'TaskController@showCreateForm')->name('tasks.create');
        Route::post('create', 'TaskController@create');

        Route::get('{task_id}/edit', 'TaskController@showEditForm')->name('tasks.edit');
        Route::post('{task_id}/edit', 'TaskController@edit');
    });
});



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

/*
route 関数
Route::get('アドレス','処理(関数など)')

name 
=アプリケーションの中で URL を参照する際にはこの名前を使用する
https://qiita.com/kazuhei/items/935257b0d72fa314d461

*/