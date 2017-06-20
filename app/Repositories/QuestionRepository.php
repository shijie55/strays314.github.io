<?php

namespace App\Repositories;

use App\Question;
use App\Topic;
use App\User;
use Illuminate\Support\Facades\Auth;

class QuestionRepository
{
    /**
     * 获取ID对应的问题并查找到该问题的关联话题
     *
     * @param $id
     * @return object
     */
    public function byIdWithTopicsAndAnswers($id)
    {
        return Question::with(['topics', 'answers'])->find($id);
    }

    /**
     * 获取全部问题（未被隐藏）
     *
     * @return mixed
     */
    public function getQuestionFeed()
    {
        return Question::published()->orderBy('created_at')->with('user')->get();
    }

    /**
     * 创建问题
     *
     * @param array $attribute
     * @return mixed
     */
    public function create(array $attribute)
    {
        $question = Question::create($attribute);

        if ($question !== null) {
            // 创建问题成功
            // 用户本人关注该问题
            // 该问题的关注者加一（用户本人）
            // 用户发表的问题统计加一
            user()->followThis($question->id);
            $question->increment('followers_count');
            user()->increment('questions_count');
        }

        return $question;
    }

    /**
     * 处理用户选择或者创建的话题
     *
     * @param array $topics
     * @return array
     */
    public function normalizeTopic(array $topics)
    {
        $newTopics = collect($topics)->map(function ($topic) {
            // 已经存在的话题
            if (is_numeric($topic)) {
                Topic::find((int) $topic)->increment('questions_count');
                return (int) $topic;
            }
            // 未存在的话题，创建新话题
            $newTopic = Topic::create(['name'=>$topic, 'questions_count'=>1]);
            return $newTopic->id;

        })->toArray();

        return $newTopics;
    }

    /**
     * 查找ID对应的问题
     *
     * @param $id
     * @return mixed
     */
    public function byId($id)
    {
        return Question::find($id);
    }

    /**
     * [getQuestionCommentById 获取问题对应的评论]
     * @param  [int] $id 
     * @return [mixed] $comments     
     */
    public function getQuestionCommentById($id)
    {
        $comments = Question::with('comments', 'comments.user')->where('id', $id)->first();

        return $comments;
    }
}