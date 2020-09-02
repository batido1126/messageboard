<!DOCTYPE html>
<html>

<head>
    <title>留言板</title>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <style>
        #menu {
            position: fixed;
            right: 0;
            top: 50%;
            width: 8em;
            margin-top: -2.5em;
        }
    </style>
</head>

<body>
    <script type="text/javascript" charset="utf-8">
        function clearAddCommentVal() {
            $("#insert-user").val("");
            $("#insert-comment").val("");
        }

        function addComment(user, comment) {
            $.ajax({
                url: 'MessageController/creatComment',
                datatype: 'json',
                method: 'POST',
                data: {
                    "user": user,
                    "comment": comment,
                },
                success: function(data) {
                    $('tbody').prepend(`
                        <tr id="${data.id}">
                            <th id='user${data.id}'>${user}</th>
                            <th id='comment${data.id}'>${comment}</th>
                            <th><button type='button' class='btn btn-primary edit' data-toggle="modal" data-target="#go-edit" data-id="${data.id}" id="edit">修改</button></th>
                            <th><button type='button' class='btn btn-danger' data-id="${data.id}" id="delete">刪除</button></th>
                        </tr>
                    `)

                    clearAddCommentVal();
                }
            });
        }

        function deleteComment(id) {
            if (confirm("刪除後不可回復")) {
                $.ajax({
                    url: 'MessageController/deleteComment',
                    datatype: 'json',
                    method: 'POST',
                    data: {
                        "id": id
                    },
                    success: function(data) {
                        $("#" + id).remove();
                    }
                });
            }
        }

        function updateComment(id, comment) {
            $.ajax({
                url: 'MessageController/updateComment',
                datatype: 'json',
                method: 'POST',
                data: {
                    "id": id,
                    "comment": comment,
                },
                success: function(data) {
                    $('#comment' + id).text(comment);
                },
            });
        }

        $(document).ready(function() {
            function getMessages() {
                return new Promise((resolve) => {
                    $.ajax({
                        method: 'GET',
                        url: 'MessageController/getMessages',
                        dataType: 'json',
                        success: (response) => {
                            resolve(response);
                        },
                    });
                })
            }

            getMessages().then((messages) => {
                $.each(messages.reverse(), function(key, message) {
                    $('tbody').append(`
                        <tr id="${message.id}">
                            <th id="user${message.id}">${message.user}</th>
                            <th id="comment${message.id}">${message.comment}</th>
                            <th><button type='button' class='btn btn-primary' data-toggle="modal" data-target="#go-edit" data-id="${message.id}" id="edit">修改</button></th>
                            <th><button type='button' class='btn btn-danger' data-id="${message.id}" id="delete">刪除</button></th>
                        </tr>
                    `) //data-toggle="modal" data-target="#go-delete"
                })
            })
        });

        $(document).on('click', '#insert', function() {
            let user = $('#insert-user').val();
            let comment = $('#insert-comment').val();

            addComment(user, comment);
        })

        $(document).on('click', '#delete', function() {
            let id = $(this).attr('data-id');

            deleteComment(id);
        })

        $(document).on('click', '#update', function() {
            let comment = $('#update-comment').val();
            let id = document.getElementById('update').getAttribute('data-id');

            updateComment(id, comment);
        })

        $(document).on('click', '#edit', function() {
            let id = $(this).attr('data-id');
            let comment = $('#comment' + id).text();

            $('#update-comment').val(comment);
            document.getElementById("update").setAttribute("data-id", id);
        })

        $(document).on('click', '.canceladdcommentval', function() {
            clearAddCommentVal();
        })
    </script>