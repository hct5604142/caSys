var data=[];
for (var k=0;k<jsonString.length;k++){
    var a=[];
    for (let i in jsonString[k]){
        a.push(jsonString[k][i]);
    }
    data.push(a);
}
$(function () {
    $('#example1').DataTable({
       // data:data,
        "ajax":{ // 获取数据
            "url":"../test/2",
            "dataType":"json" //返回来的数据形式
        },
        "columns":[ //定义列数据来源
            {'title':"id",'data':"id"},
            {'title':"name",'data':"name"},
            {'title':"pwd",'data':"password"},//隐藏
            {'title':"email",'data':"created_at"},
            {'title':"date",'data':"updated_at"},
            {'title':"note",'data':"state"},
            {'title':"note"},

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
    });
})