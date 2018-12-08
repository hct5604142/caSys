$(function () {
    tableEdit = new $.fn.dataTable.Editor({
        table: "#example1",
        idSrc:  'id',
        ajax: {
            url: "../formula/update_base_price",
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
            label: '承运车号',
            name: "car_no",
        }, {
            label: '执行日期',
            name: "exec_date",
        },{
            label: '起止',
            name: "start_end",
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


    $('#example1').on( 'click', 'tbody td:nth-child(2)', function (e) {
        tableEdit.inline( this );
    } );

     table1 =$('#example1').DataTable({
        dom: "Bfrtip",
         "ordering": false,
        "ajax": { // 获取数据
            "url": "../formula/show_waybill_order_list",
            "dataType": "json" //返回来的数据形式
        },
         idSrc:  'id',
        "processing": true,
         'paging':true,
        "columns": [ //定义列数据来源
            {'data': null, className: 'select-checkbox text-center', defaultContent: ""},
            {'data': "id",'visible':false},
            {'data': 'order_number',},
            {'data': 'car_no'},
            {'data':'car_type'},
            {'data':'exec_date'},
            {'data':'start_end'},
            {'data':'mileage'},
            {'data':'boxes_no'},
            {'data':'tonnage'},
            {'data':'unit_price'},
            {'data':'freight'},
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
         buttons: [
             {
                 text: '新增成品订单条目',
                 editor:tableEdit,
                 extend: 'create',
                 formTitle:'新增基准运价规则',
                 formButtons:'提交',
             },
             {
                 text: '删除基准运价规则',
                 editor:tableEdit,
                 extend: 'remove',
                 formTitle:'删除基准运价规则',
                 formButtons:'提交',
             },
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
        // buttons: [
        //     {
        //         text: '新增基准运价规则',
        //         editor:editorAdd,
        //         extend: 'create',
        //         formTitle:'新增基准运价规则',
        //         formButtons:'提交',
        //     },
        //     {
        //         text: '删除基准运价规则',
        //         editor:editorDel,
        //         extend: 'remove',
        //         formTitle:'删除基准运价规则',
        //         formButtons:'提交',
        //     },
        // ],
    });
})