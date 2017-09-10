/* jQuery codes and functions used in MARVELA Template */
(function(jQuery) {
   
   "use strict";
    jQuery('#s').attr('placeholder','Type & Hit Enter...');   
	
   // Navigation 
				jQuery("nav .menu-item-has-children").each(function(i){
				   jQuery(this).addClass('subnav');
				});
				
				jQuery("nav .menu-item-has-children .menu-item-has-children").each(function(i){
				   jQuery(this).addClass('subnav');
				});
				
			
jQuery('.port-popup-youtube').html(function(i,v){
    var id = v.split('embed/')[1]; // get the id so you can add to iframe
    return '<a class="popup-vimeo popup-youtube box-popup" href="http://www.youtube.com/watch?v=' + id + '';
});	


})(jQuery);