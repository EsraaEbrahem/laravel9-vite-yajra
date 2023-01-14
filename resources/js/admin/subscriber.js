$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function refreshTable() {
        var table = $('#subscribers-table').dataTable();
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

    function getRow(id) {

    }

    $('.buttons-add').on('click', function (event) {
        event.preventDefault();
        alert(11)
    });

    // show update modal
    $('#subscribers-table').on('click', '.update-item', function () {
        clearMessages();
        $.ajax({
            url: "subscribers/" + $(this).data('id'),
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.result) {
                    $('#id').val(response.data.id);
                    $('#name').val(response.data.name);
                    $('#username').val(response.data.username);
                    $('#password').val(response.data.password);
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
    $('#subscribers-table').on('click', '.view-item', function () {
        $.ajax({
            url: "subscribers/" + $(this).data('id'),
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.result) {
                    $('#s-name').html(response.data.name);
                    $('#s-username').html(response.data.username);
                    $('#s-status').html(response.data.status);
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
    $('.subscriber-update-changes').on('click', function () {
        clearMessages();
        var form = $('#updateForm').serialize();
        $.ajax({
            url: "subscribers/" + $('#id').val(),
            type: 'put',
            data: form,
            dataType: 'json',
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
    $('.subscriber-save-changes').on('click', function () {
        clearMessages();
        var form = $('#createForm').serialize();
        $.ajax({
            url: "subscribers",
            type: 'post',
            data: form,
            dataType: 'json',
            success: function (response) {
                refreshTable();
                $("#createModal .cancel").click()
            },
            error: function (error) {
                handleError(error, 'create');
            }
        });
    });

    // delete
    $('#subscribers-table').on('click', '.delete-item', function () {
        if (confirm("Delete Record?") == true) {
            clearMessages();
            var id = $(this).data('id');
            $.ajax({
                type: "POST",
                url: "delete-subscriber",
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
});
