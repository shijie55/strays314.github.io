<?php
namespace App\Mailer;

use App\User;

class PasswordResetMailer extends Mailer
{

    public function sendPasswordResetMail($token, $email, $name)
    {
        $data = [
            'url' => url('password/reset', [
                'token' => $token
            ]),
            'name' => $name
        ];

        $template = 'send_reset_password';

        $this->sendTo($template, $email, $data);
    }
}