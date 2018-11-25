$(function () {
     var a= new Array();
    $.ajax({
        url:"../auth/get_ajax_permissions",
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
            url: "../auth/edit_role_permission",
            type: "POST",
            data: {
                _token: csrf_token,
            },
            dataType: "json"
        },
        fields: [
          {
            label: '权限列表',
            name: "permissions[,]",
            type:'checkbox',
            options:a,
        },
        ]
    });
    editorRole.on( 'preSubmit', function ( e, o, action ) {
        if ( action == 'edit' ) {
            var permission = this.field( 'permissions[,]' );

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
     $('#example1').DataTable({
        dom: "Bfrtip",
        "order": [1, "desc"],
        "ajax": { // 获取数据
            "url": "../auth/role_permissions_list",
            "dataType": "json" //返回来的数据形式
        },
         idSrc:  'id',
        "processing": true,
        "columns": [ //定义列数据来源
            {'data': null, className: 'select-checkbox text-center', defaultContent: ""},
            {'data': "id",},
            {'data': "name",},
            {'data': 'permissions[,]'},
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
                text: '新增角色',
                editor:editorRole,
                extend: 'create',
                formTitle:'新建角色',
                formButtons:'提交',
            },
            {
                text: '修改权限',
                editor:editorRole,
                extend: 'edit',
                formTitle:'修改角色',
                formButtons:'提交',
            },
       ]
    });
})