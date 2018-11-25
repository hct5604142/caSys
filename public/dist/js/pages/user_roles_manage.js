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


    editora = new $.fn.dataTable.Editor({
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
        }, {
            label: '姓名',
            name: "name"
        }, {
            label: '密码',
            name: "password",
            type:'password',
        },{
            label:'角色',
            name:'role[,]'
        },

        ]
    });

    // 新用户Editor
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
        }, {
            label: '姓名',
            name: "name"
        }, {
            label: '密码',
            name: "password",
            type:'password',
        },
        ]
    });

    // 用户删除
    editorRemove = new $.fn.dataTable.Editor({
        table: "#example1",
        idSrc:  'id',
        ajax: {
            url: "../auth/del",
            type: "POST",
            data: {
                _token: csrf_token,
            },
            dataType: "json"
        },
    });

    editorName = new $.fn.dataTable.Editor({
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
        fields: [
            {
            name: "name",
        },
        ]
    });

    //修改角色
    editorRole = new $.fn.dataTable.Editor({
        table: "#example1",
        idSrc:  'id',
        ajax: {
            url: "../auth/edit_user_role",
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
        ],
    });
    editorRole.on( 'preSubmit', function ( e, o, action ) {
        if ( action == 'edit' ) {
            var permission = this.field( 'roles[,]' );

            // Only validate user input values - different values indicate that
            // the end user has not entered a value

            if (permission.val().length==0 ) {
                permission.error( '请至少选择一项' );
            }
            // if ( firstName.val().length >= 20 ) {
            //     firstName.error( 'The first name length must be less that 20 characters' );
            // }

            // ... additional validation rules

            // If any error was reported, cancel the submission so it can be corrected
            if ( this.inError() ) {
                return false;
            }
        }
    } );

    //修改状态
    editorState = new $.fn.dataTable.Editor({
        table: "#example1",
        idSrc:  'id',
        ajax: {
            url: "../auth/edit_state",
            type: "POST",
            data: {
                _token: csrf_token,
            },
            dataType: "json"
        },
        fields: [ {
            name: "state",
            type:'radio',
            options: [
                { label: "启用", value: 1 },
                { label: "关闭使用",  value: 0 }
            ],
        },
        ]
    });

    editorPass = new $.fn.dataTable.Editor({
        table: "#example1",
        idSrc:  'id',
        ajax: {
            url: "../auth/edit_pass",
            type: "POST",
            data: {
                _token: csrf_token,
            },
            dataType: "json"
        },
        fields: [ {
            label: '新密码',
            name: "password",
            type:'password',
        },
        ]
    });

    $('#example1').on( 'click', 'tbody td:nth-child(3)', function (e) {
        editorName.inline( this );
    } );
    $('#example1').on( 'click', 'tbody td:nth-child(5)', function (e) {
        editorState.inline( this );
    } );


     $('#example1').DataTable({
        dom: "Bfrtip",
        "order": [1, "desc"],
        "ajax": { // 获取数据
            "url": "../auth/show_role_list",
            "dataType": "json" //返回来的数据形式
        },
         idSrc:  'id',
        "processing": true,
        "columns": [ //定义列数据来源
            {'data': null, className: 'select-checkbox text-center', defaultContent: ""},
            {'data': "id",},
            {'data': "name",},
            {'data': 'roles[,]'},
            {'data': "state","render":function (val, type, row) {
                    return val==1?'<small class="label bg-green">启用</small>':'<small class="label bg-red">关闭</small>';
                }},
            {'data':'created_at'}
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
                text: '新用户',
                extend: 'create',
                editor: editorNewUeser,
                formTitle:'增加新用户',
                formButtons:'提交',
            },{
                text: '修改角色',
                editor:editorRole,
                extend: 'edit',
                formTitle:'修改角色',
                formButtons:'提交',
            },{
                text: '删除用户',
                editor:editorRemove,
                extend: 'remove',
                formTitle:'删除用户',
                formButtons:'提交',
            },{
                text: '修改密码',
                editor:editorPass,
                extend: 'edit',
                formTitle:'修改密码',
                formButtons:'提交',
            },

        ]
    });
})