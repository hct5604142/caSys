@extends('dashboard')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <box class="box-header">

                </box>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover dataTable" style="width:100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>用户名</th>
                            <th>姓名</th>
                            <th>密码</th>
                            <th>角色</th>
                            <th>创建时间</th>
                            <th width="18%">更新时间</th>
                            <th>当前状态</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        var csrf_token = '{!! csrf_token() !!}';
    </script>
    <script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('bower_components/datatables-buttons/dataTables.buttons.min.js')}}"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="{{asset('bower_components/datatables-editor/dataTables.editor.js')}}"></script>
    <script src="{{asset('dist/js/pages/user_manage.js')}}"></script>
@endsection