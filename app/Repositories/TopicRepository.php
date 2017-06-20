<?php

namespace App\Repositories;

use App\Topic;
use Illuminate\Http\Request;

class TopicRepository
{
    public function getTopics(Request $request)
    {
        $topics = Topic::select('id', 'name')
            ->where('name', 'like', '%'.$request->query('q').'%')
            ->orderBy('id')
            ->get();

        return $topics;
    }

}