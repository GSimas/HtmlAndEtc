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
				
				jQuery(".wr-shop-button").each(function(i){
				   jQuery(this).removeClass('button');
				});
				
					


})(jQuery);