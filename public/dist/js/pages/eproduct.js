$(function () {
    var units_list= new Array();
    $.ajax({
        url:"../formula/get_ajax_units",
        async:false,
        dataType:"json",
        success:function(data) {
            $.each(data,function (i,n) {
                var b={};
                b['label']=n['unit_name'];
                b['value']=n['id'];
                units_list[i]=b;
            });
        }
    });
    editorI = new $.fn.dataTable.Editor({
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
            label: '账户',
            name: "id",
        }, {
            label: '运输项目主类别',
            name: "class_main",
        }, {
            label: '运输项目子类别',
            name: "class_sub",
        },{
            label: '基准运价',
            name: "base_price"
        },{
            label: '单位',
            name: "unit_name",
            type:'select',
            options:units_list,
        },{
            label: '距离相关',
            name: "distance",
            type:'radio',
            options: [
                { label: "相关", value: 1 },
                { label: "不相关",  value: 0 }
            ],
        },{
            label: '油价联动',
            name: "linkage",
            type:'radio',
            options: [
                { label: "联动", value: 1 },
                { label: "不联动",  value: 0 }
            ],
        },{
            label: '备注',
            name: "remark"
        },
        ],

    });
    editorAdd = new $.fn.dataTable.Editor({
        table: "#example1",
        idSrc:  'id',
        ajax: {
            url: "../formula/add_base_price",
            type: "POST",
            data: {
                _token: csrf_token,
            },
            dataType: "json"
        },
        fields: [{
            label: '运输项目主类别',
            name: "class_main",
        }, {
            label: '运输项目子类别',
            name: "class_sub",
        },{
            label: '基准运价',
            name: "base_price"
        },{
            label: '单位',
            name: "unit_name",
            type:'select',
            options:units_list,
        },{
            label: '距离相关',
            name: "distance",
            type:'radio',
            options: [
                { label: "相关", value: 1 },
                { label: "不相关",  value: 0 }
            ],
        },{
            label: '油价联动',
            name: "linkage",
            type:'radio',
            options: [
                { label: "联动", value: 1 },
                { label: "不联动",  value: 0 }
            ],
        },{
            label: '备注',
            name: "remark"
        },
        ],

    });

    editorDel = new $.fn.dataTable.Editor({
        table: "#example1",
        idSrc:  'id',
        ajax: {
            url: "../formula/del_base_price",
            type: "POST",
            data: {
                _token: csrf_token,
            },
            dataType: "json"
        },
    });

    $('#example1').on( 'click', 'tbody td:nth-child(2)', function (e) {
        editorI.inline( this );
    } );
    $('#example1').on( 'click', 'tbody td:nth-child(3)', function (e) {
        editorI.inline( this );
    } );
    $('#example1').on( 'click', 'tbody td:nth-child(4)', function (e) {
        editorI.inline( this );
    } );
    $('#example1').on( 'click', 'tbody td:nth-child(5)', function (e) {
        editorI.inline( this );
    } );
    $('#example1').on( 'click', 'tbody td:nth-child(6)', function (e) {
        editorI.inline( this );
    } );
    $('#example1').on( 'click', 'tbody td:nth-child(7)', function (e) {
        editorI.inline( this );
    } );
    $('#example1').on( 'click', 'tbody td:nth-child(8)', function (e) {
        editorI.inline( this );
    } );
    // $('#example1').on( 'click', 'tbody td:nth-child(3)', function (e) {
    //     editorName.inline( this );
    // } );
    // $('#example1').on( 'click', 'tbody td:nth-child(5)', function (e) {
    //     editorState.inline( this );
    // } );


     table1 =$('#example1').DataTable({
        dom: "Bfrtip",
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
         buttons: [
             {
                 text: '新增基准运价规则',
                 editor:editorAdd,
                 extend: 'create',
                 formTitle:'新增基准运价规则',
                 formButtons:'提交',
             },
             {
                 text: '删除基准运价规则',
                 editor:editorDel,
                 extend: 'remove',
                 formTitle:'删除基准运价规则',
                 formButtons:'提交',
             },
         ],
    });
    table1 =$('#example2').DataTable({
        dom: "Bfrtip",
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
        buttons: [
            {
                text: '新增基准运价规则',
                editor:editorAdd,
                extend: 'create',
                formTitle:'新增基准运价规则',
                formButtons:'提交',
            },
            {
                text: '删除基准运价规则',
                editor:editorDel,
                extend: 'remove',
                formTitle:'删除基准运价规则',
                formButtons:'提交',
            },
        ],
    });
})