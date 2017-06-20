<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topics';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public function questions()
    {
        // 多对多
        return $this->belongsToMany(Question::class, 'question_topic')->withTimestamps();
    }

}
