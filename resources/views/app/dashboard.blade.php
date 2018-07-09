@extends('base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <h1>You are logged in!</h1>
                </div>
            </div>
        </div>
    </div>
    <form action="{{route('logout')}}" method="post">
        {{ csrf_field() }}
        <button type="submit">
            LOGOUT
        </button>
    </form>
@endsection
