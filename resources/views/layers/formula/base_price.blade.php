@extends('dashboard')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <box class="box-header">
                    <H4>涨跌幅公式一览</H4>
                </box>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover dataTable" style="width:100%">
                        <thead>
                        <tr>
                            {{--<th style="width: 8%"></th>--}}
                            <th></th>
                            <th>id</th>
                            <th width="10%">运输项目主类别</th>
                            <th>运输项目子类别</th>
                            <th>基准运价</th>
                            <th>单位</th>
                            <th>距离相关</th>
                            <th>油价联动</th>
                            <th>备注</th>
                            <th width="10%">更新时间</th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <div class="box-footer">
                    <h4>公式：（上季度油价-初始油价）/初始油价=油价涨跌幅</h4>
                    <h4 >(<small id="lsp" class="bg-blue"></small>-<small id="ip" class="bg-blue"></small>)÷<small id="ip2" class="bg-blue"></small>=<small id="result" class="bg-red"></small></h4>
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
    <script src="{{asset('dist/js/pages/base_price.js')}}"></script>
@endsection