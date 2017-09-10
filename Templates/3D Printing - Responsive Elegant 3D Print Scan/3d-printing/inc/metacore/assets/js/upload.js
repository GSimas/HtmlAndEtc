(function($) { "use strict";
jQuery(document).ready(function($){
    if($('.zo_upload_button').length >= 1) {
        window.zo_uploadfield = '';

        $('.zo_upload_button').live('click', function() {
            window.zo_uploadfield = $('.upload_field', $(this).parent());
            tb_show('Upload', 'media-upload.php?type=file&TB_iframe=true', false);

            return false;
        });

        $('.zo_clear_button').click(function () {
			var clear_id = $(this).attr("data-id");
			$("#"+clear_id+"").val("");
		})

        window.zo_send_to_editor_backup = window.send_to_editor;
        window.send_to_editor = function(html) {
            if(window.zo_uploadfield) {
                var file_url = $('img', html).attr('src');
                if(file_url == undefined){
                	file_url = $("a", '<div>'+html+'<div>').attr("href");
                }
                console.log(this);
                $(window.zo_uploadfield).val(file_url);
                window.zo_uploadfield = '';
                tb_remove();
            } else {
                window.zo_send_to_editor_backup(html);
            }
        }
    }
});
})(jQuery);
