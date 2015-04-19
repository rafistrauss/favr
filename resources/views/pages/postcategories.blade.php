@extends('app')
@section('content')
    <div id="background_main">
        <div class="outer_box"
             style="height: 222px; margin-top: 50px; position: relative">
            <h1>Do You Want To:</h1>

            <a href="{{url('pages/actualfavor/Printing')}}">
                <button id="printing_button" tabindex="" accesskey="l" name="post_button" value="printing">Printing
                </button>
            </a>

            <a href="{{url('pages/actualfavor/Delivery')}}">
                <button id="delivery_button" tabindex="" accesskey="l" name="post_button" value="delivery">Delivery
                </button>
            </a>

            <a href="{{url('pages/actualfavor/Laundry')}}">
                <button id=" laundry_button" tabindex="" accesskey="l" name="post_button"
            value="laundry">Laundry</button>
            </a>

            <a href="{{url('pages/actualfavor/Moving')}}">
                <button id=" moving_button" tabindex="" accesskey="l" name="post_button" value="moving">Moving</button>
            </a>

            <a href="{{url('pages/actualfavor/Other')}}">
                <button id=" other_button" tabindex="" accesskey="l" name="post_button" value="other">Other</button>
            </a>
            <a href="{{url('/')}}">
                <input type="button" id="cancel_button" tabindex="" accesskey="l" name="post_button"
                       value="Cancel"></button>
            </a>
        </div>
    </div>

@endsection
@stop