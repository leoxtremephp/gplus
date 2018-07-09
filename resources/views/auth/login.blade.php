@extends('base')
@section('styles')
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-theme.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/auth/theme-default.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>
                    <div class="panel-body">
                        <small>
                            <div class="alert alert-danger" hidden></div>
                        </small>
                        <form id="form">
                            {{ csrf_field() }}
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <input type="email" class="form-control" name="email" placeholder="E-Mail" autofocus required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-lock"></i>
                                            </div>
                                            <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer" align="center">
                        <button class="btn btn-primary" form="form">Acceder</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            var form = $('form'),
                panel = $('.panel'),
                alert = $('.alert');

            form.submit(function (events) {
                $.post("{{ route('login') }}", form.serialize())
                    .done(function (data) {
                        window.location.reload();
                    })
                    .fail(function (data) {
                        alert.show().html(data.responseJSON.message);
                        panel.effect('shake', {
                            times: 2,
                            distance: 12
                        })
                    })
                events.preventDefault();
            })
        })
    </script>
@endsection
