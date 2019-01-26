$(function () {
    var a= new Array();
    $.ajax({
        url:"../order/get_car_nos",
        async:false,
        dataType:"json",
        success:function(data) {
            $.each(data,function (i,n) {
                var b={};
                b['label']=n['no'];
                b['value']=n['id'];
                a[i]=b;
            });
        }
    });
    $('#datepicker').datepicker({
        autoclose: true,
        language: "zh-CN", //语言
        todayHighlight: true, //是否今日高亮
        format: 'yyyy-mm', //点击月份后显示在input中的格式
        autoclose: true, //是否开启自动关闭
        startView: 'years', //开始视图层，为月视图层
       // maxViewMode:'years', //最大视图层，为年视图层
        minViewMode:'months', //最小视图层，为月视图层
      //  startDate:moment().subtract(11,'month').toDate(), //控制可选的最早月份，为前12个月（含当前月）
        //endDate:moment().toDate() //控制可选的最晚月份，为当前月
    })
    var myDate = new Date();
    //$("#datepicker").datepicker("setDate",myDate.getFullYear()+"-"+myDate.getMonth()+1);//设置
    tableEdit = new $.fn.dataTable.Editor({
        table: "#example1",
        idSrc:  'id',
        ajax: {
            url: "../order/add_eproduct?company="+GetQueryString('company'),
            type: "POST",
            data: {
                _token: csrf_token,
            },
            dataType: "json"
        },
        fields: [{
            label: '订单编号',
            name: "order_number",
        }, {
            label:'烟草公司',
            name:'transport_category',
            type:'radio',
            def:0,
            options:[{
                label:'是',
                value:'1',
            },{
                label:'否',
                value:'0',
            },],
        },{
            label: '承运车号',
            name: "car_no",
            type:'select',
            options:a,
        }, {
            label: '执行日期',
            name: "exec_date",
            type: "datetime",
        },{
            label: '起点',
            name: "start",
            type:'select',
            options:[{
                label:'徐州',
                value:'徐州',
            },{
                label:'南通',
                value:'南通',
            },{
                label:'无锡',
                value:'无锡',
            },{
                label:'南京',
                value:'南京',
            },{
                label:'扬州',
                value:'扬州',
            },{
                label:'泰州',
                value:'泰州',
            },{
                label:'苏州',
                value:'苏州',
            },{
                label:'连云港',
                value:'连云港',
            },{
                label:'淮安',
                value:'淮安',
            },{
                label:'盐城',
                value:'盐城',
            },{
                label:'宿迁',
                value:'宿迁',
            },{
                label:'镇江',
                value:'镇江',
            },{
                label:'常州',
                value:'常州',
            }],
        },{
            label: '终点',
            name: "end",
            type:'select',
            options:[{
                label:'徐州',
                value:'徐州',
            },{
                label:'南通',
                value:'南通',
            },{
                label:'无锡',
                value:'无锡',
            },{
                label:'南京',
                value:'南京',
            },{
                label:'扬州',
                value:'扬州',
            },{
                label:'泰州',
                value:'泰州',
            },{
                label:'苏州',
                value:'苏州',
            },{
                label:'连云港',
                value:'连云港',
            },{
                label:'淮安',
                value:'淮安',
            },{
                label:'盐城',
                value:'盐城',
            },{
                label:'宿迁',
                value:'宿迁',
            },{
                label:'镇江',
                value:'镇江',
            },{
                label:'常州',
                value:'常州',
            }],
        },{
            label: '数量（箱）',
            name: "boxes_no"
        },{
            label: '吨位',
            name: "tonnage"
        },{
            label: '备注',
            name: "remark"
        },
        ],
    });

    tableEdit2= new $.fn.dataTable.Editor({
        table: "#example1",
        idSrc:  'id',
        ajax: {
            url: "../order/check_price_save?company="+GetQueryString('company'),
            type: "POST",
            data: {
                _token: csrf_token,
            },
            dataType: "json"
        },
        fields: [{
            label: 'id',
            name: "id",
        }
        ],
    });



    $('#example1').on( 'click', 'tbody td:nth-child(3)', function (e) {
        tableEdit.inline( this, {
            submit: 'allIfChanged'
        } );
    } );
    $('#example1').on( 'click', 'tbody td:nth-child(4)', function (e) {
        tableEdit.inline( this, {
            submit: 'allIfChanged'
        } );
    });
    $('#example1').on( 'click', 'tbody td:nth-child(9)', function (e) {
        tableEdit.inline( this, {
            submit: 'allIfChanged'
        } );
    } );
    $('#example1').on( 'click', 'tbody td:nth-child(10)', function (e) {
        tableEdit.inline( this, {
            submit: 'allIfChanged'
        } );
    } );
    $('#example1').on( 'click', 'tbody td:nth-child(11)', function (e) {
        tableEdit.inline( this, {
            submit: 'allIfChanged'
        } );
    } );
    $('#example1').on( 'click', 'tbody td:nth-child(14)', function (e) {
        tableEdit.inline( this, {
            submit: 'allIfChanged'
        } );
    } );
    var url="../order/show_order_approval_eproduct_order_list?company="+GetQueryString('company')+"&date="+$("#datepicker").val();
     table1 =$('#example1').DataTable({
         dom: "Bfrtip",
         ordering:false,
         //"order": [[ 1, "desc" ]],
         "ajax": { // 获取数据
            "url":url ,
            "dataType": "json" //返回来的数据形式
        },
         idSrc:  'id',
        "processing": true,
         'paging':true,
        "columns": [ //定义列数据来源
            {'data': null, className: 'select-checkbox text-center', defaultContent: ""},
            {'data': "id",'visible':false},
            {'data': 'order_number',},
            {'data':'transport_category',"render":function (val, type, row) {
                    return val==1?'<small class="label bg-green">是</small>':'<small class="label bg-red">否</small>';
                }},
            {'data': 'car_no'},
            {'data':'car_type'},
            {'data':'exec_date'},
            {'data':'start'},
            {'data':'end'},
            {'data':'mileage'},
            {'data':'boxes_no'},
            {'data':'tonnage'},
            {'data':'unit_price'},
            {'data':'freight'},
            {'data':'remark'},
        ],
         //自定义列
        select: {
             style: 'os',
            selector: 'td:first-child',
        },
         "columnDefs": [
             // {
             //     "targets": [-1, -6],
             //     "orderable": false  //禁止排序
             // },
             // {
             //     "targets": [-4,],
             //     "searchable": false //禁止搜索
             // },
         ],
         buttons: [
             {
                 text: '核算提交',
                 extend: 'remove',
                 editor:tableEdit2,
                 formTitle:'核算提交',
                 formMessage:'请确认提交',
                 formButtons:'确定',
             },
             {
                 text: '全部提交',
                // editor:,
                 action: function ( e, dt, node, config ) {
                     tableEdit2.edit( table1.rows().indexes(), false ).submit();
                 }
             },
         ],
    });
    $("#datepicker").change(function(){
        table1.ajax.url("../order/show_order_approval_eproduct_order_list?company="+GetQueryString('company')+"&date="+$("#datepicker").val()).load();
    });
    table2 =$('#example2').DataTable({
        dom: "frtip",
        "ordering": false,
        "ajax": { // 获取数据
            "url": "../formula/show_base_price_list",
            "dataType": "json" //返回来的数据形式
        },
        idSrc:  'id',
        "processing": true,
        'paging':false,
        "columns": [ //定义列数据来源
            {'data': null, className: 'select-checkbox text-center', defaultContent: ""},
            {'data': "id",'visible':false},
            {'data': 'class_main',},
            {'data': 'class_sub'},
            {'data':'base_price'},
            {'data':'unit_name'},
            {'data':'distance',"render":function (val, type, row) {
                    return val==1?'<small class="label bg-green">相关</small>':'<small class="label bg-red">不相关</small>';
                }},
            {'data':'linkage',"render":function (val, type, row) {
                    return val==1?'<small class="label bg-green">联动</small>':'<small class="label bg-red">不联动</small>';
                }},
            {'data':'remark'},
            {'data':'updated_at'},
        ],
        //自定义列
        select: {
            style: 'os',
            selector: 'td:first-child',
        },
        "columnDefs": [
            {
                "targets": [-1, -6],
                "orderable": false  //禁止排序
            },
            {
                "targets": [-4,],
                "searchable": false //禁止搜索
            }
        ],
    });
})
function GetQueryString(name)
{
    var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
    var r = window.location.search.substr(1).match(reg);//search,查询？后面的参数，并匹配正则
    if(r!=null)return  unescape(r[2]); return null;
}