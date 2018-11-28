$(function () {
    editorI = new $.fn.dataTable.Editor({
        table: "#example1",
        idSrc:  'id',
        ajax: {
            url: "../formula/update",
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
            label: '姓名',
            name: "lsp"
        }, {
            label: '密码',
            name: "ip",
        },
        ],

    });

    $('#example1').on( 'click', 'tbody td:nth-child(1)', function (e) {
        editorI.inline( this );
    } );
    $('#example1').on( 'click', 'tbody td:nth-child(2)', function (e) {
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
            {'data':'distance'},
            {'data':'linkage'},
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
         //重绘回调函数
         // "fnDrawCallback": function (oSettings) {
         //     $.ajax({
         //         url:"../formula/get_args",
         //         async:false,
         //         dataType:"json",
         //         success:function(data) {
         //             var lsp;
         //             var ip;
         //             $.each(data,function (i,n) {
         //                 if(i=='lsp'){
         //                     lsp=n;
         //                 }
         //                 if(i=='ip'){
         //                     ip=n;
         //                 }
         //             });
         //             $("#lsp").text(lsp);
         //             $("#ip").text(ip);
         //             $("#ip2").text(ip);
         //             $("#result").text(((lsp-ip)/ip).toFixed(2));
         //         }
         //     });
         // },
         buttons: [
             {
                 text: '新增基准运价规则',
                 editor:editorI,
                 extend: 'create',
                 formTitle:'新增基准运价规则',
                 formButtons:'提交',
             },
             {
                 text: '删除基准运价规则',
                 editor:editorI,
                 extend: 'remove',
                 formTitle:'删除基准运价规则',
                 formButtons:'提交',
             },
         ],
    });

})