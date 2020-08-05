$(document).ready(function () {
    var newid = 1;
    $('#store').on('click', function () {
        let user = $("input[name='user']").val();
        let content = $("input[name='content']").val();

        if(user!="" && content!=""){
            $('thead').append(`
            <tr data-id="${newid}">
                <th>${user}</th>
                <th>${content}</th>
                <th><button type='button' class='btn btn-primary' data-toggle="modal" data-target="#go-edit">修改</button></th>
                <th><button type='button' class='btn btn-danger delete' data-toggle="modal" id="delete">刪除</button></th>
            </tr>
            `)

            $("input[name='user']").val(null);
            $("input[name='content']").val(null);
            newid++;
        }else{
            alert("請輸入完整");
        }
    })

    $('.delete').on('click', function(){
        console.log("a");
        if(confirm("確定要刪除?")){
            $("tr[data-id=1]").remove();
        }        
    })


    $('.init').on('click', function () {
        let user = $("input[name='user']").val();
        let content = $("input[name='content']").val();
    })

    $('#makefake').on('click', function(){
        for(i=1 ; i<=5 ;i++){
            $('thead').append(`
            <tr data-id="1">
                <th>${newid}</th>
                <th>HI</th>
                <th><button type='button' class='btn btn-primary' data-toggle="modal" data-target="#go-edit">修改</button></th>
                <th><button type='button' class='btn btn-danger delete' data-toggle="modal" id="delete">刪除</button></th>
            </tr>
            `)
            newid++;
        }
    })
});
