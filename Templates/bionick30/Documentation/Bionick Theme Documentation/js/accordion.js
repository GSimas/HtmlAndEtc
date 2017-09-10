try{Typekit.load();}catch(e){}

(function($) {
// What does the accordion plugin do?
$.fn.accordion = function(options) {

  if (!this.length) { return this; }

  var opts = $.extend(true, {}, $.fn.accordion.defaults, options);

  this.each(function() {
    var $this = $(this).find('dl');
    
    var $all_panels = $this.find("dd");

    if(Modernizr.cssanimations)
    {
      $this.find("dt:first .arrow").addClass('down-anim');
    }
    else
    {
      $this.find("dt:first .arrow").addClass('down');
    }

    $this.find("dt > a").on('click', function(event){
	  
      event.preventDefault();
	  
      if(!$(this).parent().hasClass('active'))
      {
      
       $all_panels.slideUp();
       var $active = $('dl .active').removeClass('active');
       
       $(this).parent().next().slideDown().addClass('active');
       $(this).parent().addClass('active');
       
       if(Modernizr.cssanimations)
       {
         $active.filter('dt').find('.arrow').removeClass('down-anim');
         $(this).parent().find('.arrow').addClass('down-anim');
       }
       else
       {
         $active.filter('dt').find('.arrow').removeClass('down');
         $(this).parent().find('.arrow').addClass('down');
       }
      }
	  
    });

  });

  return this;
};

// default options
$.fn.accordion.defaults = {};
})(jQuery);



// call plugin
$(".accordion").accordion();