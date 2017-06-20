@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">

                <div class="panel panel-default">

                    <div class="panel-heading topic">
                        <span>{{ $question->title }}</span>
                        <span class="pull-right">
                            @foreach ($question->topics as $topic)
                                <a href="/topics/{{ $topic->id }}">{{ $topic->name }}</a>
                            @endforeach
                        </span>
                    </div>

                    <div class="panel-body">
                        {!! $question->body !!}
                    </div>
                    @if (Auth::check() && Auth::user()->owns($question))
                    <div class="panel-footer clearfix">
                        <form action="/questions/{{ $question->id }}" method="post">
                            {{ method_field('DELETE') }}
                            {!! csrf_field() !!}
                            <button class="btn btn-danger btn-sm pull-right" type="submit" style="margin-left: 5px;">删除</button>
                        </form>
                        <span class="edit"><a class="btn btn-info btn-sm pull-right" href="/questions/{{ $question->id }}/edit">编辑</a></span>
                    </div>
                    @endif
                    <comment-button
                            type="question"
                            model="{{ $question->id }}"
                            count="{{ $question->comments_count }}">

                    </comment-button>
                </div>

            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h2>{{ $question->followers_count }}</h2>
                        <span>关注人数</span>
                    </div>
                    <div class="panel-body">
                        <question-follow-button question="{{ $question->id }}"
                                                auth="{{ Auth::check()? Auth::id() : ''}}"
                                                user="{{ $question->user->id }}"
                        ></question-follow-button>
                        <a href="#editor" class="btn btn-sm btn-default pull-right">撰写答案</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h4>关于作者</h4>
                    </div>
                    <div class="panel-heading">
                        <div class="media-left">
                            <a href="#">
                                <img style="width: 80px;" src="{{ $question->user->avatar }}" alt="{{ $question->user->name }}">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">
                                <a href="">
                                    {{ $question->user->name }}
                                </a>
                            </h4>
                        </div>
                        <div class="media-bottom author-body row text-center">
                            <div class="author-body-item col-xs-4">
                                <h4>{{ $question->user->questions_count }}</h4>
                                <h5>问题</h5>
                            </div>
                            <div class="author-body-item col-xs-4">
                                <h4>{{ $question->user->followed_count }}</h4>
                                <h5>粉丝</h5>
                            </div>
                            <div class="author-body-item col-xs-4">
                                <h4>{{ $question->user->answers_count }}</h4>
                                <h5>回答</h5>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body
                    {{ Auth::check()&&(Auth::id()==$question->user->id) ? 'hidden' : ''}}">
                        <user-follow-button user="{{ $question->user->id }}"
                                            auth="{{ Auth::check()? Auth::id() : ''}}">
                        </user-follow-button>

                        <send-message-button user="{{ $question->user->id }}"
                                             auth="{{ Auth::check()? Auth::id() : ''}}">

                        </send-message-button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- 引入ueditor的js和css文件 --}}
    @include('vendor.ueditor.assets')


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">

                <div class="panel panel-default">

                    <div class="panel-heading">
                        目前有{{ $question->answers_count }}个回答
                    </div>

                        @foreach ($question->answers as $answer)
                        <div class="panel-heading">
                            <div class="media">
                                <div class="media-left avatar-body">
                                    <a href="">
                                        <img class="avatar-img" src="{{ $answer->user->avatar }}" alt="{{ $answer->user->name }}">
                                    </a>
                                </div>
                                <div class="media-body answer-body">
                                    <h4 class="media-heading">
                                        <a href="" class="answer-author-name">
                                            {{ $answer->user->name }}
                                        </a>
                                        <comment-button
                                                type="answer"
                                                model="{{ $answer->id }}"
                                                count="{{ $answer->comments_count }}">

                                        </comment-button>
                                        <user-vote-button answer="{{ $answer->id }}"
                                                          count="{{ $answer->votes_count }}"
                                                          auth="{{ Auth::check()? Auth::id() : ''}}"
                                        ></user-vote-button>
                                    </h4>
                                    {!! $answer->body !!}
                                </div>
                            </div>
                        </div>
                        @endforeach

                    <div class="panel-body" id="editor">
                        @if (Auth::check())
                            <form action="/questions/{{ $question->id }}/answer" method="post">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <!-- 编辑器容器 -->
                                    <textarea id="container" name="body" type="text/plain"
                                            style="height: 200px;">{!! old('body') ? old('body') : '' !!}
                                    </textarea>
                                </div>
                                @if ($errors->has('body'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif

                                <button type="submit" class="btn btn-success pull-right btn-sm">提交答案</button>
                            </form>
                        @else
                            <a href="/login" class="btn btn-sm btn-block btn-success">登录回答问题</a>
                        @endif
                    </div>

                    @if (!Auth::check())
                    <div class="panel-footer">
                        <span>请先登录再填写您的答案哦!</span>
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
    {{-- 实例化编辑器 --}}
    <script type="text/javascript">
        var ue = UE.getEditor('container',
            {
                toolbars: [
                    ['bold', 'italic', 'underline', 'strikethrough', 'blockquote', 'insertunorderedlist', 'insertorderedlist', 'justifyleft','justifycenter', 'justifyright',  'link', 'insertimage', 'fullscreen']
                ],
                elementPathEnabled: false,
                enableContextMenu: false,
                autoClearEmptyNode:true,
                wordCount:false,
                imagePopup:false,
                autotypeset:{ indent: true,imageBlockLine: 'center' }
            }
        );
        ue.ready(function() {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
        });

    </script>
@endsection