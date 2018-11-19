$(function () {
    editor = new $.fn.dataTable.Editor( {
        table: "#example1",
        ajax: "../test/2",
        fields: [ {
            label: "账户",
            name: "id"
        }, {
            name: "name"
        }, {
            label: "密码:",
            name: "password"
        }, {
            label: "Office:",
            name: "office"
        }, {
            label: "Extension:",
            name: "created_at"
        }, {
            label: "Start date:",
            name: "updated_at",
            type: "datetime"
        }, {
            label: "Salary:",
            name: "state"
        }
        ]
    } );
    $('#example1').on( 'click', 'tbody td:not(:first-child)', function (e) {
        editor.inline( this );
    } );
    var table=$('#example1').DataTable({
       // data:data,

        "ajax":{ // 获取数据
            "url":"../test/2",
            "dataType":"json" //返回来的数据形式
        },
        "columns":[ //定义列数据来源
            {'data':"id"},
            {'data':"name"},
            {'data':null},//隐藏
            {'data':"created_at"},
            {'data':"updated_at"},
            {'data':"state"},
            {'data':null},
        ],
        "columnDefs": [ //自定义列
            {
                "targets": -1, //改写哪一列
                "data": "id",
                "render": function(data, type, row) {
                    // return "<a href='"+full.teacher_id+"'>look at my href</a>";
                    var html = "<button class='btn btn-info' onclick='edit("+row.teacher_id+")'>修改</button>" + "   <button name='btn-del' class='btn btn-danger' onclick='del("+row.teacher_id+")'>删除</button>";
                    return html;
                }
            },

            {
                "targets":[-1,-2],
                "orderable":false  //禁止排序
            },
            {
                "targets":[-1,-3],
                "searchable":false //禁止搜索
            }
        ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
    });
})