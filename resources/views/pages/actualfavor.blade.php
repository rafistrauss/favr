@extends('app')
@section('content')
    <div class="container-fluid">
        <iv class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form name="favor-form" id="favor-form" method="post" action="{{url('/createfavor')}}">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>

                            <h1>{{$category}} Favor</h1>
                            <fieldset>
                                <label for="name">Name of Favor:</label> <input type="text" id="name"
                                                                                name="name" value="{{old('name')}}">
                                <label for="name">Description:</label><input type="text" id="description"
                                                                             name="description"
                                                                             value="{{old('description')}}">
                                <label for="location">Start Location:</label><input type="text" id="start_location"
                                                                                    name="start_location"
                                                                                    value="{{old('start_location')}}">
                                <label for="location">End Location:</label> <input type="text" id="end_location"
                                                                                   name="end_location"
                                                                                   value="{{old('end_location')}}">
                                <label for="reward">Reward:</label> <input type="number" id="price" name="price"
                                                                           value="{{old('price')}}">



                                <label for="deadline">Deadline:</label>
                                <input type="text" id="end_time" name="end_time" class="timepicker"
                                       value="{{old('end_time')}}">



                                <input type="hidden" name="category" value="{{$category}}"/>
                                <button type="submit">Submit</button>
                                <a href="{{url('pages/postcategories')}}">
                                    <input type="button" id="cancel_button" tabindex="" accesskey="l" name="post_button"
                                           value="Cancel"></button>
                                </a>
                                </fieldset>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@stop