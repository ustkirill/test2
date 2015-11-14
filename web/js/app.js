$(function() {
	$(document).on('click', '.show-modal', function(e) {
		e.preventDefault();
		var target = $(this).attr("href");

        $("#common-modal").html('');
        $.ajax({
            url: target,
            data: {layout: 'modal'},
            type: 'GET',
            success: function(response) {
                $("#common-modal").html(response).modal("show");
            }
        });
	})

    $('.datepicker').datetimepicker({
        format: 'YYYY-MM-DD',
        useCurrent: false,
        locale: 'ru'
    });

    $('.fancybox').fancybox();
})