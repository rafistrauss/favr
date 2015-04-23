@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
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


                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="account" value="{{$user->id}}">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-6 control-label">Name</label>

                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-6 control-label">E-Mail Address</label>

                                    <div class="col-md-12">
                                        <input readonly type="email" class="form-control" name="email"
                                               value="{{ $user->email }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-6 control-label">Password</label>

                                    <div class="col-md-12">
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-6 control-label">Confirm Password</label>

                                    <div class="col-md-12">
                                        <input type="password" class="form-control" name="password_confirmation">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 col-md-offset">
                                        <button type="submit" class="btn btn-primary">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
