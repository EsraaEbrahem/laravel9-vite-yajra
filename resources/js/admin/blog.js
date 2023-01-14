$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function refreshTable() {
        var table = $('#blogs-table').dataTable();
        table.fnDraw(false);
    }

    function handleError(e, type) {
        try {
            var error = JSON.parse(e.responseText);
            if (error.code === 422) {
                if (error.data != null)
                    for (var key in error.data) {
                        $('#' + type + '-' + key + '-message').append(error.data[key][0]);
                    }
            } else if (error.code === 404)
                $('#' + type + '-error-message').html("البيانات المدخلة غير صحيحة");
            else
                $('#' + type + '-error-message').html(error.message);
        } catch (error) {
            $('#' + type + '-error-message').html(error.message);
        }
    }

    function clearMessages() {
        $("[id$='-message']").html('');
    }


    $('.buttons-add').on('click', function (event) {
        event.preventDefault();
        alert(11)
    });

    // show update modal
    $('#blogs-table').on('click', '.update-item', function () {
        clearMessages();
        $.ajax({
            url: "blogs/" + $(this).data('id'),
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.result) {
                    $('#id').val(response.data.id);
                    $('#title').val(response.data.title);
                    $('#content').val(response.data.content);
                    $('#image').val(response.data.image);
                    $('#status').val(response.data.status);
                } else {
                    $('#update-error-message').html("لا توجد بيانات");
                }
            },
            error: function (error) {
                try {
                    $('#g-error-message').html(error.message);

                } catch (e) {
                    $('#g-error-message').html(error.message);

                }
            }
        });
    });

    // show view modal
    $('#blogs-table').on('click', '.view-item', function () {
        $.ajax({
            url: "blogs/" + $(this).data('id'),
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.result) {
                    $('#b-image').attr("src", response.data.image);
                    $('#b-title').html(response.data.title);
                    $('#b-content').html(response.data.content);
                    $('#b-publish_date').html(response.data.publish_date);
                    $('#b-status').html(response.data.status);
                } else {
                    $('#view-error-message').html("لا توجد بيانات");
                }
            },
            error: function (error) {
                try {
                    $('#g-error-message').html(error.message);

                } catch (e) {
                    $('#g-error-message').html(error.message);

                }
            }
        });

    });

    // submit update
    $('.blog-update-changes').on('click', function () {
        clearMessages();
        var data = new FormData();
        console.log($('#title').val());
        data.append("title", $('#title').val());
        data.append("status", $('#status').val());
        data.append("publish_date", $('#publish_date').val());
        data.append("content", $('#content').val());

        var file = $("#image").prop("files")[0];
        data.append("image", file);

        $.ajax({
            url: "blogs/" + $('#id').val(),
            type: 'post',
            data: data,
            dataType: 'json',
            contentType: false,
            processData: false,
            cache: false,
            success: function (response) {
                refreshTable();
                $("#updateModal .cancel").click()
            },
            error: function (error) {
                handleError(error, 'update');
            }
        });
});

// submit create
$('.blog-save-changes').on('click', function () {
    clearMessages();

    var data = new FormData();
    data.append("title", $('#c-title').val());
    data.append("status", $('#c-status').val());
    data.append("publish_date", $('#c-publish_date').val());
    data.append("content", $('#c-content').val());

    var file = $("#c-image").prop("files")[0];
    console.log('file');
    console.log(file);
    if (file) {
        data.append("image", file);
        $.ajax({
            url: "blogs",
            type: 'post',
            data: data,
            dataType: 'json',
            contentType: false,
            processData: false,
            cache: false,
            success: function (response) {
                refreshTable();
                $("#createModal .cancel").click()
            },
            error: function (error) {
                handleError(error, 'create');
            }
        });
    } else {
        $('#create-image-message').append('image is required');
    }

});

// delete
$('#blogs-table').on('click', '.delete-item', function () {
    if (confirm("Delete Record?") == true) {
        clearMessages();
        var id = $(this).data('id');
        $.ajax({
            type: "POST",
            url: "delete-blog",
            data: {id: id},
            dataType: 'json',
            success: function (res) {
                refreshTable();
            },
            error: function (error) {
                try {
                    $('#g-error-message').html(error.message);

                } catch (e) {
                    $('#g-error-message').html(error.message);

                }
            }
        });
    }
});
})
;
