@extends('app')
@section('content')

    <div id="background_main">
        <div class="outer_box"
             style="height: 222px; margin-top: 50px; position: relative">
            <h1 style="margin-bottom: 0px;">
                Welcome, {{$user->name}}!
            </h1>
            <h5 style="text-align: center;">
                You have {{$user->points}} points
            </h5>
            <a href="{{url('pages/newfavor')}}">
                <button id="register_button" tabindex=""
                        accesskey="l" name="register_button" value="Login">New Favor
                </button>
            </a> <a href="{{url('pages/myfavors')}}">
                <button id="login_button" tabindex="" accesskey="l"
                        name="login_button" value="Login">My Favors
                </button>
            </a> <a href="{{url('pages/account')}}">
                <button id="login_button" tabindex="" accesskey="l"
                        name="login_button" value="Login">My Account
                </button>
            </a>

        </div>
    </div>
@endsection
@stop