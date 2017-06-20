<?php

namespace App\Http\Controllers;

use App\Repositories\TopicRepository;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    protected $topic;

    public function __construct(TopicRepository $topic)
    {
        $this->topic = $topic;
    }

    public function index(Request $request)
    {
        $topics = $this->topic->getTopics($request);

        return $topics;
    }
}
