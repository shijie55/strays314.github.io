<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public function topics()
    {
        // 多对多
        // 一个问题可以关联多个话题，一个话题也可以有多个问题
        return $this->belongsToMany(Topic::class, 'question_topic')->withTimestamps();
    }

    public function followers()
    {
        // 多对多
        // 一个问题可以有多位关注者，一个用户也可以关注多个问题
        return $this->belongsToMany(User::class, 'user_question')->withTimestamps();
    }

    public function user()
    {
        // 多对一
        // 多个问题可以由一位用户创建，但一个问题不会由多个用户发布
        return $this->belongsTo(User::class);
    }

    public function answers()
    {
        // 一对多
        // 一个问题可以有多条回答，但一个回答不可能对应多个问题
        return $this->hasMany(Answer::class);
    }

    /**
     * is_hidden属性为F的时候显示问题
     *
     * @param $query
     * @return mixed
     */
    public function scopePublished($query)
    {
        return $query->where('is_hidden', 'F');
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
