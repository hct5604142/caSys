$(function () {
    editor1= new $.fn.dataTable.Editor({
        table: "#example1",
        idSrc:  'id',
        ajax: {
            url: "../order/update_no_type",
            type: "POST",
            data: {
                _token: csrf_token,
            },
            dataType: "json"
        },
        fields: [{
            label: '车号',
            name: "no",
        },{
            label: '车型',
            name: "type",
        },
        ],
    });

    editor1.on( 'preSubmit', function ( e, o, action ) {
        if ( action !== 'remove' ) {
            var no = this.field( 'no' );
            var type = this.field( 'type' );
            // Only validate user input values - different values indicate that
            // the end user has not entered a value
            if ( ! no.isMultiValue() ) {
                if ( ! no.val() ) {
                    no.error( '请输入车号' );
                }
            }
        if ( ! type.isMultiValue() ) {
            if ( ! type.val() ) {
                type.error( '请输入型号' );
            }
            if(isNaN(type.val())){
                type.error( '请输入数字' );
            }
        }
            // ... additional validation rules

            // If any error was reported, cancel the submission so it can be corrected
            if ( this.inError() ) {
                return false;
            }
    }} );

    $('#example1').on( 'click', 'tbody td:nth-child(2)', function (e) {
        editor1.inline( this );
    } );
    $('#example1').on( 'click', 'tbody td:nth-child(3)', function (e) {
        editor1.inline( this );
    } );

     table1 =$('#example1').DataTable({
        dom: "Bfrtip",
         "ordering": false,
        "ajax": { // 获取数据
            "url": "../order/show_no_type_list",
            "dataType": "json" //返回来的数据形式
        },
         idSrc:  'id',
        "processing": true,
         'paging':false,
        "columns": [ //定义列数据来源
            {'data': null, className: 'select-checkbox text-center', defaultContent: ""},
            {'data': "id",'visible':false},
            {'data': 'no',},
            {'data': 'type',  "render": function ( data, type, full, meta ) {
                    return data+'T';
                }},
            {'data':'updated_at'},
        ],
         //自定义列
        select: {
             style: 'os',
            selector: 'td:first-child',
        },
         buttons: [
             {
                 text: '新增单位',
                 editor:editor1,
                 extend: 'create',
                 formTitle:'新增单位',
                 formButtons:'提交',
             },
             {
                 text: '删除单位',
                 editor:editor1,
                 extend: 'remove',
                 formTitle:'删除单位',
                 formButtons:'提交',
             },
         ],
    });

})