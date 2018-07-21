{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log in Apps</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('back/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/dist/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('login') }}"><b>Login Apss</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Login to start your session</p>

            <form action="{{ url('login') }}" method="POST">
                <div class="form-group has-feedback {{ $errors->has('username') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" placeholder="Username" id="username" name="username">
                    <span class="fa fa-user form-control-feedback"></span>
                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                    <span class="fa fa-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-xs-4 pull-right">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                    </div>
                </div>
            </form>

            {{-- <a href="#" class="text-center">Register a new membership</a> --}}

        </div>
    </div>
</body>
<script src="{{ asset('back/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('back/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('back/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('back/dist/js/adminlte.min.js') }}"></script>
</html>
