<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function toUser()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }

    /**
     * 标记对话下的所有记录为已读
     */
    public function markHasRead()
    {
        if(is_null($this->read_at) || $this->has_read == 'F') {
            $this->forceFill(['has_read' => 'T', 'read_at' => $this->freshTimestamp()])->save();
        }
    }

    public function newCollection(array $model = [])
    {
        return new \App\Collections\MessageCollection($model);
    }

    public function read()
    {
        return $this->has_read === 'T';
    }

    public function unRead()
    {
        return $this->has_read === 'F';
    }

    public function shouldAddRead()
    {
        // 如果发送私信的用户是当前登录的用户，则返回，不添加未读样式
        if (user()->id === $this->from_user_id) return false;

        return $this->unRead();
    }
}
