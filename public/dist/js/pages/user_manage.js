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
            name: "id"
        }, {
            name: "name"
        }, {
            name: "password"
        }, {
            name: "roles"
        },
        ]
    });
    $('#example1').on('click', 'tbody td:nth-child(3)', function (e) {
        editor.inline(this);
    });
    var table = $('#example1').DataTable({
        dom: "Bfrtip",
        "searching": true,
        "ajax": { // 获取数据
            "url": "../auth/show_list",
            "dataType": "json" //返回来的数据形式
        },
        "columns": [ //定义列数据来源
            {'data': null},
            {'data': "id"},
            {'data': "name"},
            {'data': null},//隐藏
            {'data': 'roles'},
            {'data': "created_at"},
            {'data': "updated_at"},
            {'data': "state"},
        ],
        "columnDefs": [ //自定义列
            {
                targets: 0,
                data: null,
                defaultContent: '',
                orderable: false,
                className: 'select-checkbox'
            },
            {
                "targets": 3, //改写哪一列
                "data": "password",
                "render": function (data, type, row) {
                    // return "<a href='"+full.teacher_id+"'>look at my href</a>";
                    var html = "<button class='btn btn-danger' onclick='edit(" + row.teacher_id + ")'>重置密码</button>";
                    return html;
                }
            },
            {
                "targets": [-1, -2],
                "orderable": false  //禁止排序
            },
            {
                "targets": [-1, -3],
                "searchable": false //禁止搜索
            }
        ],
        select: {
            style: 'os',
            selector: 'td:first-child'
        },
        buttons: [
            {
                text: '新增管理员',
                action: function (e, dt, node, config) {
                    table.rows().select();
                }
            },
            {
                text: '删除管理员',
                action: function (e, dt, node, config) {
                    alert('Button activated');
                }
            },

        ]
    });
})