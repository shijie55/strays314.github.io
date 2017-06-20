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
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'QuestionController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// 验证邮箱
Route::get('/email/verify/{token}', [
    'as' => 'email.verify',
    'uses' => 'EmailController@verify'
]);

// 问题控制器
Route::resource('/questions', 'QuestionController', ['parameter'=>[
    'questions' => 'id'
]]);

// 答案控制器
Route::post('/questions/{question_id}/answer', 'AnswerController@store');

Route::get('/user/notification', 'NotificationController@index');
Route::get('/user/notification/{notification_id}', 'NotificationController@show');

// 查看私信列表
Route::get('/user/box', 'BoxController@index');
Route::get('/user/box/list/{dialog_id}', 'BoxController@show');
Route::post('/user/box/{dialog_id}/store', 'BoxController@store');

// 用户个人信息设置
Route::get('/user/self', 'UserController@index');
Route::get('/user/avatar', 'UserController@avatar');
Route::post('/user/avatar/change', 'UserController@changeAvatar');
Route::get('/user/setting', 'UserController@setting');
Route::post('/user/setting/update', 'UserController@settingsUpdate');

// 用户密码修改
Route::get('/user/password', 'UserController@password');
Route::post('/user/password/update', 'UserController@updatePassword');


