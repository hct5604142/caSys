$(function () {
    editor1= new $.fn.dataTable.Editor({
        table: "#example1",
        idSrc:  'id',
        ajax: {
            url: "../order/update_start_end",
            type: "POST",
            data: {
                _token: csrf_token,
            },
            dataType: "json"
        },
        fields: [{
            label: '起点',
            name: "start",
            type:'select',
            options:[{
                label:'徐州',
                value:'徐州',
            },{
                label:'南通',
                value:'南通',
            },{
                label:'无锡',
                value:'无锡',
            },{
                label:'南京',
                value:'南京',
            },{
                label:'扬州',
                value:'扬州',
            },{
                label:'泰州',
                value:'泰州',
            },{
                label:'苏州',
                value:'苏州',
            },{
                label:'连云港',
                value:'连云港',
            },{
                label:'淮安',
                value:'淮安',
            },{
                label:'盐城',
                value:'盐城',
            },{
                label:'宿迁',
                value:'宿迁',
            },{
                label:'镇江',
                value:'镇江',
            },{
                label:'常州',
                value:'常州',
            }],
        },{
            label: '终点',
            name: "end",
            type:'select',
            options:[{
                label:'徐州',
                value:'徐州',
            },{
                label:'南京',
                value:'南京',
            },{
                label:'扬州',
                value:'扬州',
            },{
                label:'泰州',
                value:'泰州',
            },{
                label:'苏州',
                value:'苏州',
            },{
                label:'无锡',
                value:'无锡',
            },{
                label:'连云港',
                value:'连云港',
            },{
                label:'淮安',
                value:'淮安',
            },{
                label:'盐城',
                value:'盐城',
            },{
                label:'南通',
                value:'南通',
            },{
                label:'宿迁',
                value:'宿迁',
            },{
                label:'镇江',
                value:'镇江',
            },{
                label:'常州',
                value:'常州',
            }],
        },{
            label: '里程',
            name: "mileage",
        },
        ],
    });

    editor1.on( 'preSubmit', function ( e, o, action ) {
        if ( action !== 'remove' ) {
            var mileage = this.field( 'mileage' );
            // Only validate user input values - different values indicate that
            // the end user has not entered a value
        if ( ! mileage.isMultiValue() ) {
            if ( ! mileage.val() ) {
                mileage.error( '请输入里程' );
            }
            if(isNaN(mileage.val())){
                mileage.error( '请输入数字' );
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
    $('#example1').on( 'click', 'tbody td:nth-child(4)', function (e) {
        editor1.inline( this );
    } );

     table1 =$('#example1').DataTable({
        dom: "Bfrtip",
         "ordering": false,
        "ajax": { // 获取数据
            "url": "../order/start_end_list",
            "dataType": "json" //返回来的数据形式
        },
         idSrc:  'id',
        "processing": true,
         'paging':false,
        "columns": [ //定义列数据来源
            {'data': null, className: 'select-checkbox text-center', defaultContent: ""},
            {'data': "id",'visible':false},
            {'data': 'start',},
            {'data': 'end',},
            {'data': 'mileage',},
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