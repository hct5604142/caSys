@extends('dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="register-box">
            <div class="register-box-body">
                <p class="login-box-msg">增加新用户</p>

                <form action="" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="工号">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="姓名">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="密码">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="密码确认">
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