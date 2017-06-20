@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default clearfix col-sm-4 col-sm-offset-4">
                <div class="panel-heading user">
                    <span class="user-avatar">
                        <img src="{{ user()->avatar }}" alt="">
                        <a href="{{ url('/user/avatar') }}">
                            <h4>更</h4><h4>换</h4>
                        </a>
                    </span>
                </div>
                <div class="panel-body text-center">
                    <div class="panel-heading ">昵称：{{ user()->name }}</div>
                    <div class="panel-heading ">居住地：{{ json_decode(user()->settings)->city }}</div>
                    <div class="panel-heading ">个人简介：{{ json_decode(user()->settings)->bio }}</div>
                    <div class="panel-heading "><a href="{{ url('/user/setting') }}" class="btn btn-success btn-sm">设置个人信息</a></div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('js')

@endsection