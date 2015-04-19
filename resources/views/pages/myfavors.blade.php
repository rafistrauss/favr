@extends('app')
@section('content')
    <body style="">
    <div class="white_box">
        <h3 style="text-align: center;">
            <span class="left">My Points</span> <span class="right">{{$user->points}}
            </span> <span style="clear: both;" class="left padding_top">Favors
				Completed</span> <span class="right padding_top">{{$completed_by_user}}
			</span> <span style="clear: both;" class="left padding_top">Favors
				Posted</span> <span class="right padding_top">{{$total_for_user}}
			</span>

        </h3>
    </div>

    <div class="white_box">
        <table style="font-weight: bold;" class="favors_table">
            <h3 style="text-align: left;">Currently Doing</h3>
            @if(sizeof($currentlyDoing) > 0)
            <tr>
                <th>Name</th>
                <th>End Time</th>
                <th>Points</th>
            </tr>
                @else
                <h4>You are not doing any favors.</h4>
            @endif
            @foreach($currentlyDoing as $favor)
                <tr>
                    <td title="{{$favor->name}}">
                        @if(strlen($favor->name) > 20)
                            {{substr($favor->name, 0, 20).'...'}}
                        @else
                            {{$favor->name}}
                        @endif
                    </td>
                    <td>{{$favor->end_time}}</td>
                    <td>{{$favor->price}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="white_box">
        <table style="font-weight: bold;" class="favors_table">
            <h3 style="text-align: left;">In-Progress</h3>
            @if(sizeof($inProgress) > 0)
                <tr>
                    <th>Name</th>
                    <th>End Time</th>
                    <th>Points</th>
                </tr>
            @else
                <h4>You have no favors in progress.</h4>
            @endif
            @foreach($inProgress as $favor){
            ?>
            <tr>
                <td title="{{$favor->name}}">
                    @if(strlen($favor->name) > 20)
                        {{substr($favor->name, 0, 20).'...'}}
                    @else
                        {{$favor->name}}
                    @endif
                </td>
                <td>{{$favor->end_time}}</td>
                <td>{{$favor->price}}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="white_box">
        <table style="font-weight: bold;" class="favors_table">
            <h3 style="text-align: left;">Active</h3>
            @if(sizeof($areActive) > 0)
                <tr>
                    <th>Name</th>
                    <th>End Time</th>
                    <th>Points</th>
                </tr>
            @else
                <h4>You have no active favors.</h4>
            @endif
            @foreach($areActive as $favor)
                <tr>
                    <td title="{{$favor->name}}">
                        @if(strlen($favor->name) > 20)
                            {{substr($favor->name, 0, 20).'...'}}
                        @else
                            {{$favor->name}}
                        @endif
                    </td>
                    <td>{{$favor->end_time}}</td>
                    <td>{{$favor->price}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    </body>
@endsection
@stop