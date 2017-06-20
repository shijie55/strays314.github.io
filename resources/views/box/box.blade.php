@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">我的对话</div>

                    <div class="panel-body">
                        @foreach($messages as $key => $messageGroup)
                            <div>
                                @if($messageGroup->first()->shouldAddRead())
                                    <span class="pull-right notice">有新消息</span>
                                @endif
                                <h4 class="box">
                                    <img class="box-img" src="{{ $messageGroup->last()->fromUser->avatar }}"
                                         alt="{{ $messageGroup->first()->fromUser->name }}">
                                    <mark>
                                        {{ $messageGroup->last()->fromUser->name }}
                                    </mark>
                                    和
                                    <img class="box-img" src="{{ $messageGroup->last()->toUser->avatar }}"
                                         alt="{{ $messageGroup->first()->toUser->name }}">
                                    <mark>
                                        {{ $messageGroup->last()->toUser->name }}
                                    </mark>
                                    的对话：
                                </h4>
                                <span>
                                    <a href="{{ url('/user/box/list/'. $messageGroup->first()->dialog_id) }}">
                                        {{ $messageGroup->first()->body }}（{{ $messageGroup->first()->fromUser->name }}）
                                    </a>
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
