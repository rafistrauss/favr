@extends('app')

@section('content')
    <div id="background_main">
        <div class="outer_box"
             style="height: 222px; margin-top: 50px; position: relative">
            <h1>Welcome to Favr!</h1>
            <a href="{{url('auth/register')}}"><button id="register_button" tabindex=""
                                           accesskey="l" name="register_button" value="Login">Register</button>
            </a>

            <a href="{{url('auth/login')}}">

                <button id="login_button" tabindex=""
                        accesskey="l" name="login_button" value="Login">Log in</button> </a>
        </div>
        <div
                style="margin: auto; width: 64%; margin-top: 40px; line-height: 28px;">
            <h3>What is Favr?</h3>
            Favr is a favor-exchange app. You begin with a set amount of points
            which are used to buy favors from other users. Favors are categorized
            by type and each user chooses which type of favor s/he is willing to
            execute. Each favor has: a time frame for which it will stay on the
            app, a start and end location (to know where the favor takes place), a
            price (composed of a certain number of points), and a description of
            the favor. The requester creates a favor, the do-er chooses a favor to
            complete. The requester must confirm the do-er in order for the do-er to
            start the favor. Once confirmed and completed, both the requester and the
            do-er must confirm that the favor has been completed for the transfer
            of points to take place. This app is not responsible for any loss of
            time or money that occurred while performing a favor.
        </div>
    </div>

@endsection
