<?php
namespace App\Repositories;

use App\Message;
Use App\Notifications\NewMessageNotification;

class MessageRepository
{
    public function create(array $data)
    {
        $message = Message::create($data);

        // 创建完成之后通知消息的接收者
        $message->toUser->notify(new NewMessageNotification($message));

        return $message;
    }

    public function getAllMessageBy($user_id)
    {
        return Message::where('from_user_id', $user_id)
            ->orWhere('to_user_id', $user_id)
            ->with(['fromUser' => function($query) {
                return $query->select(['id', 'name', 'avatar']);
            }, 'toUser' => function($query) {
                return $query->select(['id', 'name', 'avatar']);
            }])
            ->orderBy('id', 'desc')->get();
    }

    public function getDialogMessageBy($dialog_id)
    {
        return Message::where('dialog_id', $dialog_id)
            ->with(['fromUser' => function($query) {
                return $query->select(['id', 'name', 'avatar']);
            }, 'toUser' => function($query) {
                return $query->select(['id', 'name', 'avatar']);
            }])
            ->orderBy('id', 'desc')->get();
    }

    public function getSingleDialogMessageBy($dialog_id)
    {
        return Message::where('dialog_id', $dialog_id)->first();
    }
}