// MENU TOP===============================================================================
            $(function() {
				var $oe_menu		= $('#my_menu');
				var $oe_menu_items	= $oe_menu.children('li');
				var $oe_overlay		= $('#overlay');

                $oe_menu_items.bind('mouseenter',function(){
					var $this = $(this);
					$this.addClass('slided selected');
					$this.children('div').css('z-index','9999').stop(true,true).slideDown(200,function(){
						$oe_menu_items.not('.slided').children('div').hide();
						$this.removeClass('slided');
					});
				}).bind('mouseleave',function(){
					var $this = $(this);
					$this.removeClass('selected').children('div').css('z-index','1');
				});

				$oe_menu.bind('mouseenter',function(){
					var $this = $(this);
					$oe_overlay.stop(true,true).fadeTo(200, 0.6);
					$this.addClass('hovered');
				}).bind('mouseleave',function(){
					var $this = $(this);
					$this.removeClass('hovered');
					$oe_overlay.stop(true,true).fadeTo(200, 0);
					$oe_menu_items.children('div').hide();
				})
            });
			

	
			
	// HOME HOVER EFFECT ===============================================================================		    
    $(document).ready(function() {
        $('.project').mouseenter(function(e) {
            $(this).children('a').children('img').animate({ height: '130', left: '0', top: '0', width: '280'}, 400);
            $(this).children('a').children('span').fadeIn(800);
        }).mouseleave(function(e) {
            $(this).children('a').children('img').animate({ height: '140', left: '0', top: '0', width: '300'}, 400);
            $(this).children('a').children('span').fadeOut(200);
        });
});
// PORTFOLIO HOVER EFFECT ===============================================================================		    
    $(document).ready(function() {
        $('.project_portfolio').mouseenter(function(e) {
            $(this).children('a').children('img').animate({ height: '300', left: '0', top: '0', width: '500'}, 400);
            $(this).children('a').children('span').fadeIn(800);
        }).mouseleave(function(e) {
            $(this).children('a').children('img').animate({ height: '300', left: '0', top: '0', width: '500'}, 400);
            $(this).children('a').children('span').fadeOut(200);
        });
});


