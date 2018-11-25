$(function () {





    //删除角色
    editorPermissionDelete = new $.fn.dataTable.Editor({
        table: "#example1",
        idSrc:  'id',
        ajax: {
            url: "../auth/remove_role",
            type: "POST",
            data: {
                _token: csrf_token,
            },
            dataType: "json"
        },
        fields: [
            {
                label: 'id',
                name: "id",
            },
        ]
    });


     $('#example1').DataTable({
        dom: "Bfrtip",
        "order": [1, "desc"],
        "ajax": { // 获取数据
            "url": "../auth/permissions_list",
            "dataType": "json" //返回来的数据形式
        },
         idSrc:  'id',
        "processing": true,
        "columns": [ //定义列数据来源
            {'data': null, className: 'select-checkbox text-center', defaultContent: ""},
            {'data': "id",},
            {'data': "name",},
            {'data': 'method'},
            {'data':'created_at'},
            {'data':'updated_at'},
        ],

         //自定义列
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
        select: {
             style: 'os',
            selector: 'td:first-child',
        },
        buttons: [
            {
                text: '删除权限',
                editor:editorPermissionDelete,
                extend: 'remove',
                formTitle:'删除角色',
                formButtons:'提交',
            },
       ]
    });
})