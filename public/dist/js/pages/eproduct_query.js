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

    tableEdit2= new $.fn.dataTable.Editor({
        table: "#example1",
        idSrc:  'id',
        ajax: {
            url: "../order/state",
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



     table1 =$('#example1').DataTable({
         dom: "Bfrtip",
         ordering:false,
         //"order": [[ 1, "desc" ]],
         "ajax": { // 获取数据
            "url": "../order/show_waybill_order_query_list",
            "dataType": "json" //返回来的数据形式
        },
         idSrc:  'id',
        "processing": true,
         'paging':true,
        "columns": [ //定义列数据来源
            {'data': "id",'visible':false},
            {'data':'company',},
            {'data': 'order_number',},
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
            {'data':'check_add',"render":function (val, type, row) {
                    return val==1?'<small class="label bg-green">是</small>':'<small class="label bg-red">否</small>';
                }},
            {'data':'check_number',"render":function (val, type, row) {
                    return val==1?'<small class="label bg-green">是</small>':'<small class="label bg-red">否</small>';
                }},
            {'data':'check_price',"render":function (val, type, row) {
                    return val==1?'<small class="label bg-green">是</small>':'<small class="label bg-red">否</small>';
                }},
            {'data':'leader_approval',"render":function (val, type, row) {
                    return val==1?'<small class="label bg-green">是</small>':'<small class="label bg-red">否</small>';
                }},
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

         ],
    });
    table1 =$('#example2').DataTable({
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