<?php

namespace App\Repositories;

use App\Answer;

class AnswerRepository
{
    public function create(array $attribute)
    {
        $answer = Answer::create($attribute);

        // 为question表的answers_count字段加1
        $answer->question()->increment('answers_count');
        user()->increment('answers_count');

        return $answer;
    }

    /**
     * [getAnswerCommentById 获取回答对应的评论]
     * @param  [int] $id 
     * @return [mixed] $comments
     */
    public function getAnswerCommentById($id)
    {
    	$comments = Answer::with('comments', 'comments.user')->where('id', $id)->first();

    	return $comments;
    }
}