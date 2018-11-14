@extends('dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="register-box">
            <div class="login-logo">
                <a href="../../index2.html">添加用户</a>
            </div>
            <div class="register-box-body">
                <p class="login-box-msg">
                    @inject('validator','App\Presenters\UserAddPresenter')
                    {{session('state') ?? ""}}
                    {{$validator->showError(isset($errors)?$errors:null)}}
                </p>
                <form action="" method="post">
                    @csrf
                    <div class="form-group has-feedback">
                        <input name='user_id' type="text" class="form-control" placeholder="工号" value="{{old('user_id')}}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input name='user_name'type="text" class="form-control" placeholder="姓名" value="{{old('user_name')}}">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input name='user_password'type="password" class="form-control" placeholder="密码">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input name='user_password_confirmation' type="password" class="form-control" placeholder="密码确认">
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 col-xs-offset-1">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox"> 我同意并遵守 <a href="#">注册条例</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-3">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">增加</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div>
    </div>
</div>
@endsection