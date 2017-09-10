jQuery(document).ready(function($) {
	"use strict";
	/* meta tabs */
    var meta_tabs = $('#tab-container');
	if(meta_tabs.length > 0){
		meta_tabs.easytabs({
			animate: true,
			animationSpeed: 500,
			updateHash: false,
		});
	}
});
