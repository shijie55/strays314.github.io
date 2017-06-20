<?php
namespace App\Mailer;

use Illuminate\Support\Facades\Auth;

class UserMailer extends Mailer
{

    public function sendfollowNotifyMail($email)
    {
        $data = [
            'url' => 'http://blog.org/user/notification',
            'name' => Auth::guard('api')->user()->name
        ];

        $template = 'send_user_follow_message';

        $this->sendTo($template, $email, $data);
    }
}