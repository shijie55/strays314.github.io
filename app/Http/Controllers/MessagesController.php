<?php

namespace App\Http\Controllers;

use App\Repositories\MessageRepository;
use App\Http\Requests\MessageRequest;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    protected $message;

    public function __construct(MessageRepository $messageRepository)
    {
        $this->message = $messageRepository;
    }

    public function store(MessageRequest $request)
    {
        $message = $this->message->create([
            'to_user_id'   => $request->get('user_id'),
            'from_user_id' => user('api')->id,
            'body'         => $request->get('body'),
            'dialog_id'    => user('api')->id . $request->get('user_id')
        ]);

        if ($message) {
            return response()->json(['status' => true]);
        }

        return response()->json(['status' => false]);
    }
}
