@extends('dashboard')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="bg-gray-light box box-solid">
                    <ul class="list-inline no-margin">
                        <li><button  type="button"class="form-control">批量删除</button></li>
                        <li><button class="form-control" type="button">添加管理员</button></li>
                        <li><input type="text" class="form-control"></li>
                    </ul>
            </div>
            <div class="box">
                <box class="box-header">

                </box>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover dataTable" style="width:100%">
                        <thead>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        var data=JSON.parse({!! $users !!});
    </script>
    <script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('dist/js/pages/user_manage.js')}}" ></script>
@endsection