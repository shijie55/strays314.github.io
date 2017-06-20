<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public function user()
    {
        // 多对一
        // 多条回答可以对应一位用户，但一个回答不可能是多个用户创建的
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        // 多对一
        // 多条回答可以对应一个问题，但一个回答不能对应对个问题
        return $this->belongsTo(Question::class);
    }

    /**
     * 多态关联
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
