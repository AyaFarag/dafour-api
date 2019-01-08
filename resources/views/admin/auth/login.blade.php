@extends('admin.layouts.base')

@section('body')
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="javascrip:void(0);"><b>Dafour</b> Admin</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      {!! Form::open(['route' => 'admin.login', 'method' => 'post']) !!}
        <div class="form-group has-feedback">
          {!! Form::email('email', NULL, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
                {!! Form::checkbox('remember_me') !!} Remember me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      {!! Form::close() !!}
    </div>
    <!-- /.login-box-body -->
  </div>

  @include('admin.partials.js')
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
    });
  </script>

</body>
@stop

