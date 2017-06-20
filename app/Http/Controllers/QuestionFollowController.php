<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\QuestionRepository;

class QuestionFollowController extends Controller
{
    protected $question;

    public function __construct(QuestionRepository $question)
    {
        $this->middleware('auth');
        $this->question = $question;
    }

    public function follow($question_id)
    {
        Auth::user()->followThis($question_id);

        return back();
    }

    public function follower($question_id)
    {
        $user = user('api');

        $followed = $user->followed($question_id);

        if ($followed) {
            return response()->json(['followed' => true]);
        }

        return response()->json(['followed' => false]);
    }

    public function followThisQuestion(Request $request)
    {
        // Auth::guard('api')->user();
        $user = user('api');
        $question = $this->question->byId($request->get('question_id'));
        $followed = $user->followThis($question->id);

        if (count($followed['detached']) > 0) {
            $question->decrement('followers_count');
            return response()->json(['followed' => false]);
        } else {
            $question->increment('followers_count');
            return response()->json(['followed' => true]);
        }
    }
}
