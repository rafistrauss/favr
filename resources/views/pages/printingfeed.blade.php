@extends('app')
@section('content')
    <div id="background_main">
        <div class="outer_box"
             style="width:62%; height: 222px; margin-top: 50px; position: relative">
            @if($message !== '')
                <h3>{{ $message }}</h3><br>
            @endif
            @foreach($favors as $index => $value)
                <h4>Username: {{$users[$index]->name}} </h4>

                <h4>Title of Favor: {{$favors[$index]->name}}</h4>

                <h4>Description: {{$favors[$index]->description}}</h4>

                <h4>Start Location: {{$favors[$index]->start_location}}</h4>

                <h4>End Location: {{$favors[$index]->end_location}}</h4>

                <h4>End Time: {{$favors[$index]->end_time}}</h4>
                <a href=".php">
                    <button id="other_button" tabindex="" accesskey="l" name="post_button{{$favors[$index]->id}}"
                            value="{{$favors[$index]->id}}">Respond To Request
                    </button>
                </a>
            @endforeach

        </div>


    </div>
@endsection
@stop