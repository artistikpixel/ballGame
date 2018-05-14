@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/iCheck/square/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    @yield('css')
@stop

@section('body_class', 'login-page')

@section('body')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">i<b>QOACH</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Platforma IQOACH</p>
            <form action="{{ url(config('adminlte.login_url', 'login')) }}" method="post">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('telefon') ? 'has-error' : '' }}">
                    <input type="phone" name="telefon" class="form-control" value="{{ old('telefon') }}"
                           placeholder="Telefon">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('telefon'))
                        <span class="help-block">
                            <strong>{{ $errors->first('telefon') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password" class="form-control"
                           placeholder="{{ trans('adminlte::adminlte.password') }}">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>


                @if ($errors->has('credentialeInvalide'))
                    <span class="help-block">
                        <strong>{{ $errors->first('credentialeInvalide') }}</strong>
                    </span>
                @endif


                <div class="row">

                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button name="submitLogin" type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            {{-- <div class="auth-links">

                 @if (config('adminlte.register_url', 'register'))
                     <a href="{{ url(config('adminlte.register_url', 'register')) }}"
                        class="text-center"
                     >{{ trans('adminlte::adminlte.register_a_new_membership') }}</a>
                 @endif
             </div>--}}


            <div class="auth-links">


                <p class="text-center pull-right">powered by Cloud Dev</p>
                <br />

            </div>
        </div>
        <!-- /.login-box-body -->
    </div><!-- /.login-box -->
@stop

@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
    @yield('js')
@stop
