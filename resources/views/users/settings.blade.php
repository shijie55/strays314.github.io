@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">个人信息设置</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/setting/update') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="city" class="col-md-4 control-label">现居城市</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control"
                                           value="{{ json_decode(user()->settings)->city }}"
                                           name="city">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="bio" class="col-md-4 control-label">个人简介</label>

                                <div class="col-md-6">
                                    <textarea rows="4" id="bio" class="form-control" name="bio">{{ json_decode(user()->settings)->bio }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        保存
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
