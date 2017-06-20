<?php
namespace App\Mailer;

use App\User;

class RegisterMailer extends Mailer
{

    public function sendRegisterActiveMail(User $user)
    {
        $data = [
            'url' => route('email.verify', [
                'token' => $user->confirmation_token,
            ]),
            'name' => $user->name
        ];

        $template = 'send_register_active';

        $this->sendTo($template, $user->email, $data);
    }
}