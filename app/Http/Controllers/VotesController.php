<?php

namespace App\Http\Controllers;

use App\Repositories\VoteRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VotesController extends Controller
{
    protected $vote;

    public function __construct(VoteRepository $voteRepository)
    {
        $this->vote = $voteRepository;
    }

    public function voted($answer_id)
    {
        $user = user('api');

        $voted = $user->votedAnswer($answer_id);

        if ($voted) {
            return response()->json(['voted' => true]);
        }

        return response()->json(['voted' => false]);
    }

    public function vote(Request $request)
    {
        // 当前登录的用户
        $vote_user = user('api');

        // 被关注的用户
        $voted_answer = $this->vote->byId($request->get('answer_id'));

        return $this->vote->voteThisAnswer($vote_user, $voted_answer);
    }
}
