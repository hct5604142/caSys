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
        dom: "rti",
         "ordering": false,
        "ajax": { // 获取数据
            "url": "../formula/show_chgs_list",
            "dataType": "json" //返回来的数据形式
        },
         idSrc:  'id',
         info:false,
        "processing": true,
        "columns": [ //定义列数据来源
            {'data': "id",'visible':false},
            {'data': "lsp",},
            {'data': 'ip'},
            {'data':'updated_at'},
            {'data':'created_at'}
        ],
         //自定义列
        select: {
             style: 'os',
            selector: 'td:first-child',
        },
         //重绘回调函数
         "fnDrawCallback": function (oSettings) {
             $.ajax({
                 url:"../formula/get_args",
                 async:false,
                 dataType:"json",
                 success:function(data) {
                     var lsp;
                     var ip;
                     $.each(data,function (i,n) {
                         if(i=='lsp'){
                             lsp=n;
                         }
                         if(i=='ip'){
                             ip=n;
                         }
                     });
                     $("#lsp").text(lsp);
                     $("#ip").text(ip);
                     $("#ip2").text(ip);
                     $("#result").text(((lsp-ip)/ip).toFixed(2));
                 }
             });
         },

    });
    // alert(table1.row( this ).data());
})