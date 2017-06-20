<?php

namespace App\Collections;

use Illuminate\Database\Eloquent\Collection;

class MessageCollection extends Collection
{
    public function markHasRead()
    {
        $this->each(function($message) {
            if($message->to_user_id === user()->id) $message->markHasRead();
        });
    }
}