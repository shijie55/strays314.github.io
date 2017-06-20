@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach ($questions as $question)
                <div class="media">
                    <div class="media-left avatar-body">
                        <a href="">
                            <img class="avatar-img" src="{{ $question->user->avatar }}" alt="{{ $question->user->name }}">
                        </a>
                    </div>
                    <div class="media-body question-body">
                        <h4 class="media-heading">
                            <a class="question-title" href="/questions/{{ $question->id }}">
                                {{ $question->title }}
                            </a>
                        </h4>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-2 col-md-offset-5 question-create">
                <a href="/questions/create" class="btn btn-sm btn-info btn-block">创建我的问题</a>
            </div>
        </div>
    </div>
@endsection
