$(function () {
    editor = new $.fn.dataTable.Editor({
        table: "#example1",
        ajax: {
            url: "../auth/update_name",
            type: "POST",
            data: {
                _token: csrf_token,
            },
            dataType: "json"
        },
        fields: [{
            label: '账户',
            name: "id"
        }, {
            label: '姓名',
            name: "name"
        }, {
            label: '密码',
            name: "roles"
        },
        ]
    });
    editorNewUeser = new $.fn.dataTable.Editor({
        table: "#example1",
        ajax: {
            url: "../auth/add",
            type: "POST",
            data: {
                _token: csrf_token,
            },
            dataType: "json"
        },
        fields: [{
            label: '账户',
            name: "id",
            data:'name'
        }, {
            label: '姓名',
            name: "name"
        }, {
            label: '密码',
            name: "password"
        },
        ]
    });

    editorPass = new $.fn.dataTable.Editor({
        table: "#example1",
        ajax: {
            url: "../auth/add",
            type: "POST",
            data: {
                _token: csrf_token,
            },
            dataType: "json"
        },
        fields: [ {
            label: '新密码',
            defaultContent:"",
            name: "password"
        },
        ]
    });
    $('#example1').on('click', 'tbody td:nth-child(3)', function (e) {
        editor.inline(this);
    });
    var table = $('#example1').DataTable({
        dom: "Bfrtip",
        "order": [1, "desc"],
        "ajax": { // 获取数据
            "url": "../auth/show_list",
            "dataType": "json" //返回来的数据形式
        },
        "processing": true,
        "columns": [ //定义列数据来源
            {'data': null, className: 'select-checkbox text-center', defaultContent: ""},
            {'data': "id",},
            {'data': "name",},
            {'data': 'roles'},
            {'data': "created_at"},
            {'data': "updated_at"},
            {'data': "state"},
        ],
        "columnDefs": [ //自定义列
            // {
            //   "targets": 3, //改写哪一列
            // "data": "password",
            //"render": function (data, type, row) {
            // return "<a href='"+full.teacher_id+"'>look at my href</a>";
            //  var html = "<button class='btn btn-danger' onclick='edit(" + row.teacher_id + ")'>重置密码</button>";
            // return html;
            //}
            //},
            {
                "targets": [-1, -7],
                "orderable": false  //禁止排序
            },
            {
                "targets": [-1, -7,],
                "searchable": false //禁止搜索
            }
        ],
        select: {
            style: 'os',
            selector: 'td:first-child',
        },
        buttons: [
            {
                text: '新建...',
                extend: 'create',
                editor: editorNewUeser,
                formTitle:'增加新用户',
                formButtons:'提交',
            },
            {
                text: '删除管理员',
                extend: 'remove',
                editor: editor,
            },
            {
                text: '重置密码',
                editor:editorPass,
                extend: 'edit',
            },
        ]
    });
})