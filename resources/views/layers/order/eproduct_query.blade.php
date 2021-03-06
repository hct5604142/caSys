@extends('dashboard')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <box class="box-header">
                    <H4>涨跌幅公式一览</H4>
                </box>
                <div class="box-body">
                    <ul id="myTab" class="nav nav-tabs">
                        <li class="active">
                            <a href="#eproduct" data-toggle="tab">
                               成品订单
                            </a>
                        </li>
                        <li><a href="#ios" data-toggle="tab">托盘订单</a></li>
                        {{--<li class="dropdown">--}}
                            {{--<a href="#" id="myTabDrop1" class="dropdown-toggle"--}}
                               {{--data-toggle="dropdown">Java--}}
                                {{--<b class="caret"></b>--}}
                            {{--</a>--}}
                            {{--<ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">--}}
                                {{--<li><a href="#jmeter" tabindex="-1" data-toggle="tab">jmeter</a></li>--}}
                                {{--<li><a href="#ejb" tabindex="-1" data-toggle="tab">ejb</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade in active" id="eproduct" style="padding-top: 1em;">
                            <table id="example1" class="table table-striped table-bordered table-hover" style="width:100%">
                                <thead>
                                <tr>
                                    {{--<th style="width: 8%"></th>--}}
                                    <th>id</th>
                                    <th>运输公司</th>
                                    <th>订单编号</th>
                                    <th>承运车号</th>
                                    <th>车型</th>
                                    <th>执行日期</th>
                                    <th>起点</th>
                                    <th>终点</th>
                                    <th>里程</th>
                                    <th>数量</th>
                                    <th>吨位</th>
                                    <th>单价</th>
                                    <th>运费</th>
                                    <th>备注</th>
                                    <th>保存</th>
                                    <th>核量</th>
                                    <th>核价</th>
                                    <th>领导审核</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="ios" style="padding-top: 1em;">
                            <table id="example2" class="table table-striped table-bordered table-hover" style="width:100%">
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
                    </div>
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
    <script src="{{asset('dist/js/pages/eproduct_query.js')}}"></script>
@endsection