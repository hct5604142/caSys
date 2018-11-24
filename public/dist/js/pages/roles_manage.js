$(function () {
    var a= new Array();
    $.ajax({
        url:"../auth/get_ajax_roles",
        async:false,
        dataType:"json",
        success:function(data) {
            $.each(data,function (i,n) {
                var b={};
                b['label']=n['name'];
                b['value']=n['id'];
             a[i]=b;
            });

        }

    });
    editorRole = new $.fn.dataTable.Editor({
        table: "#example1",
        idSrc:  'id',
        ajax: {
            url: "../auth/update_name",
            type: "POST",
            data: {
                _token: csrf_token,
            },
            dataType: "json"
        },
        fields: [{
            label: '角色列表',
            name: "roles[,]",
            type:'checkbox',
            options:a,

        },
        ]
    });
     $('#example1').DataTable({
        dom: "Bfrtip",
        "order": [1, "desc"],
        "ajax": { // 获取数据
            "url": "../auth/show_permission_list",
            "dataType": "json" //返回来的数据形式
        },
         idSrc:  'id',
        "processing": true,
        "columns": [ //定义列数据来源
            {'data': null, className: 'select-checkbox text-center', defaultContent: ""},
            {'data': "id",},
            {'data': "name",},
            {'data': 'roles[,]'},
        ],

         //自定义列
        "columnDefs": [
            {
                "targets": [-1, -4],
                "orderable": false  //禁止排序
           },
            {
                "targets": [-4,],
                "searchable": false //禁止搜索
            }
        ],
        select: {
             style: 'os',
            selector: 'td:first-child',
        },
        buttons: [
            {
                text: '修改角色',
                editor:editorRole,
                extend: 'edit',
                formTitle:'修改角色',
                formButtons:'提交',
            },
       ]
    });
})