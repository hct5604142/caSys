$(function () {
    editor1= new $.fn.dataTable.Editor({
        table: "#example1",
        idSrc:  'id',
        ajax: {
            url: "../formula/update_unit",
            type: "POST",
            data: {
                _token: csrf_token,
            },
            dataType: "json"
        },
        fields: [{
            label: '单位内容',
            name: "unit_name",
        },
        ],
    });



    $('#example1').on( 'click', 'tbody td:nth-child(2)', function (e) {
        editor1.inline( this );
    } );

     table1 =$('#example1').DataTable({
        dom: "Bfrtip",
         "ordering": false,
        "ajax": { // 获取数据
            "url": "../formula/show_units_list",
            "dataType": "json" //返回来的数据形式
        },
         idSrc:  'id',
        "processing": true,
         'paging':false,
        "columns": [ //定义列数据来源
            {'data': null, className: 'select-checkbox text-center', defaultContent: ""},
            {'data': "id",'visible':false},
            {'data': 'unit_name',},
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