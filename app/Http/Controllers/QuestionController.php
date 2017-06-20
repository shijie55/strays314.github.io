<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Follow;
use App\Http\Requests\StoreQuestionRequest;
use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    protected $questionRepository;

    public function __construct(QuestionRepository $questionRepository)
    {
        $this->middleware('auth')->except('index', 'show');
        $this->questionRepository = $questionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = $this->questionRepository->getQuestionFeed();

        return view('question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreQuestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionRequest $request)
    {
        $topics = $this->questionRepository->normalizeTopic($request->input('topics'));

        $data = [
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'user_id' => Auth::id()
        ];

        $question = $this->questionRepository->create($data);
        $question->topics()->attach($topics);

        return redirect()->route('questions.show', ['id'=>$question->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 获取该用户全部问题（以及该问题对应的话题和回答）
        $question = $this->questionRepository->byIdWithTopicsAndAnswers($id);

        return view('question.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = $this->questionRepository->byId($id);

        if (Auth::user()->owns($question)) {
            return view('question.edit', compact('question'));
        }

        return back();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreQuestionRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreQuestionRequest $request, $id)
    {
        $question = $this->questionRepository->byId($id);
        $topics = $this->questionRepository->normalizeTopic($request->input('topics'));

        $question->update([
            'title' => $request->input('title'),
            'body'  => $request->input('body'),
        ]);

        $question->topics()->sync($topics);

        return redirect()->route('questions.show', ['id'=>$question->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = $this->questionRepository->byId($id);

        if (Auth::user()->owns($question)) {
            $question->delete();
            Answer::where('question_id', '=', $question->id)->delete();
            Follow::where('question_id', '=', $question->id)->delete();

            return redirect('/');
        }

        abort('403', 'forbidden');
    }

}
