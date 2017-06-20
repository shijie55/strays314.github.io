<?php
namespace App\Repositories;

use App\Answer;
use App\User;

class VoteRepository
{

    public function byId($answer_id)
    {
        return Answer::find($answer_id);
    }

    public function voteThisAnswer(User $vote_user, Answer $voted_answer)
    {
        $followed = $vote_user->voteForThis($voted_answer->id);

        if (count($followed['detached']) > 0) {

            $voted_answer->decrement('votes_count');
            return response()->json(['voted' => false]);

        } else {

            $voted_answer->increment('votes_count');
            return response()->json(['voted' => true]);

        }
    }
}