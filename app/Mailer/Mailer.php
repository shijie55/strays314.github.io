<?php
namespace App\Mailer;

use Illuminate\Support\Facades\Mail;
use Naux\Mail\SendCloudTemplate;

class Mailer
{
    public function sendTo($template, $email, array $data)
    {
        $template = new SendCloudTemplate($template, $data);

        Mail::raw($template, function($message) use ($email) {
            $message -> from('strays_php@163.com', 'HT');
            $message -> to($email);
        });
    }

}