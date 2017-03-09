jQuery.noConflict();
jQuery(document).ready(function($){

	// Menu Sorting
	$(window).smartresize(function(){
		var $container = $(".dt-sc-menu-container");
		if( $container.length) {
			$($container).each(function(){
				$(this).css({overflow:'hidden'}).isotope({itemSelector : '.column',masonry: { gutterWidth: 23 } });
			});
		}
	});

	$(window).load(function(){

		var $container = $(".dt-sc-menu-container");

		if( $container.length) {
			$($container).each(function(){
				$(this).isotope({
					filter: '*',
					masonry: { gutterWidth: 23 },
					animationOptions: { duration:750, easing: 'linear',  queue: false }
				});
			});
		}

		if($("div.dt-sc-menu-sorting").length){
			$("div.dt-sc-menu-sorting a").on('click',function(){
				$("div.dt-sc-menu-sorting a").removeClass("active-sort");
				$(this).addClass("active-sort");
				var selector = $(this).attr('data-filter');
				var $container = $(this).parents(".dt-sc-menu-sorting").next(".dt-sc-menu-container");

				$container.isotope({
					filter: selector,
					masonry: { gutterWidth: 23 },
					animationOptions: { duration:750, easing: 'linear',  queue: false }
				});				
				return false;
			});
		}
	});
});