/**
 * @detail
 * Additional function to handle content
 * http://zourbuth.com/
 */

(function ($) {
	// Tabs function
	jQuery(document).ready(function($){
		// Tabs function
		$('ul.nav-tabs li').each(function(i) {
			$(this).bind("click", function(){
				var liIndex = $(this).index();
				var content = $(this).parent("ul").next().children("li").eq(liIndex);
				$(this).addClass('active').siblings("li").removeClass('active');
				$(content).show().addClass('active').siblings().hide().removeClass('active');

				$(this).parent("ul").find("input").val(0);
				$('input', this).val(1);
			});
		});
	});

	$.fn.totalAddImages = function(){
		$(this).click(function() {
			var imagesibling = $(this).siblings('img'),
			inputsibling = $(this).siblings('input'),
			buttonsibling = $(this).siblings('a');
			tb_show('Select Image/Icon Title', 'media-upload.php?post_id=0&type=image&TB_iframe=true');	
			window.send_to_editor = function(html) {
				var imgurl = $('img',html).attr('src');
				if ( imgurl === undefined || typeof( imgurl ) == "undefined" ) imgurl = $(html).attr('src');		
				imagesibling.attr("src", imgurl).slideDown();
				inputsibling.val(imgurl);
				buttonsibling.addClass("showRemove").removeClass("hideRemove");
				tb_remove();
			};
			return false;
		});
	}
	
	$.fn.totalRemoveImages = function(){
		$(this).click(function() {
			$(this).next().val('');
			$(this).siblings('img').slideUp();
			$(this).removeClass('show-remove').addClass('hide-remove');
			$(this).fadeOut();
			return false;
		});
	}
})(jQuery);