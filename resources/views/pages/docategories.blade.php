@extends('app')
@section('content')
    <div id="background_main">
        <div class="outer_box"
             style="height: 222px; margin-top: 50px; position: relative">
            <h1>Categories:</h1>
            <a href="{{url('pages/printing_feed/all')}}">
                <button id="printing_button" tabindex="" accesskey="l" name="post_button" value="all"
                        style="background-color: #3b5998;">All
                </button>
            </a>
            <a href="{{url('pages/printing_feed/printing')}}">
                <button id="printing_button" tabindex="" accesskey="l" name="post_button" value="printing"
                        style="background-color: #3b5998;">Printing
                </button>
            </a>

            <a href="{{url('pages/printing_feed/delivery')}}">
                <button id="delivery_button" tabindex="" accesskey="l" name="post_button" value="delivery"
                        style="background-color: #3b5998;">Delivery
                </button>
            </a>

            <a href="{{url('pages/printing_feed/laundry')}}">
                <button id="laundry_button" tabindex="" accesskey="l" name="post_button" value="laundry"
                        style="background-color: #3b5998;">Laundry
                </button>
            </a>

            <a href="{{url('pages/printing_feed/moving')}}">
                <button id="moving_button" tabindex="" accesskey="l" name="post_button" value="moving"
                        style="background-color: #3b5998;">Moving
                </button>
            </a>

            <a href="{{url('pages/printing_feed/other')}}">
                <button id="other_button" tabindex="" accesskey="l" name="post_button" value="other"
                        style="background-color: #3b5998;">Other
                </button>
            </a>
            <a href="{{url('/')}}">
                <input type="button" id="cancel_button" tabindex="" accesskey="l" name="post_button"
                       value="Cancel"></button>
            </a>

        </div>

    </div>
@endsection
@stop