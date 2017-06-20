@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">对话内容</div>
                    <div class="panel-heading clearfix">
                        <form action="/user/box/{{ $messages->first()->dialog_id }}/store" class="messages-form" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <textarea type="text" name="body" rows="4" class="form-control">{{ old('body') ? old('body') : ''}}</textarea>
                            </div>
                            @if ($errors->has('body'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('body') }}</strong>
                                </span>
                            @endif
                            <div class="form-group pull-right">
                                <button type="submit" class="btn btn-success btn-sm">发送</button>
                            </div>
                        </form>
                    </div>
                    <div class="panel-body">
                        @foreach($messages as $message)
                            <div class="media">
                                <div class="media-left">
                                    <img style="width: 50px" src="{{ $message->fromUser->avatar }}" alt="{{ $message->fromUser->name }}">
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <a href="#">
                                            {{ $message->fromUser->name }}
                                        </a>
                                    </div>
                                    <span class="pull-right">{{ $message->created_at->format('Y-m-d') }}</span>
                                    <p>{{ $message->body }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
