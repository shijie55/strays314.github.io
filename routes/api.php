<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/topics', 'TopicController@index')->middleware('api');
/**
 * 关注问题的vue组件请求
 */
Route::get('/question/{question_id}/follower', 'QuestionFollowController@follower')->middleware('auth:api');

Route::post('/question/follow', 'QuestionFollowController@followThisQuestion')->middleware('auth:api');

/**
 * 关注用户
 */
Route::get('/user/{user_id}/follower', 'UserFollowController@index')->middleware('auth:api');

Route::post('/user/follow', 'UserFollowController@follow')->middleware('auth:api');

/**
 * 点赞
 */
Route::get('/user/{answer_id}/vote', 'VotesController@voted')->middleware('api');

Route::post('user/vote', 'VotesController@vote')->middleware('auth:api');

/**
 * 发送私信
 */
Route::post('/user/message', 'MessagesController@store')->middleware('auth:api');

/**
 * 评论
 */
Route::get('/answer/{id}/comment', 'CommentsController@answer')->middleware('api');
Route::get('/question/{id}/comment', 'CommentsController@question')->middleware('api');
Route::post('/comment/store', 'CommentsController@store')->middleware('auth:api');
