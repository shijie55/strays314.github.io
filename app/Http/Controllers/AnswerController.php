<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnswerRequest;
use App\Repositories\AnswerRepository;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    protected $answerRepository;

    public function __construct(AnswerRepository $answerRepository)
    {
        $this->middleware('auth');
        $this->answerRepository = $answerRepository;
    }

    public function store(StoreAnswerRequest $request, $question_id)
    {
        $answer = $this->answerRepository->create([
            'question_id' => $question_id,
            'user_id'     => Auth::id(),
            'body'        => $request->input('body')
        ]);

        return back();
    }

}
