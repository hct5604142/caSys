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
        ]
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