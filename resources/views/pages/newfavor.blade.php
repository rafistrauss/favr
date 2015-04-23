@extends('app')
@section('content')
    <div id="background_main">
        <div class="outer_box"
             style="height: 222px; margin-top: 50px; position: relative">
            <h1>Do You Want To:</h1>
            <a href="{{url('pages/postcategories')}}">
                <button id="do_button" tabindex="" accesskey="l" name="post_button" value="favor">Post A Favor</button>
            </a>
            <h2 id="shaina">Or:</h2>

            <a href="{{url('pages/docategories')}}">
                <button id="do_button" accesskey="2" name="do_button" value="favor">Do A Favor</button>
            </a>
        </div>
    </div>
    @endsection
@stop