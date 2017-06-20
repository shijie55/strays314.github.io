<?php
namespace App\Http\Controllers;

use App\Http\Requests\CommentsRequest;
use App\Repositories\AnswerRepository;
use App\Repositories\QuestionRepository;
use App\Repositories\CommentRepository;

class CommentsController extends Controller
{
    protected $answer;
    protected $question;
    protected $comment;

    public function __construct(AnswerRepository $answer, QuestionRepository $question, CommentRepository $comment)
    {
        $this->answer = $answer;
        $this->question = $question;
        $this->comment = $comment;
    }

    public function answer($id)
    {
        
        $comments = $this->answer->getAnswerCommentById($id);

        return $comments;
    }

    public function question($id)
    {
        $comments = $this->question->getQuestionCommentById($id);

        return $comments;
    }

    public function store(CommentsRequest $request)
    {
        $model = $this->getTypeFrom($request->get('type'));

        $attribute = [
            'user_id'          => user('api')->id,
            'body'             => $request->get('body'),
            'commentable_id'   => $request->get('model'),
            'commentable_type' => $model
        ];

        $comments = $this->comment->create($attribute, $request);

        return $comments;
    }

    public function getTypeFrom($type)
    {
        return $type=='question' ? 'App\Question' : 'App\Answer';
    }
}
