
$('.view-blog').on('click', function () {
    $.ajax({
        url: "blog/" +  $(this).data('id'),
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            $('#blog-image').attr("src", response.image);
            $('#blog-title').html(response.title);
            $('#blog-content').html(response.content);
        },
        error: function (error) {
            toastr.error(error.message);
        }
    });
});
