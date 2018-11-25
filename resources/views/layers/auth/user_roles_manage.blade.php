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
                            <th style="width: 8%"></th>
                            <th>用户名</th>
                            <th>姓名</th>
                            <th>角色</th>
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
    <script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('dist/js/pages/user_roles_manage.js')}}"></script>
@endsection