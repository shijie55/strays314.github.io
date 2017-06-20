<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Notifications\NewMessageNotification;
use App\Repositories\MessageRepository;

class BoxController extends Controller
{
    protected $message;

    public function __construct(MessageRepository $message)
    {
        $this->middleware('auth');
        $this->message = $message;
    }

    /**
     * 展示所有登录用户的私信会话入口
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user_id = user()->id;
        $messages = $this->message->getAllMessageBy($user_id);

        return view('box.box', ['messages' => $messages->groupBy('dialog_id')]);
    }

    /**
     * 展示单个会话的所有会话内容
     *
     * @param $dialog_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($dialog_id)
    {
        // 倒序查找该对话下所有消息
        $messages = $this->message->getDialogMessageBy($dialog_id);

        // collection调用
        $messages->markHasRead();

        return view('box.show', compact('messages'));
    }

    /**
     * 创建新的私信
     *
     * @param MessageRequest $request
     * @param $dialog_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MessageRequest $request, $dialog_id)
    {
        // 找到对应的对话
        $dialog = $this->message->getSingleDialogMessageBy($dialog_id);

        // 创建新的回复
        $to_user_id = $dialog->from_user_id==user()->id ? $dialog->to_user_id : $dialog->from_user_id;

        $newMessage = $this->message->create([
            'from_user_id' => user()->id,
            'to_user_id' => $to_user_id,
            'body' => $request->input('body'),
            'dialog_id' => $dialog->dialog_id
        ]);

        // 创建完成之后通知消息的接收者
        $newMessage->toUser->notify(new NewMessageNotification($newMessage));

        return back();
    }
}
